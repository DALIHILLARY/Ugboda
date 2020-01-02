<?php

namespace App\Repositories;

use App\Models\Boda;
use App\Repositories\BaseRepository;

/**
 * Class BodaRepository
 * @package App\Repositories
 * @version January 2, 2020, 5:44 pm UTC
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
