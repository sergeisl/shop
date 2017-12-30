<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'brief', 'text', 'seotext', 'price_old', 'price', 'label', 'keywords', 'description', 'param_name', 'published'];

    public function categories () {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function images () {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function add_images ($images , $product_id) {
        foreach ($images as $img){
            $image = new Image();
            $image->fill(['name' => $img->getClientOriginalName(),'product_id' => $product_id])->save();
            $img->store('public/images');
        }
    }

}
