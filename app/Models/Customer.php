<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
    protected $fillable = ['user_id', 'rentname', 'compname', 'c_name', 'c_surname', 'c_idno', 'demerit', 'demeritdetail', 'c_pic_id_card', 'c_pic_company_certificate', 'c_pic_indictment', 'c_pic_cap', 'c_pic_other', 'c_date','c_company_name','commercial_registration','c_name_other_nationalitie','c_idno_other_nationalitie','c_surname_other_nationalitie'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
