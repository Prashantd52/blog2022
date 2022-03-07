<?php
namespace App\Traits;
trait searchTrait
{
    public function scopeSearch($query, $field, $search)
    {
        if ($search !== '')
        {
            return $query->where($field, 'like', "%$search%");
        }
    }
}