<?php

namespace App\Models;

use App\Models\Favourite;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Gloudemans\Shoppingcart\Contracts\Buyable;


class Product extends Model implements Buyable
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->details;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }
    public function category(){
        return $this->belongsTo(Category::class , 'cat_id' );

    }
    
    public function users(){
        return $this->belongsToMany(User::class , 'favourites' ,
            'product_id' , 'user_id')->withTimestamps();
    }

    // the relation between the fav table and the product table 
    public function favourits(){
        return $this->hasMany(Favourite::class);
    }

    // To Check if that the user Fav the product or not
     
    public function favouritBy(User $user){

        return $this->favourits->contains('user_id',$user->id);
    }

    // relation to show how many fav done by the users on the product (user->product->favourit)

    public function recievedFavour()
    {
        // return $this->hasManyThrough(Like::class,Post::class);
        return $this->hasManyThrough(Favourite::class,User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }



    public function getImageAttribute()
    {     
        if( Storage::disk('local')->exists('public/'.$this->attributes['image'])){
            return asset('storage/'.$this->attributes['image']);
        }
        return $this->attributes['image'];

    }


}
