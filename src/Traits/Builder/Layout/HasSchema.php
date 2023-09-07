<?php

namespace Digiti\FormBuilder\Traits\Builder\Layout;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

trait HasSchema
{
    protected array $schema;

    public function schema(array $schema): static
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * Get all objects within the schema
     *
     * return array
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * Get all objects with their reactive conditions applied
     *
     * return array
     */
    public function filteredSchema(): array
    {
        return array_values(array_filter($this->schema, function ($obj) {
            if ($obj->getReactive() || !$obj->isReactive()) {
                return $obj;
            }
        }));
    }

    /**
     * Get all objects which has validation rules set
     * mainly used in chapter and step progression
     *
     * return array
     */
    public function validationSchema(): array
    {
        return array_values(array_filter($this->schema, function ($obj) {
            if ($obj->hasValidation()) {
                return $obj;
            }
        }));
    }
}
