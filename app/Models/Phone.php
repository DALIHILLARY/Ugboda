<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phone
 * @package App\Models
 * @version January 2, 2020, 5:43 pm UTC
 *
 * @property \App\Models\Rider rider
 * @property integer rider_Id
 * @property string boda_Id
 * @property string phone_No
 * @property string pin
 * @property string active
 */
class Phone extends Model
{
    use SoftDeletes;

    public $table = 'phone';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rider_Id',
        'boda_Id',
        'phone_No',
        'pin',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rider_Id' => 'integer',
        'boda_Id' => 'string',
        'phone_No' => 'string',
        'pin' => 'string',
        'active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rider_Id' => 'required',
        'boda_Id' => 'required',
        'phone_No' => 'required',
        'pin' => 'required',
        'active' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rider()
    {
        return $this->belongsTo(\App\Models\Rider::class, 'rider_Id');
    }
}
