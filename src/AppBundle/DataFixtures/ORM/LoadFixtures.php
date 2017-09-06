<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Exercise;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures
{

    const EXERCISE_LIST = [
        'Exercise A',
        'Exercise B',
        'Exercise C',
    ];

    public function load(ObjectManager $manager)
    {
        return Fixtures::load(__DIR__.'/fixtures.yml', $manager, ['providers' => [$this]]);
    }


    public function getExerciseDescription()
    {
        $key = array_rand($this::EXERCISE_LIST);

        return $this::EXERCISE_LIST[$key];
    }
}