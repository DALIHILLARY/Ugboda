<?php

namespace App\Repositories;

use App\Models\Rider;
use App\Repositories\BaseRepository;

/**
 * Class RiderRepository
 * @package App\Repositories
 * @version January 2, 2020, 5:42 pm UTC
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
        'District_Id',
        'plate_Id'
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
