<?php
namespace AppBundle\Tests\Services;

use AppBundle\AppBundle;
use AppBundle\Entity\Exercise;
use Doctrine\Common\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityRepository as EntityRepository;

class ExerciseHelper extends TestCase
{
    public function testGetExercises() {
        $exerciseHelper = $this->createExerciseHelper();

        $this->assertEquals($exerciseHelper->getAllExercise(),[
            $this->createExercise(),
            $this->createExercise()
        ]);

    }

    /**
     * @return \AppBundle\Services\ExerciseHelper
     */
    public function createExerciseHelper() {
        $exerciseHelper = new \AppBundle\Services\ExerciseHelper(
            $this->createRepositoryExerciseMock()
        );

        return $exerciseHelper;
    }

    /**
     * @return EntityRepository
     */
    public function createRepositoryExerciseMock()
    {
        $mock = $this->createMock(ObjectRepository::class)
            ->method('findAll')
            ->willReturn([
                $this->createExercise(),
                $this->createExercise()
            ]);

        return $mock;
    }

    public function createEntityManagerMock() {

    }

    /**
     * @return Exercise
     */
    public function createExercise()
    {
        return (new Exercise())
            ->setCountDone(10)
            ->setDate(new \DateTime())
            ->setShortDescription('test A')
            ->setWeight(10)
            ->setTime(new \DateTime());
    }
}