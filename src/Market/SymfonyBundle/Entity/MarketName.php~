<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MarketName
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MarketName
{
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Category", mappedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(name="marketName", type="string", length=255, nullable=false)
     */
    private $marketName;

    /**
     * @var string
     */
    private $marketAddress;

    /**
     * @var string
     */
    private $marketContact;

    /**
     * @var string
     */
    private $openingHours;


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
     * Set marketName
     *
     * @param string $marketName
     *
     * @return MarketName
     */
    public function setMarketName($marketName)
    {
        $this->marketName = $marketName;

        return $this;
    }

    /**
     * Get marketName
     *
     * @return string
     */
    public function getMarketName()
    {
        return $this->marketName;
    }

    /**
     * Set marketAddress
     *
     * @param string $marketAddress
     *
     * @return MarketName
     */
    public function setMarketAddress($marketAddress)
    {
        $this->marketAddress = $marketAddress;

        return $this;
    }

    /**
     * Get marketAddress
     *
     * @return string
     */
    public function getMarketAddress()
    {
        return $this->marketAddress;
    }

    /**
     * Set marketContact
     *
     * @param string $marketContact
     *
     * @return MarketName
     */
    public function setMarketContact($marketContact)
    {
        $this->marketContact = $marketContact;

        return $this;
    }

    /**
     * Get marketContact
     *
     * @return string
     */
    public function getMarketContact()
    {
        return $this->marketContact;
    }

    /**
     * Set openingHours
     *
     * @param string $openingHours
     *
     * @return MarketName
     */
    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    /**
     * Get openingHours
     *
     * @return string
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

     function getCategory() {
        return $this->category;
    }

    function setCategory(Category $category) {
        $this->category = $category;
    }
    /**
     * @var integer
     */
    private $id;


}
