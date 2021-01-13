<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','address','phone','country','city','province','postalcode',
        'subtotal','tax','total','payment_way','error','user_id','content'];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
