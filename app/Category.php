<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
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
        'name', 'parent_id', 'slug', 'description', 'position'
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
        return $this->hasMany(Category::class, "parent_id")
            ->orderBy("position", "asc");
    }

    /**
     * return subcategory
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs2()
    {
        return $this->hasMany(Category::class, "parent_id")
            ->orderBy("position", "desc");
    }

    /**
     * get products
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, "category_products");
    }

    /**
     * get main category(category level 1)
     * @param $query
     * @return mixed
     */
    public function scopeMainCategories($query)
    {
        return $query->with(["parent", "childs"])->whereNull('parent_id')
            ->orderBy("position", "asc");
    }

    /**
     * get main category(category level 1)
     * @param $query
     * @return mixed
     */
    public function scopeMainCategories2($query)
    {
        return $query->with(["parent", "childs"])->whereNull('parent_id')
            ->orderBy("position", "desc");
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
