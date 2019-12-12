<?php

namespace App\Repositories;

use App\Models\Submenu;
use App\Repositories\BaseRepository;

/**
 * Class SubmenuRepository
 * @package App\Repositories
 * @version December 11, 2019, 7:30 am UTC
*/

class SubmenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent',
        'child'
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
        return Submenu::class;
    }
}
