<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Create_user_by_admin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'create_user_by_admins';

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
    protected $fillable = ['user_id', 'username', 'pass_code'];

    
}
