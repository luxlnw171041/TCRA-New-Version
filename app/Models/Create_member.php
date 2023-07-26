<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Create_member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'create_members';

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
    protected $fillable = ['user_id', 'username', 'password'];

    
}
