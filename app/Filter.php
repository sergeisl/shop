<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'filters';

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
    protected $fillable = ['name', 'position', 'visible', 'type'];

        public function criteria() {
        return $this->hasMany('App\Criterion', 'filter_id', 'id');
    }



}
