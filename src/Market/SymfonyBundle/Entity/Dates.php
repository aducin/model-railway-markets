<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Market\SymfonyBundle\Entity\Bookmark;
use Market\SymfonyBundle\Entity\Markets;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dates
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Market\SymfonyBundle\Entity\DatesRepository")
 */
class Dates
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
     * @var \DateTime
     */
    public $marketDate;

    /**
     * @ORM\ManyToOne(targetEntity="Market\SymfonyBundle\Entity\Markets", inversedBy="date")
     * @ORM\JoinColumn(name="market_id", referencedColumnName="id")
     */
    protected $market;


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
     * Set marketDate
     *
     * @param \DateTime $marketDate
     *
     * @return Dates
     */
    public function setMarketDate($marketDate)
    {
        $this->marketDate = $marketDate;

        return $this;
    }

    /**
     * Get marketDate
     *
     * @return \DateTime
     */
    public function getMarketDate()
    {
        return $this->marketDate;
    }


    /**
     * Set market
     *
     * @param \Market\SymfonyBundle\Entity\Markets $market
     *
     * @return Dates
     */
    public function setMarket(\Market\SymfonyBundle\Entity\Markets $market = null)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Market\SymfonyBundle\Entity\Markets
     */
    public function getMarket()
    {
        return $this->market;
    }
}
