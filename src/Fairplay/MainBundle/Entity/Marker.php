<?php

namespace Fairplay\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marker
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fairplay\MainBundle\Entity\MarkerRepository")
 */
class Marker
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var Stadium
     * @ORM\OneToOne(targetEntity="Stadium", inversedBy="marker")
     */
    private $stadium;


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
     * Set latitude
     *
     * @param float $latitude
     * @return Marker
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Marker
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set stadium
     *
     * @param \Fairplay\MainBundle\Entity\Stadium $stadium
     * @return Marker
     */
    public function setStadium(\Fairplay\MainBundle\Entity\Stadium $stadium = null)
    {
        $this->stadium = $stadium;
    
        return $this;
    }

    /**
     * Get stadium
     *
     * @return \Fairplay\MainBundle\Entity\Stadium 
     */
    public function getStadium()
    {
        return $this->stadium;
    }
}