<?php

namespace App\Livewire\Framework\Layout;

use Livewire\Component;
use App\Builder\Layout\Chapter as Layout;
use App\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;
use App\Builder\Layout\Step;
use Livewire\Attributes\On;

class Chapter extends Component
{
    use HasParent;

    public int $currentStepInChapter;

    #[Reactive]
    public $result;
    public Layout $object;

    public function mount()
    {
        $this->currentStepInChapter = 0;
    }

    public function getCountStepsInChapter(): int
    {
        $i = 0;

        foreach ($this->object->getSchema() as $obj) {
            if ($obj instanceof Step) {
                $i++;
            }
        }

        return $i;
    }

    // public function hasReactiveSteps(): bool
    // {
    //     foreach ($this->object->getSchema() as $obj) {
    //         if ($obj instanceof Step) {
    //             if ($obj->isReactive()) {
    //                 return true;
    //             }
    //         }
    //     }

    //     return false;
    // }


    public function getMeta()
    {
        return [
            'step' => [
                'current' => $this->currentStepInChapter,
                'count' => $this->getCountStepsInChapter(),
                // 'hasReactiveSteps' => $this->hasReactiveSteps(),
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
