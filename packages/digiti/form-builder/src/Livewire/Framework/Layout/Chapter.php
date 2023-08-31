<?php

namespace Digiti\FormBuilder\Livewire\Framework\Layout;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Chapter as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use Digiti\FormBuilder\Builder\Layout\Step;
use Livewire\Attributes\On;

class Chapter extends Component
{
    use HasParent;

    public int $currentStepInChapter;

    #[Reactive]
    public $result;

    #[Reactive]
    public Layout $object;

    public function mount()
    {
        $this->currentStepInChapter = 0;
    }

    public function filteredSchema(): array
    {
        $schema = array_values(array_filter($this->object->getSchema(), function ($obj) {
            if ($obj instanceof Step) {
                if ($obj->getReactive() || !$obj->isReactive()) {
                    return $obj;
                }
            }
        }));

        return $schema;
    }

    public function getCountStepsInChapter(): int
    {
        $i = 0;

        foreach ($this->filteredSchema() as $obj) {
            if ($obj instanceof Step) {
                $i++;
            }
        }

        return $i;
    }

    public function getMeta()
    {
        return [
            'form' => $this->parent['form'],
            'chapter' => [
                'hasConclusion' => $this->object->hasConclusion(),
            ],
            'step' => [
                'current' => $this->currentStepInChapter,
                'count' => $this->getCountStepsInChapter(),
                'isStepInChapter' => true
            ],
        ];
    }

    #[On('next-step-in-chapter')]
    public function nextStepInChapter()
    {
        $this->dispatch('set-localstorage');
        $this->currentStepInChapter++;
    }

    #[On('previous-step-in-chapter')]
    public function previousStepInChapter()
    {
        $this->dispatch('set-localstorage');
        $this->currentStepInChapter--;
    }

    public function render()
    {
        return view('livewire.framework.layout.chapter');
    }
}