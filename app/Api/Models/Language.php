<?php

namespace GetCandy\Api\Models;

class Language extends BaseModel
{
    protected $hashids = 'language';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'default'
    ];

    public function scopeEnabled($query)
    {
        return $query->where('enabled', '=', true);
    }
}
