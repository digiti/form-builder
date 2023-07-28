<?php

namespace App\Traits\Fieldtypes;

trait HasModelBinding
{
    public mixed $model;

    public function model(mixed $model): mixed
    {
        $this->model = $model;

        return $this;
    }
}
