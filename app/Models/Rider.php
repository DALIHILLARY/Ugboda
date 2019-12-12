<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rider
 * @package App\Models
 * @version December 11, 2019, 7:30 am UTC
 *
 * @property string FirstName
 * @property string LastName
 * @property string District
 * @property string Plate
 */
class Rider extends Model
{
    use SoftDeletes;

    public $table = 'rider';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'FirstName',
        'LastName',
        'District',
        'Plate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'FirstName' => 'string',
        'LastName' => 'string',
        'District' => 'string',
        'Plate' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'FirstName' => 'required',
        'LastName' => 'required',
        'District' => 'required',
        'Plate' => 'required'
    ];

    
}
