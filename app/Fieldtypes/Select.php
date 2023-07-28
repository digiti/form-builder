<?php

namespace App\Fieldtypes;

use Closure;
use Livewire\Wireable;
use App\Traits\Fieldtypes\HasOptions;

class Select extends Fieldtype implements Wireable
{
    use HasOptions;

    protected string $view = 'framework.fieldtypes.select';

    protected bool | Closure $isMultiple = false;

    public function multiple(bool | Closure $condition = true): static
    {
        $this->isMultiple = $condition;

        return $this;
    }

    public function isMultiple(): bool
    {
        return $this->evaluate($this->isMultiple);
    }

    // TODO: Put in Trait or Parent class
    public function toLivewire()
    {
        return [
            'name' => $this->getName(),
            'options' => $this->getOptions(),
            'isMultiple' => $this->isMultiple()
        ];
    }

    public static function fromLivewire($data)
    {
        $name = $data['name'];
        $options = $data['options'];
        $isMultiple = $data['isMultiple'];

        return (new static($name))
            ->options($options)
            ->multiple($isMultiple);
    }
}
