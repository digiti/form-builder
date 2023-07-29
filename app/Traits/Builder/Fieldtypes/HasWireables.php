<?php

namespace App\Traits\Builder\Fieldtypes;

trait HasWireables
{
    protected function getObjectAttributes()
    {
        $result = [];
        foreach ($this as $property => $value){
            $result[$property] = $value;
        }
        return $result;
    }

    protected function setObjectAttributes($array)
    {
        foreach($array as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    public function toLivewire()
    {
        return $this->getObjectAttributes();
    }

    public static function fromLivewire($data)
    {
        return (new static($data['name']))->setObjectAttributes($data);
    }
}
