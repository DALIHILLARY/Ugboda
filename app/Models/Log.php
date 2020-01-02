<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Log
 * @package App\Models
 * @version January 2, 2020, 5:45 pm UTC
 *
 * @property string passPhone
 * @property string riderPhone
 * @property string plate_Id
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
        'plate_Id',
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
        'plate_Id' => 'string',
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
        'plate_Id' => 'required',
        'approved' => 'required',
        'location' => 'required'
    ];

    
}
