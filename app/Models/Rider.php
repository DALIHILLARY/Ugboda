<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rider
 * @package App\Models
 * @version January 2, 2020, 5:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection phones
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property string FirstName
 * @property string LastName
 * @property string gender
 * @property string NIN
 * @property string District_Id
 * @property string plate_Id
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
        'gender',
        'NIN',
        'District_Id',
        'plate_Id'
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
        'gender' => 'string',
        'NIN' => 'string',
        'District_Id' => 'string',
        'plate_Id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'FirstName' => 'required',
        'LastName' => 'required',
        'gender' => 'required',
        'NIN' => 'required',
        'District_Id' => 'required',
        'plate_Id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phones()
    {
        return $this->hasMany(\App\Models\Phone::class, 'rider_Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reports()
    {
        return $this->hasMany(\App\Models\Report::class, 'rider_Id');
    }
}
