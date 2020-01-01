<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class District
 * @package App\Models
 * @version December 30, 2019, 5:47 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection regions
 * @property \Illuminate\Database\Eloquent\Collection riders
 * @property \Illuminate\Database\Eloquent\Collection stagedetails
 * @property string name
 */
class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function regions()
    {
        return $this->hasMany(\App\Models\Region::class, 'District_Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function riders()
    {
        return $this->hasMany(\App\Models\Rider::class, 'District_Id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stagedetails()
    {
        return $this->hasMany(\App\Models\Stagedetail::class, 'District_Id');
    }
}
