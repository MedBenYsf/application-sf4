<?php

namespace App\Tests\Entity;

use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    /**
     * @test
     */
    public function isExpiredProject()
    {
        $project1 = new Project();
        $project1->setExpiredOn(new \DateTime('-1 day'));
        $project2 = new Project();
        $project2->setExpiredOn(new \DateTime('+1 day'));
        $this->assertSame(true, $project1->isExpired());
        $this->assertSame(false, $project2->isExpired());
    }
}
