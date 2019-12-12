<?php

namespace App\Repositories;

use App\Models\Rider;
use App\Repositories\BaseRepository;

/**
 * Class RiderRepository
 * @package App\Repositories
 * @version December 11, 2019, 7:30 am UTC
*/

class RiderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'FirstName',
        'LastName',
        'District',
        'Plate'
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
