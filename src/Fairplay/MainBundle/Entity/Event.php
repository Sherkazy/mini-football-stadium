<?php

namespace Fairplay\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fairplay\MainBundle\Entity\EventRepository")
 */
class Event
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
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allDay", type="boolean")
     * @SerializedName("allDay")
     */
    private $allDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="className", type="string", length=255)
     * @SerializedName("className")
     */
    private $className;

    /**
     * @var boolean
     *
     * @ORM\Column(name="editable", type="boolean")
     */
    private $editable;

    /**
     * @var string
     *
     * @ORM\Column(name="backgroundColor", type="string", length=255)
     * @SerializedName("backgroundColor")
     */
    private $backgroundColor;

    /**
     * @var string
     *
     * @ORM\Column(name="borderColor", type="string", length=20)
     * @SerializedName("borderColor")
     */
    private $borderColor;

    /**
     * @var string
     *
     * @ORM\Column(name="textColor", type="string", length=20)
     * @SerializedName("textColor")
     */
    private $textColor;

    /**
     * @var Stadium
     *@ORM\ManyToOne(targetEntity="Stadium", inversedBy="events")
     * @ORM\JoinColumn(name="stadium_id", referencedColumnName="id")
     */
    protected $stadium;
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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Event
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    
        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Event
     */
    public function setStart($start)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Event
     */
    public function setEnd($end)
    {
        $this->end = $end;
    
        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Event
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set className
     *
     * @param string $className
     * @return Event
     */
    public function setClassName($className)
    {
        $this->className = $className;
    
        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set editable
     *
     * @param boolean $editable
     * @return Event
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;
    
        return $this;
    }

    /**
     * Get editable
     *
     * @return boolean 
     */
    public function getEditable()
    {
        return $this->editable;
    }

    /**
     * Set backgroundColor
     *
     * @param string $backgroundColor
     * @return Event
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    
        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string 
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Set borderColor
     *
     * @param string $borderColor
     * @return Event
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;
    
        return $this;
    }

    /**
     * Get borderColor
     *
     * @return string 
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }

    /**
     * Set textColor
     *
     * @param string $textColor
     * @return Event
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;
    
        return $this;
    }

    /**
     * Get textColor
     *
     * @return string 
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set stadium
     *
     * @param \Fairplay\MainBundle\Entity\Stadium $stadium
     * @return Event
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