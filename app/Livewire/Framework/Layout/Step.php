<?php

namespace App\Livewire\Framework\Layout;

use Livewire\Component;
use App\Builder\Layout\Step as Layout;
use App\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;

class Step extends Component
{
    use HasParent;

    #[Reactive]
    public $result;
    public Layout $object;

    public function getCurrentStep()
    {
        return $this->parent['step']['current'];
    }

    public function getCountSteps()
    {
        return $this->parent['step']['count'];
    }

    public function hasConclusion(): bool
    {
        return $this->parent['step']['hasConclusion'];
    }

    public function nextStep()
    {
        //TODO: first validate values before dispatching

        if ($this->getCurrentStep() + 1 < $this->getCountSteps()) {
            if ($this->parent['step']['isStepInChapter'] ?? false) {
                $this->dispatch('next-step-in-chapter');
            } else {
                $this->dispatch('log', 'finish');
                $this->dispatch('next-step');
            }
        } else {
            $this->finish();
        }
    }

    public function previousStep()
    {
        //TODO: first validate values before dispatching

        if ($this->parent['step']['isStepInChapter'] ?? false) {
            $this->dispatch('previous-step-in-chapter');
        } else {
            $this->dispatch('previous-step');
        }
    }

    public function finish()
    {
        if ($this->parent['step']['isStepInChapter'] ?? false) {
            $this->dispatch('chapter-complete');
        } else {
            $this->dispatch('form-complete');
        }
    }

    public function render()
    {
        return view('livewire.framework.layout.step');
    }
}
