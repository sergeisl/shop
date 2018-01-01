<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'criteria';

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
    protected $fillable = ['name', 'parent_id'];

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }
    
}
