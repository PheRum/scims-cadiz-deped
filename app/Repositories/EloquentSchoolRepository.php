<?php

namespace App\Repositories;

use Exception;
use App\Models\School;
use App\Exceptions\GeneralException;
use App\Repositories\Contracts\SchoolRepository;

/**
 * Class EloquentSchoolRepository.
 */
class EloquentSchoolRepository extends EloquentBaseRepository implements SchoolRepository
{
    /**
     * EloquentSchoolRepository constructor.
     *
     * @param School $school
     */
    public function __construct(School $school)
    {
        parent::__construct($school);
    }

    /**
     * @param array $input
     *
     * @throws \Exception|\Throwable
     *
     * @return \App\Models\School
     */
    public function store(array $input)
    {
        /** @var School $school */
        $school = $this->make($input);

        if (!$this->save($school, $input)) {
            throw new GeneralException(__('exceptions.backend.schools.create'));
        }

        return $school;
    }

    /**
     * @param School  $school
     * @param array $input
     *
     * @throws Exception
     * @throws \Exception|\Throwable
     *
     * @return \App\Models\School
     */
    public function update(School $school, array $input)
    {
        $school->fill($input);

        if (!$this->save($school, $input)) {
            throw new GeneralException(__('exceptions.backend.schools.update'));
        }

        return $school;
    }

    /**
     * @param \App\Models\School $school
     * @param array            $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    private function save(School $school, array $input)
    {
        if (!$school->save($input)) {
            return false;
        }

        return true;
    }

    /**
     * @param School $school
     *
     * @throws \Exception|\Throwable
     *
     * @return bool|null
     */
    public function destroy(School $school)
    {
        if (!$school->delete()) {
            throw new GeneralException(__('exceptions.backend.schools.delete'));
        }

        return true;
    }
}
