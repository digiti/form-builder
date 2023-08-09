<?php

namespace App\Livewire\Framework;

use App\Builder\Layout\Chapter;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Builder\Layout\Step;
use App\Events\OnFormSubmitted;

class FormBase extends Component
{
    public $result;
    public string $name;

    public int $currentStep;
    public int $currentChapter;
    public int $currentSchemaItem;

    public array $meta;
    public bool $hasConclusion = false;
    public bool $hasStepCounters = false;

    public function mount()
    {
        $this->dispatch('js-get-localstorage', $this->name);
        $this->currentStep = 0;
        $this->currentChapter = 0;
        $this->currentSchemaItem = 0;
    }

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
        return view('livewire.framework.form-base');
    }

    public function getMeta()
    {
        return [
            'form' => [
                'hasConclusion' => $this->hasConclusion,
                'hasStepCounters' => $this->hasStepCounters
            ],
            'step' => [
                'current' => $this->currentSchemaItem,
                'count' => $this->countSchemaItems(),
                // 'hasReactiveSteps' => $this->hasReactiveSteps(),
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
        $this->dispatch('set-localstorage');
        $this->currentSchemaItem++;
    }

    #[On('previous-step')]
    public function previousItem()
    {
        $this->dispatch('set-localstorage');
        $this->currentSchemaItem--;
    }

    #[On('chapter-complete')]
    public function nextChapter()
    {
        $this->dispatch('set-localstorage');
        $this->currentSchemaItem++;
    }

    #[On('get-localstorage')]
    public function updateResultsFromLocalStorage($content)
    {
        $this->result = $content;
    }

    #[On('set-localstorage')]
    public function writeResultsToLocalstorage()
    {
        $this->dispatch('js-set-localstorage', $this->name, $this->result);
    }

    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
    }
}
