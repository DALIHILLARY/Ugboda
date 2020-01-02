<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version January 2, 2020, 5:45 pm UTC
 *
 * @property \App\Models\Rider rider
 * @property integer rider_Id
 * @property string plate_Id
 * @property string phone
 * @property string catergory
 * @property string progress
 * @property string location
 */
class Report extends Model
{
    use SoftDeletes;

    public $table = 'report';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'rider_Id',
        'plate_Id',
        'phone',
        'catergory',
        'progress',
        'location'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rider_Id' => 'integer',
        'plate_Id' => 'string',
        'phone' => 'string',
        'catergory' => 'string',
        'progress' => 'string',
        'location' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rider_Id' => 'required',
        'plate_Id' => 'required',
        'phone' => 'required',
        'catergory' => 'required',
        'progress' => 'required',
        'location' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rider()
    {
        return $this->belongsTo(\App\Models\Rider::class, 'rider_Id');
    }
}
