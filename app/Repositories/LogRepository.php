<?php

namespace App\Repositories;

use App\Models\Log;
use App\Repositories\BaseRepository;

/**
 * Class LogRepository
 * @package App\Repositories
 * @version January 2, 2020, 5:45 pm UTC
*/

class LogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'passPhone',
        'riderPhone',
        'plate_Id',
        'approved',
        'location'
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
        return Log::class;
    }
}
