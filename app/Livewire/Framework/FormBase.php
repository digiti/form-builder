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
            'step' => [
                'current' => $this->currentStep,
                'count' => $this->countSteps(),
                'hasConclusion' => $this->hasConclusion,
                'hasReactiveSteps' => $this->hasReactiveSteps(),
            ],
            'chapter' => [
                'current' => $this->currentChapter ?? 0,
                'count' => $this->countChapters(),
                'hasConclusion' => $this->hasConclusion,
                'hasReactiveSteps' => $this->hasReactiveChapters(),
            ],
        ];
    }

    //
    // Step functions
    //
    public function hasSteps(): bool
    {
        foreach ($this->schema() as $obj) {
            if ($obj instanceof Step) {
                return true;
            }
        }
        return false;
    }

    public function hasReactiveSteps(): bool
    {
        foreach ($this->schema() as $obj) {
            if ($obj instanceof Step) {
                if ($obj->isReactive()) {
                    return true;
                }
            }
        }

        return false;
    }

    public function countSteps(): int
    {
        $i = 0;

        foreach ($this->schema() as $obj) {
            if ($obj instanceof Step) {
                $i++;
            }
        }

        return $i;
    }

    #[On('next-step')]
    public function nextStep()
    {
        $this->dispatch('set-localstorage');
        $this->currentSchemaItem++;
    }

    #[On('previous-step')]
    public function previousStep()
    {
        $this->dispatch('set-localstorage');
        $this->currentSchemaItem--;
    }



    //
    // Chapter functions
    //
    public function hasChapters(): bool
    {
        foreach ($this->schema() as $obj) {
            if ($obj instanceof Chapter) {
                return true;
            }
        }
        return false;
    }

    public function hasReactiveChapters(): bool
    {
        foreach ($this->schema() as $obj) {
            if ($obj instanceof Chapter) {
                if ($obj->isReactive()) {
                    return true;
                }
            }
        }

        return false;
    }

    public function countChapters(): int
    {
        $i = 0;

        foreach ($this->schema() as $obj) {
            if ($obj instanceof Chapter) {
                $i++;
            }
        }

        return $i;
    }

    #[On('chapter-complete')]
    public function nextChapter()
    {
        $this->dispatch('js-set-localstorage', $this->name, $this->result);
        $this->currentSchemaItem++;
    }

    #[On('previous-chapter')]
    public function previousChapter()
    {
        $this->dispatch('js-set-localstorage', $this->name, $this->result);
        $this->currentSchemaItem--;
    }


    //
    // Schema item functions
    //
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
}
