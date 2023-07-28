<?php

namespace App\Fieldtypes;

use Closure;
use Livewire\Wireable;

class Text extends Fieldtype implements Wireable
{
    protected string $view = 'framework.fieldtypes.text';

    protected string | Closure | null $type = null;
    protected bool | Closure $isEmail = false;
    protected bool | Closure $isNumeric = false;
    protected bool | Closure $isPassword = false;
    protected bool | Closure $isTel = false;
    protected bool | Closure $isUrl = false;

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function email(bool | Closure $condition = true): static
    {
        $this->isEmail = $condition;

        return $this;
    }

    public function integer(bool | Closure $condition = true): static
    {
        $this->isNumeric = $condition;

        return $this;
    }

    public function password(bool | Closure $condition = true): static
    {
        $this->isPassword = $condition;

        return $this;
    }

    public function tel(bool | Closure $condition = true): static
    {
        $this->isTel = $condition;

        return $this;
    }

    public function url(bool | Closure $condition = true): static
    {
        $this->isUrl = $condition;

        return $this;
    }

    public function isEmail(): bool
    {
        return (bool) $this->isEmail;
    }

    public function isNumeric(): bool
    {
        return (bool) $this->isEmail;
    }

    public function isPassword(): bool
    {
        return (bool) $this->isEmail;
    }

    public function isTel(): bool
    {
        return (bool) $this->isEmail;
    }

    public function isUrl(): bool
    {
        return (bool) $this->isEmail;
    }

    public function getType(): string
    {
        if ($type = $this->evaluate($this->type)) {
            return $type;
        } elseif ($this->isEmail()) {
            return 'email';
        } elseif ($this->isNumeric()) {
            return 'number';
        } elseif ($this->isPassword()) {
            return 'password';
        } elseif ($this->isTel()) {
            return 'tel';
        } elseif ($this->isUrl()) {
            return 'url';
        }

        return 'text';
    }

    // TODO: Put in Trait or Parent class
    public function toLivewire()
    {
        return [
            'name' => $this->getName(),
            'type' => $this->getType(),
            'label' => $this->getLabel(),
        ];
    }

    public static function fromLivewire($data)
    {
        $name = $data['name'];
        $type = $data['type'];
        $label = $data['label'];

        return (new static($name))->type($type)->label($label);
    }
}
