<?php

namespace Biz\Course\Dao\Impl;

use Biz\Course\Dao\CourseSetDao;

class CourseSetDaoImpl extends SoftDeleteDaoImpl implements CourseSetDao
{
    protected $table = 'c2_course_set';

    public function declares()
    {
    }
}
