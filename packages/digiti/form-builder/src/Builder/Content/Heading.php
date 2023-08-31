<?php

namespace App\Builder\Content;

use App\Traits\Builder\HasClasses;
use App\Traits\Builder\HasName;
use App\Traits\Builder\HasWireables;

use Livewire\Wireable;

class Heading implements Wireable
{
    use HasClasses;
    use HasName;
    use HasWireables;

    protected string $view = 'components.content.heading';
    protected int $level = 2;

    public function level(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }


    public function __construct(string $name)
    {
        $this->name($name);
        $this->classes = 'content-heading';
        $this->setConstructAttributeKey('name');
    }

    public static function make(string $name)
    {
        $form = new static($name);

        return $form;
    }
}
