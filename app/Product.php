<?php

namespace App;

use Gloudemans\Shoppingcart\CanBeBought;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\Models\Media;

class Product extends Model implements HasMedia, Buyable
{
    use HasMediaTrait, SoftDeletes, Sluggable, CanBeBought;
    /**
     * @var array
     */
    protected $with = ['media'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'price', 'sale_price', 'summary', 'description', 'qty', 'status',
    ];

    /**
     * get product options
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * get product categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_products");
    }


    /**
     * get main category(category level 1)
     * @param $query
     * @return mixed
     */
    public function scopeSubCategoriesProducts($query, $category)
    {
        return $query->whereHas("categories", function ($q) use ($category){
            $q->whereIn("categories.id", $category->childs->pluck("id")->toArray());
        });
    }

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
     * resize image when upload
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('images')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CROP, 450, 600);
            });
    }

    /**
     * friendly url category by slug field
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return "slug";
    }

    /**
     * @param null $options
     * @return int|mixed|string
     */
    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    /**
     * @param null $options
     * @return mixed|string
     */
    public function getBuyableDescription($options = null){
        return $this->name;
    }

    /**
     * @param null $options
     * @return float|mixed
     */
    public function getBuyablePrice($options = null){
        return $this->price;
    }
}
