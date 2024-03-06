<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'drivers';

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
    protected $fillable = ['user_id', 'd_name', 'd_surname', 'd_idno', 'demerit', 'demeritdetail', 'd_pic_id_card', 'd_pic_indictment', 'd_pic_cap', 'd_pic_other', 'd_date','d_name_other_nationalitie','d_idno_other_nationalitie'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
