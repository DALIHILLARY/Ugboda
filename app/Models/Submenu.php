<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Submenu
 * @package App\Models
 * @version December 11, 2019, 7:30 am UTC
 *
 * @property integer parent
 * @property integer child
 */
class Submenu extends Model
{
    use SoftDeletes;

    public $table = 'submenu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent',
        'child'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent' => 'integer',
        'child' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent' => 'required',
        'child' => 'required'
    ];

    
}
