<?php

namespace App\Livewire\Framework;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Builder\Layout\Step;
use App\Events\OnFormSubmitted;

class FormBase extends Component
{
    public $result;

    #[Reactive]
    public int $currentStep;
    public array $meta;
    public bool $hasConclusion = false;

    public function mount()
    {
        $this->currentStep = 0;
    }

    public function getMeta()
    {
        return [
            'step' => [
                'current' => $this->currentStep,
                'count' => $this->countSteps(),
                'hasConclusion' => $this->hasConclusion
            ]
        ];
    }

    public function hasSteps()
    {
        foreach($this->schema() as $obj){
            if($obj instanceof Step){
                return true;
            }
        }
        return false;
    }

    public function countSteps()
    {
        $i = 0;

        foreach($this->schema() as $obj){
            if($obj instanceof Step){
                $i++;
            }
        }

        return $i;
    }

    #[On('next-step')]
    public function nextStep()
    {
        $this->currentStep++;
    }

    #[On('previous-step')]
    public function previousStep()
    {
        $this->currentStep--;
    }

    #[On('input-updated')]
    public function updateResults($name, $value)
    {
        $this->result[$name] = $value;
    }

    public function saveForm() : void {
        OnFormSubmitted::dispatch($this->result);
    }

    public function render()
    {
        return view('livewire.framework.form-base');
    }
}
