<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Boda
 * @package App\Models
 * @version December 31, 2019, 6:05 pm UTC
 *
 * @property string plate
 * @property string FirstName
 * @property string LastName
 * @property string PhoneNo
 * @property string NIN
 */
class Boda extends Model
{
    use SoftDeletes;

    public $table = 'boda_details';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'plate',
        'FirstName',
        'LastName',
        'PhoneNo',
        'NIN'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plate' => 'string',
        'FirstName' => 'string',
        'LastName' => 'string',
        'PhoneNo' => 'string',
        'NIN' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'plate' => 'required',
        'FirstName' => 'required',
        'LastName' => 'required',
        'PhoneNo' => 'required',
        'NIN' => 'required'
    ];

    
}
