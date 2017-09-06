<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Exercise;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class FixtureLoader implements FixtureInterface
{
    const EXERCISE_LIST = [
        'Exercise A',
        'Exercise B',
        'Exercise C',
    ];

    public function load(ObjectManager $manager)
    {
        //Occam's razor don't need to create new provider in small project
        Fixtures::load(__DIR__.'/fixtures.yml', $manager, ['providers' => [$this]]);
    }

    public function getExerciseDescription()
    {
        $key = array_rand($this::EXERCISE_LIST);

        return $this::EXERCISE_LIST[$key];
    }
}