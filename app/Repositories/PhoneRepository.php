<?php

namespace App\Repositories;

use App\Models\Phone;
use App\Repositories\BaseRepository;

/**
 * Class PhoneRepository
 * @package App\Repositories
 * @version December 11, 2019, 7:31 am UTC
*/

class PhoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rider',
        'active'
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
        return Phone::class;
    }
}
