<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercise
 *
 * @ORM\Table(name="exercise")
 * @ORM\Entity
 */
class Exercise
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Short Description it is type of exercise
     *
     * @var string
     *
     * @ORM\Column(name="short_description", type="string", length=100)
     */
    protected $shortDescription;

    /**
     * @var integer
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="count_done", type="smallint")
     */
    protected $countDone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="time")
     */
    protected $time;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     * @return $this
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountDone()
    {
        return $this->countDone;
    }

    /**
     * @param int $countDone
     * @return $this
     */
    public function setCountDone($countDone)
    {
        $this->countDone = $countDone;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }
}
