<?php

namespace AppBundle\Controller;

use AppBundle\Services\ExerciseHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        /** @var \Doctrine\Common\Persistence\ObjectManager */
        $em = $this->getDoctrine()->getManager();

        /** @var \Doctrine\Common\Persistence\ObjectRepository */
        $exerciseRepository = $em->getRepository('AppBundle:Exercise');
        /** @var ExerciseHelper $exerciseHelper */
        $exerciseHelper = $this->get('app_bundle.exercise_helper');

        $exercises = $exerciseRepository->findAll();

        $sortingExercise = $exerciseHelper->sortExercisesByWeeks($exercises);

        return $this->render('default/exercise-list.html.twig', [
            'exercisesByWeek' => $sortingExercise,
        ]);
    }
}
