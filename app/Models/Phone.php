<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Phone
 * @package App\Models
 * @version December 11, 2019, 7:31 am UTC
 *
 * @property integer rider
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
        'active' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rider' => 'required',
        'active' => 'required'
    ];

    
}
