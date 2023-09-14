<?php

namespace Digiti\FormBuilder\Livewire\Layout;

use Livewire\Component;
use Digiti\FormBuilder\Builder\Layout\Step as Layout;
use Digiti\FormBuilder\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;

class Step extends Component
{
    use HasParent;

    #[Reactive]
    public $result;

    #[Reactive]
    public Layout $object;

    public function getCurrentStep(): int
    {
        return $this->parent['step']['current'];
    }

    public function getCountSteps(): int
    {
        return $this->parent['step']['count'];
    }

    public function hasConclusion(): bool
    {
        return $this->parent['step']['hasConclusion'];
    }

    public function getCurrentSchemaItem(): int
    {
        return $this->parent['form']['currentSchemaItem'];
    }

    public function getCountSchemaItems(): int
    {
        return $this->parent['form']['countSchemaItems'];
    }

    public function updating(){
        $this->dispatch('validate-inputs');
    }

    public function nextStep()
    {
        $this->dispatch('validate-inputs', progress: true);
    }

    public function previousStep()
    {
        $this->dispatch('previous-item');
    }

    public function showSubmit()
    {
        $count = $this->parent['form']['countSchemaItems'];

        //if form hasConclusion take second to last item otherwise take last item
        if($this->parent['form']['hasConclusion']){
            $count--;
        }

        if($this->parent['step']['isStepInChapter']){
            return $count == $this->parent['form']['currentItem'] && $this->parent['form']['currentSubItem'] == ($this->parent['step']['count'] - 1);
        }else{
            return $count == $this->parent['form']['currentItem'];
        }
    }

    public function render()
    {
        return view('fb::livewire.layout.step');
    }
}
