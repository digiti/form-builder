<?php

namespace Digiti\FormBuilder\Builder;

use Digiti\FormBuilder\Traits\Builder\HasWireables;
use Livewire\Wireable;

class BuilderCore implements Wireable
{
    use HasWireables;

    protected string $view = '';
    protected string $parentView = '';

    /**
     * Enables you to overwrite the view of your element
     */
    public function view(string $view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the parentView property
     */
    public function getParentView(): string
    {
        return $this->parentView;
    }

    /**
     * Get the view property
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * Check if element is a livewire element
     * TODO: check if this is redudant in v2
     */
    public function isLivewire(){
        return str_contains($this->view, 'livewire');
    }

    /**
     * Check if element is a fieldtype
     */
    public function isFieldtype(){
        return str_contains($this->view, 'fieldtypes');
    }
}
