<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Log
 * @package App\Models
 * @version December 31, 2019, 4:22 pm UTC
 *
 * @property string passPhone
 * @property string riderPhone
 * @property string plate_id
 * @property string approved
 * @property string location
 */
class Log extends Model
{
    use SoftDeletes;

    public $table = 'logs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'passPhone',
        'riderPhone',
        'plate_id',
        'approved',
        'location'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'passPhone' => 'string',
        'riderPhone' => 'string',
        'plate_id' => 'string',
        'approved' => 'string',
        'location' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'passPhone' => 'required',
        'riderPhone' => 'required',
        'plate_id' => 'required',
        'approved' => 'required',
        'location' => 'required'
    ];

    
}
