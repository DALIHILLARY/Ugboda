<?php

namespace App\Repositories;

use App\Models\Boda;
use App\Repositories\BaseRepository;

/**
 * Class BodaRepository
 * @package App\Repositories
 * @version December 31, 2019, 6:05 pm UTC
*/

class BodaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'plate',
        'FirstName',
        'LastName',
        'PhoneNo',
        'NIN'
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
        return Boda::class;
    }
}
