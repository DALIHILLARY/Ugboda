<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rider
 * @package App\Models
 * @version December 31, 2019, 2:48 pm UTC
 *
 * @property \App\Models\District district
 * @property \App\Models\Region region
 * @property \Illuminate\Database\Eloquent\Collection phones
 * @property \Illuminate\Database\Eloquent\Collection reports
 * @property string FirstName
 * @property string LastName
 * @property string gender
 * @property string NIN
 * @property string Next of Kin
 * @property integer District_Id
 * @property integer Region_Id
 * @property string plate_id
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
        'Next of Kin',
        'District_Id',
        'Region_Id',
        'plate_id'
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
        'Next of Kin' => 'string',
        'District_Id' => 'integer',
        'Region_Id' => 'integer',
        'plate_id' => 'string'
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
        'Next of Kin' => 'required',
        'District_Id' => 'required',
        'Region_Id' => 'required',
        'plate_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'District_Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'Region_Id');
    }

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
