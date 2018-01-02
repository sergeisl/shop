<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parameters';

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
    protected $fillable = ['value', 'product_id', 'position', 'visible', 'price_old', 'price'];
}
