<?php
namespace AppBundle\Services;

use AppBundle\Entity\Exercise;
use Doctrine\Common\Persistence\ObjectRepository;

class ExerciseHelper
{
    /**
     * @var ObjectRepository
     */
    private $exerciseRepository;

    /**
     * ExerciseHelper constructor.
     * @param ObjectRepository $exerciseRepository
     */
    public function __construct(ObjectRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    //todo I think that method not need to be at Helper. I think Controller need to call repository without service
    /**
     * @return Exercise[]
     */
    public function getAllExercise() {
        return $this->exerciseRepository->findAll();
    }

    /**
     * @param Exercise[] $exercises
     * @return array
     */
    public function sortExerciseByShortDescription(array $exercises)
    {
        $result = [];

        foreach ($exercises as $exercise) {
            if (empty($result[$exercise->getShortDescription()])) {
                $result[$exercise->getShortDescription()] = [];
            }

            $result[$exercise->getShortDescription()][] = $exercise;
        }

        return $result;
    }

    /**
     * Sort exercises by week @todo I confused about correctly filtering data
     *
     * @param Exercise[] $exercises
     * @return array
     */
    public function sortExercisesByWeeks(array $exercises)
    {
        $result = [
            'moreThenTwoWeek' => [],
            'twoWeekAgo' => [],
            'oneWeekAgo' => [],
            'today' => [],
        ];

        $today = new \DateTime(date('Y-m-d'));
        $oneWeekAgo = new \DateTime(date('Y-m-d', strtotime("-1 week")));
        $twoWeekAgo = new \DateTime(date('Y-m-d', strtotime("-2 week")));

        foreach ($exercises as $exercise) {
            $exerciseDate = $exercise->getDate();

            if ($exerciseDate == $today) {
                $result['today'][] = $exercise;
            } elseif ($exerciseDate >= $oneWeekAgo && $exerciseDate < $today) {
                $result['oneWeekAgo'][] = $exercise;
            } elseif($exerciseDate >= $twoWeekAgo && $exerciseDate < $oneWeekAgo) {
                $result['twoWeekAgo'][] = $exercise;
            } else {
                $result['moreThenTwoWeek'][] = $exercise;
            }
        }

        return $result;
    }
}