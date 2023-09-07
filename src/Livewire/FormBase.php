<?php

namespace Digiti\FormBuilder\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

use Digiti\FormBuilder\Builder\Layout\Chapter;
use Digiti\FormBuilder\Builder\Layout\Step;
use Digiti\FormBuilder\Builder\Fieldtypes\Check;
use Digiti\FormBuilder\Builder\Fieldtypes\Radio;
use Digiti\FormBuilder\Builder\Fieldtypes\Range;
use Digiti\FormBuilder\Builder\Fieldtypes\Select;
use Digiti\FormBuilder\Builder\Fieldtypes\Text;
use Digiti\FormBuilder\Events\OnChapterCompleted;
use Digiti\FormBuilder\Events\OnFormSubmitted;
use Digiti\FormBuilder\Events\OnStepCompleted;
use Digiti\FormBuilder\Traits\Livewire\HasCookieStorage;
use Illuminate\Support\Facades\Log;

class FormBase extends Component
{
    use HasCookieStorage;

    public $result;
    public string $name;
    public array $formKeys = [];

    public int $currentItem;
    public int $currentSubItem;
    public string $currentSchemaItem;
    public int $progress;

    public bool $hasConclusion = true;
    public bool $hasStepCounters = false;

    public array $hasErrors = [];

    public function mount()
    {
        $this->getDataFromCookieStorage();

        $this->currentItem = 0;
        $this->currentSubItem = 0;
        $this->currentSchemaItem = 0;
        $this->progress = 0;
    }

    public function getDataFromCookieStorage(): void
    {
        $keys = $this->mapKeys($this->schema());

        foreach ($keys as $key) {
            $this->result[$key] = $this->getCookie($key);
        }
    }

    /**
     * Get all fieldtype keys and store them in $this->formKeys
     * is being used to map existing values in storage to the right input
     */
    public function mapKeys($schema): array
    {
        foreach ($schema as $obj) {
            if ($obj instanceof Check || $obj instanceof Radio || $obj instanceof Range || $obj instanceof Select || $obj instanceof Text) {
                if (!in_array($obj->name, $this->formKeys)) {
                    array_push($this->formKeys, $obj->name);
                }
            }

            if ($obj instanceof Step || $obj instanceof Chapter) {
                $this->mapKeys($obj->getSchema());
            }
        }
        return $this->formKeys;
    }

    public function hasSteps(): bool
    {
        foreach($this->schema() as $item){
            if ($item instanceof Step) {
                return true;
            }
        }

        return false;
    }

    public function hasChapters(): bool
    {
        foreach($this->schema() as $item){
            if ($item instanceof Chapter) {
                return true;
            }
        }

        return false;
    }

    public function isChapter($obj): bool{
        return $obj instanceof Chapter ?? false;
    }

    /**
     * Returns a schema where chapters or steps will be added/removed depending the result of their reactive attribute
     */
    public function filteredSchema(): array
    {
        return array_values(array_filter($this->schema(), function ($obj) {
            //if ($obj instanceof Step || $obj instanceof Chapter) {
                if ($obj->getReactive() || !$obj->isReactive()) {
                    return $obj;
                }
            //}
        }));
    }

    public function getCurrentSchemaItem()
    {
        //When the user didn't work with chapters and steps wrap in step as fallback
        if(!$this->hasChapters() && !$this->hasSteps()){
            return Step::make($this->filteredSchema());
        }

        return $this->filteredSchema()[$this->currentItem];
    }

    public function getCurrentSchemaObject()
    {
        //When the user didn't work with chapters and steps wrap in step as fallback
        if(!$this->hasChapters() && !$this->hasSteps()){
            return Step::make($this->filteredSchema());
        }

        return $this->filteredSchema()[$this->currentItem];
    }

    public function render()
    {
        return view('fb::livewire.form-base');
    }

    public function getMeta()
    {
        return [
            'form' => [
                'hasConclusion' => $this->hasConclusion,
                'hasErrors' => $this->hasErrors,
                'hasStepCounters' => $this->hasStepCounters,
                'currentItem' => $this->currentItem,
                'currentSubItem' => $this->currentSubItem,
                'currentSchemaItem' => $this->currentSchemaItem,
                'countSchemaItems' => $this->countSchemaItems(),
                'currentItemProgress' => '' //TODO
            ],
            'step' => [
                'current' => $this->currentSchemaItem,
                'count' => $this->countSchemaItems(),
                'isStepInChapter' => false
            ]
        ];
    }

    public function countSchemaItems(): int
    {
        $i = 0;

        foreach ($this->schema() as $obj) {
            if ($obj instanceof Step || $obj instanceof Chapter) {
                $i++;
            }
        }

        return $i;
    }

    /**
     * Reset the progress counter each time validation is triggered
     */
    #[On('validate-inputs')]
    public function resetProgress(){
        $this->progress = 0;
    }

    public function canProgress()
    {
        $obj = $this->getCurrentSchemaObject();
        //$inputs = $this->isChapter($obj) ? $obj->filteredSchema()[$this->currentSubItem]->validationSchema() : $obj->validationSchema();
        $inputs = $this->isChapter($obj) ? $obj->filteredSchema()[$this->currentSubItem]->filteredSchema() : $obj->filteredSchema();
        $inputCount = count($inputs);
        $errorCount = count($this->hasErrors);

        $this->progress = $this->progress - $errorCount;

        return $this->progress == $inputCount;
    }

    #[On('next-item')]
    public function nextItem()
    {
        $this->progress++;

        if($this->canProgress()){
            $obj = $this->getCurrentSchemaObject();
            if($this->isChapter($obj)){
                /**
                 * Chapter
                 */
                //$currentSubObj = $obj->filteredSchema()[$this->currentSubItem];

                if(array_key_last($obj->filteredSchema()) == $this->currentSubItem){
                    $this->currentSubItem = 0;
                    $this->currentItem++;
                    OnChapterCompleted::dispatch($this->result);
                }else{
                    $this->currentSubItem++;
                    OnStepCompleted::dispatch($this->result);
                }
            }else{
                /**
                 * Step
                 */
                $this->currentItem++;
                OnStepCompleted::dispatch($this->result);
            }
        }
    }

    #[On('previous-item')]
    public function previousItem()
    {
        $this->resetProgress();

        $obj = $this->getCurrentSchemaObject();
        if($this->isChapter($obj)){
            /**
             * Chapter
             */
            if($this->currentSubItem == 0){
                $this->currentItem--;
                $this->currentSubItem = array_key_last($this->filteredSchema()[$this->currentItem]);
            }else{
                $this->currentSubItem--;
            }
        }else{
            /**
             * Step
             */
            $this->currentItem--;
        }
    }

    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
        $this->storeCookie($name, $value);
    }

    #[On('input-errors')]
    public function errorHandling($name, $value, $errors)
    {
        if (isset($errors['value'])) {
            $this->hasErrors[$name] = true;
        } else {
            unset($this->hasErrors[$name]);
        }
    }
}
