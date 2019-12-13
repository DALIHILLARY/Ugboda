<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Log
 * @package App\Models
 * @version December 13, 2019, 5:20 pm UTC
 *
 * @property string passPhone
 * @property string riderPhone
 * @property string plate
 * @property string approved
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
        'plate',
        'approved'
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
        'plate' => 'string',
        'approved' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'passPhone' => 'required',
        'riderPhone' => 'required',
        'plate' => 'required',
        'approved' => 'required'
    ];

    
}
