<?php

namespace AppBundle\Controller;

use AppBundle\Services\ExerciseHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        /** @var ExerciseHelper $exerciseHelper */
        $exerciseHelper = $this->get('app_bundle.exercise_helper');

        $exercises = $exerciseHelper->getAllExercise();
        $sortingExercise = $exerciseHelper->sortExercisesByWeeks($exercises);

        return $this->render('AppBundle:Default:exercise-list.html.twig', [
            'exercisesByWeek' => $sortingExercise,
        ]);
    }
}
