<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'content', 'description' , 'unit', 'meta_title', 'meta_description'];

    protected $fillable = [
        'name','added_by', 'user_id', 'category_id', 'brand_id', 'video_provider', 'video_link', 'unit_price',
        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'current_stock',
        'specifications','status', 'sticky', 'image'
    ];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public $appends = [
        'is_wish_listed',
    ];

    public function getIsWishListedAttribute()
    {
        if (isset(request()->user('api')->id)) {
            return (bool)$this->hasMany(Wishlist::class)
                ->where('user_id', request()->user('api')->id)
                ->take(1)
                ->first();

            /** this for saved items
            return (bool)$this->hasMany(SaveList::class, 'item_id')
                ->where('user_id', request()->user()->id)
                ->where('item_type', 'style')
                ->take(1)
                ->first();
             */
        }
        return false;
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderDetails(){
    return $this->hasMany(OrderDetail::class);
    }

    public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists(){
    return $this->hasMany(Wishlist::class);
    }

    public function stocks(){
        return $this->hasMany(ProductStock::class);
    }

}
