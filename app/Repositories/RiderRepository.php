<?php

namespace App\Repositories;

use App\Models\Rider;
use App\Repositories\BaseRepository;

/**
 * Class RiderRepository
 * @package App\Repositories
 * @version December 31, 2019, 2:48 pm UTC
*/

class RiderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rider::class;
    }
}
