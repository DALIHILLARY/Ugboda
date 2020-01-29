<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version January 2, 2020, 9:44 pm UTC
 *
 * @property \App\Models\Rider rider
 * @property integer rider_Id
 * @property string plate_Id
 * @property string phone
 * @property string category
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
        'category',
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
        'category' => 'string',
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
        'category' => 'required',
        'progress' => 'required',
        'location' => 'required'
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content','iconx',
    ];

    /**
     * Get report name_link attribute.
     *
     * @return string
     */

     public function getNameLinkAttribute()
     {
         $title = __('app.show_detail_title', [
             'name' => $this->plate_Id, 'type' => __('report.report'),
         ]);
         $link = '<a href="'.route('reports.show', $this).'"';
         $link .= ' title="'.$title.'">';
         $link .= $this->plate_Id;
         $link .= '</a>';

         return $link;
     }


    /**
     * Get report coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {

            return $this->location;
    }
    /**
     * Get report Icon attribute
     *
     * @return string
     */
    public function getIconxAttribute()
    {
        if($this->category == "RAPE"){
            return 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png';
        }
        elseif($this->category == "MURDER"){
            return 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png';
        }
        elseif($this->category == "THEFT"){
            return 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png';
        }
        else{
            return 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png';
        }
    }

    /**
     * Get report map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('report.plate_Id').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('report.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rider()
    {
        return $this->belongsTo(\App\Models\Rider::class, 'rider_Id');
    }
}
