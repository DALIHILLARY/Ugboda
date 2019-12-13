<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version December 13, 2019, 5:22 pm UTC
 *
 * @property string plate
 * @property string phone
 * @property string category
 * @property string progress
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'report';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'plate',
        'phone',
        'category',
        'progress'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plate' => 'string',
        'phone' => 'string',
        'category' => 'string',
        'progress' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'plate' => 'required',
        'phone' => 'required',
        'category' => 'required',
        'progress' => 'required'
    ];

    
}
