<?php

namespace App\Livewire\Framework\Layout;

use Livewire\Component;
use App\Builder\Layout\Step as Layout;
use App\Traits\Livewire\HasParent;
use Livewire\Attributes\Reactive;

use App\Builder\Content\Row;
use App\Builder\Content\Column;
use App\Builder\Content\Image;
use App\Builder\Content\Paragraph;
use App\Builder\Content\Heading;
use App\Builder\Content\Html;
use App\Builder\Content\Anchor;

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

    public function nextStep()
    {
        if(empty($this->parent['form']['hasErrors'])){
            if ($this->getCurrentStep() + 1 < $this->getCountSteps()) {
                if ($this->parent['step']['isStepInChapter'] ?? false) {
                    $this->dispatch('next-step-in-chapter');
                } else {
                    $this->dispatch('next-step');
                }
            } else if (isset($this->parent['chapter']) && $this->parent['chapter']['hasConclusion'] && $this->getCurrentStep() + 1 == $this->getCountSteps()) {
                $this->dispatch('next-step-in-chapter');
            } else {
                $this->finish();
            }
        }
    }

    public function previousStep()
    {
        if ($this->parent['step']['isStepInChapter'] ?? false) {
            if ($this->getCurrentStep() == 0) {
                $this->dispatch('previous-step');
            } else {
                $this->dispatch('previous-step-in-chapter');
            }
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

    public function isRow($obj)
    {
        return $obj instanceof Row;
    }

    public function isColumn($obj)
    {
        return $obj instanceof Column;
    }

    public function isImage($obj)
    {
        return $obj instanceof Image;
    }

    public function isParagraph($obj)
    {
        return $obj instanceof Paragraph;
    }

    public function isHeading($obj)
    {
        return $obj instanceof Heading;
    }

    public function isHtml($obj)
    {
        return $obj instanceof Html;
    }

    public function isAnchor($obj)
    {
        return $obj instanceof Anchor;
    }

    public function render()
    {
        return view('livewire.framework.layout.step');
    }
}
