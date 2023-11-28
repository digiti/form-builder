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
            if (!method_exists($obj, 'getReactive') || $obj->getReactive() || !$obj->isReactive()) {
                return $obj;
            }
        }));
    }

    // TODO: validationSchema() and fieldtypeSchema() might always generate the same results investigate if this behaviour is necessary?
    // Example: When a non fieldtype uses validation for some reason

    /**
     * Get all objects which has validation rules set and are visible
     * mainly used in chapter and step progression
     *
     * return array
     */
    public function validationSchema(): array
    {
        return collect($this->schema)
            ->map(function($obj){
                //dd($obj->getSchema());
                return method_exists($obj, 'getSchema') ? $obj->getSchema() : $obj;
            })
            ->flatten()
            ->filter(function($obj){
                if (method_exists($obj, 'hasValidation') && $obj->hasValidation() && ($obj->getReactive() || !$obj->isReactive())) {
                    return $obj;
                }
            })
            ->values()->toArray();
    }

    /**
     * Get all fieldtype objects
     * mainly used in retrieving alle values stored in a session on form init
     *
     * return array
     */
    public function fieldtypeSchema(): array
    {
        return collect($this->schema)
            ->map(function($obj){
                return method_exists($obj, 'getSchema') ? $obj->getSchema() : $obj;
            })
            ->flatten()
            ->filter(function($obj){
                if ($obj->isFieldtype()) {
                    return $obj;
                }
            })
            ->values()->toArray();
    }
}
