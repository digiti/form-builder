<?php

namespace Digiti\FormBuilder\Livewire\Layout;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Chapter as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use Digiti\FormBuilder\Builder\Layout\Step;
use Livewire\Attributes\On;

class Chapter extends Component
{
    use HasParent;

    #[Reactive]
    public $result;

    #[Reactive]
    public Layout $object;

    public function mount()
    {

    }

    public function filteredSchema(): array
    {
        return array_values(array_filter($this->object->getSchema(), function ($obj) {
            //Chapter scheme should only return Steps
            if ($obj instanceof Step) {
                if ($obj->getReactive() || !$obj->isReactive()) {
                    return $obj;
                }
            }
        }));
    }

    public function getCountStepsInChapter(): int
    {
        return count($this->filteredSchema());
    }

    public function getCurrentSchemaObject()
    {
        return $this->filteredSchema()[$this->parent()['form']['currentSubItem']];
    }

    public function getMeta()
    {
        return [
            'form' => $this->parent['form'],
            'chapter' => [
                'hasConclusion' => $this->object->hasConclusion(),
            ],
            'step' => [
                'current' => $this->parent['form']['currentSubItem'],
                'count' => $this->getCountStepsInChapter(),
                'isStepInChapter' => true
            ],
        ];
    }

    public function nextStep()
    {
        $this->dispatch('validate-inputs', progress: true);
    }

    public function previousStep()
    {
        $this->dispatch('previous-item');
    }

    public function render()
    {
        return view('fb::livewire.layout.chapter');
    }
}
