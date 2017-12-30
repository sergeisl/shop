<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['name', 'key', 'image', 'parent_id', 'text', 'seotext', 'title', 'keywords', 'description', 'position', 'disabled'];

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }
    
}
