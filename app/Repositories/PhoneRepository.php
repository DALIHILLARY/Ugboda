<?php

namespace App\Repositories;

use App\Models\Phone;
use App\Repositories\BaseRepository;

/**
 * Class PhoneRepository
 * @package App\Repositories
 * @version December 13, 2019, 5:22 pm UTC
*/

class PhoneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rider',
        'phone',
        'pin',
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
