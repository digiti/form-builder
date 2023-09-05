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

class FormBase extends Component
{
    use HasCookieStorage;

    public $result;
    public string $name;
    public array $formKeys = [];

    public int $currentStep;
    public int $currentChapter;
    public int $currentSchemaItem;

    public bool $hasConclusion = true;
    public bool $hasStepCounters = false;
    public bool $debug = false;

    public array $hasErrors = [];

    public function mount()
    {
        $this->getDataFromCookieStorage();

        $this->currentStep = 0;
        $this->currentChapter = 0;
        $this->currentSchemaItem = 0;
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

    /**
     * Returns a schema where chapters or steps will be added/removed depending the result of their reactive attribute
     */
    public function filteredSchema(): array
    {
        return array_values(array_filter($this->schema(), function ($obj) {
            if ($obj instanceof Step || $obj instanceof Chapter) {
                if ($obj->getReactive() || !$obj->isReactive()) {
                    return $obj;
                }
            }
        }));
    }

    public function saveForm(): void
    {
        OnFormSubmitted::dispatch($this->result);
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
                'currentSchemaItem' => $this->currentSchemaItem,
                'countSchemaItems' => $this->countSchemaItems(),
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

    #[On('next-step')]
    public function nextItem()
    {
        if (empty($this->hasErrors)) {
            OnStepCompleted::dispatch($this->result);
            $this->currentSchemaItem++;
        }
    }

    #[On('previous-step')]
    public function previousItem()
    {
        $this->currentSchemaItem--;
    }

    #[On('chapter-complete')]
    public function nextChapter()
    {
        if (empty($this->hasErrors)) {
            OnChapterCompleted::dispatch($this->result);
            $this->currentSchemaItem++;
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
