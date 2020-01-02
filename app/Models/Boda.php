<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Boda
 * @package App\Models
 * @version January 2, 2020, 5:44 pm UTC
 *
 * @property string plate
 * @property string FirstName
 * @property string LastName
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
        'NIN' => 'required'
    ];

    
}
