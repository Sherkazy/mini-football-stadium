<?php

namespace Fairplay\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stadium
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fairplay\MainBundle\Entity\StadiumRepository")
 */
class Stadium
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var District
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    private $district;

    /**
     * @ORM\ManyToMany(targetEntity="Facility")
     * @ORM\JoinTable(name="stadium_facilities",
     *      joinColumns={@ORM\JoinColumn(name="stadium_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="facility_id", referencedColumnName="id")}
     *      )
     */
    private $facilities;

    public function __construct() {
        $this->facilities = new ArrayCollection();
        $this->setAmount(0);
        $this->setScore(0);
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="score", type="decimal", precision=3, scale=1)
     */
    private $score;

    /**
     * @var Gallery
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Gallery")
     * @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     */
    private $gallery;

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
     * Set name
     *
     * @param string $name
     * @return Stadium
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Stadium
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Stadium
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set district
     *
     * @param \Fairplay\MainBundle\Entity\District $district
     * @return Stadium
     */
    public function setDistrict(\Fairplay\MainBundle\Entity\District $district = null)
    {
        $this->district = $district;
    
        return $this;
    }

    /**
     * Get district
     *
     * @return \Fairplay\MainBundle\Entity\District 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Add facilities
     *
     * @param \Fairplay\MainBundle\Entity\Facility $facilities
     * @return Stadium
     */
    public function addFacility(\Fairplay\MainBundle\Entity\Facility $facilities)
    {
        $this->facilities[] = $facilities;

        return $this;
    }

    /**
     * Remove facilities
     *
     * @param \Fairplay\MainBundle\Entity\Facility $facilities
     */
    public function removeFacility(\Fairplay\MainBundle\Entity\Facility $facilities)
    {
        $this->facilities->removeElement($facilities);
    }

    /**
     * Get facilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacilities()
    {
        return $this->facilities;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     * @return Stadium
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set score
     *
     * @param float $score
     * @return Stadium
     */
    public function setScore($score)
    {
        $this->score = $score;
    
        return $this;
    }

    /**
     * Get score
     *
     * @return float 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set gallery
     *
     * @param \Application\Sonata\MediaBundle\Entity\Gallery $gallery
     * @return Stadium
     */
    public function setGallery(\Application\Sonata\MediaBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;
    
        return $this;
    }

    /**
     * Get gallery
     *
     * @return \Application\Sonata\MediaBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}