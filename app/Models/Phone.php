<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phone
 * @package App\Models
 * @version December 13, 2019, 5:22 pm UTC
 *
 * @property integer rider
 * @property string phone
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
        'rider',
        'phone',
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
        'rider' => 'integer',
        'phone' => 'string',
        'pin' => 'string',
        'active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rider' => 'required',
        'phone' => 'required',
        'pin' => 'required',
        'active' => 'required'
    ];

    
}
