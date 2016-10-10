<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'recommend',
        'featured'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

//    public function getNameDescriptionAttribute()
//    {
//        return $this->name." - ".$this->description;
//    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(', ', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1)->orderBy('price')->limit(3);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', '1')->orderBy('price')->limit(3);
    }

    public function scopeFindCategory($query, $type)
    {
        return $query->where('category_id', '=', $type);
    }

    public function  scopeOfTag($query, $type)
    {
        return $query->where('tag_id', '=', $type);
    }
}
