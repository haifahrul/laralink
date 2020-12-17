<?php

namespace App\Filters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class DomainFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * Search filter
     *
     * @param $search
     * @return DomainFilter
     */
    public function search($search)
    {
        return $this->where(function ($query) use ($search) {
            /** @var Builder $query */
            return $query->where('domain', 'LIKE', '%'.$search.'%');
        });
    }

    /**
     * We filter by status
     *
     * @param $status
     * @return DomainFilter
     */
    public function status($status)
    {
        return $this->where('status', (bool) $status);
    }
}
