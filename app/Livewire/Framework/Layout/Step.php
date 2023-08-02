<?php

namespace App\Livewire\Framework\Layout;

use Livewire\Component;
use App\Builder\Layout\Step as Layout;
use App\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;

class Step extends Component
{
    use HasParent;

    public $result;

    #[Reactive]
    public Layout $object;

    public function getCurrentStep()
    {
        return $this->parent['step']['current'] + 1;
    }

    public function getCountSteps()
    {
        return $this->parent['step']['count'];
    }

    public function getHasConclusion()
    {
        return $this->parent['step']['hasConclusion'];
    }

    public function nextStep()
    {
        //TODO: first validate values before dispatching
        $this->dispatch('next-step');
    }

    public function previousStep()
    {
        //TODO: first validate values before dispatching
        $this->dispatch('previous-step');
    }

    //Duplicate code in FormBase.php
    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
    }

    public function render()
    {
        return view('livewire.framework.layout.step');
    }
}
