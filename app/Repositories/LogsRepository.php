<?php

namespace App\Repositories;

use App\Models\Logs;
use App\Repositories\BaseRepository;

/**
 * Class LogsRepository
 * @package App\Repositories
 * @version December 30, 2019, 5:50 am UTC
*/

class LogsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'passPhone',
        'riderPhone',
        'plate_id',
        'approved'
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
        return Logs::class;
    }
}
