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

    public function criteria () {
        return $this->morphToMany('App\Criteria', 'product_criteria');
    }

    public function images () {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function add_images ($images, $product_id) {
        foreach ($images as $img) {
            $image = new Image();
            // $image_name = str_random(10).$img->hashName();
            $image_name = md5(base64_decode($img)) . '.' . $img->extension();

            $image->fill(['name' => $image_name, 'product_id' => $product_id])->save();
            $img->storeAs('public/upload/images', $image_name);
        }
    }

}
