<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Market\SymfonyBundle\Entity\Bookmark;
use Market\SymfonyBundle\Entity\Dates;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Markets
 *
 * @ORM\Entity(repositoryClass="Market\SymfonyBundle\Entity\MarketRepository")
 */
class Markets
{
    /**
     * @ORM\Entity
     * @ORM\Table(name="markets")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="Bookmark", inversedBy="markets")
     * @ORM\JoinColumn(name="bookmark_id", referencedColumnName="id")
     */
    protected $bookmark;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $marketCity;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $hours;

    /**
      *
      * @ORM\OneToMany(targetEntity="Market\SymfonyBundle\Entity\Dates", mappedBy="market")
      */
    protected $date;

    public function __construct()
    {
        $this->date = new ArrayCollection();
    }


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
     * Set marketCity
     *
     * @param string $marketCity
     *
     * @return Markets
     */
    public function setMarketCity($marketCity)
    {
        $this->marketCity = $marketCity;

        return $this;
    }

    /**
     * Get marketCity
     *
     * @return string
     */
    public function getMarketCity()
    {
        return $this->marketCity;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Markets
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
     * Set contact
     *
     * @param string $contact
     *
     * @return Markets
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set hours
     *
     * @param string $hours
     *
     * @return Markets
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return string
     */
    public function getHours()
    {
        return $this->hours;
    }


    /**
     * Add date
     *
     * @param \Market\SymfonyBundle\Entity\Dates $date
     *
     * @return Markets
     */
    public function addDate(\Market\SymfonyBundle\Entity\Dates $date)
    {
        $this->date[] = $date;

        return $this;
    }

    /**
     * Remove date
     *
     * @param \Market\SymfonyBundle\Entity\Dates $date
     */
    public function removeDate(\Market\SymfonyBundle\Entity\Dates $date)
    {
        $this->date->removeElement($date);
    }

    /**
     * Get date
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set bookmark
     *
     * @param \Market\SymfonyBundle\Entity\Bookmark $bookmark
     *
     * @return Markets
     */
    public function setBookmark(\Market\SymfonyBundle\Entity\Bookmark $bookmark = null)
    {
        $this->bookmark = $bookmark;

        return $this;
    }

    /**
     * Get bookmark
     *
     * @return \Market\SymfonyBundle\Entity\Bookmark
     */
    public function getBookmark()
    {
        return $this->bookmark;
    }
}
