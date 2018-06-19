<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use SoftDeletes, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'slug'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    /**
     * return parent of category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, "parent_id");
    }

    /**
     * return subcategory
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    /**
     * get main category(category level 1)
     * @param $query
     * @return mixed
     */
    public function scopeMainCategories($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * friendly url category by slug field
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return "slug";
    }
}
