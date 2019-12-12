<?php

namespace App\Repositories;

use App\Models\Log;
use App\Repositories\BaseRepository;

/**
 * Class LogRepository
 * @package App\Repositories
 * @version December 11, 2019, 7:30 am UTC
*/

class LogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
