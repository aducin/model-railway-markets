<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Market\SymfonyBundle\Entity\Markets;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bookmark
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Bookmark
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
     */
    private $bookmarkName;

    /**
     * @ORM\OneToMany(targetEntity="Markets", mappedBy="bookmark")
     */
     protected $markets;

     public function __construct()
     {
         $this->markets = new ArrayCollection();
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
     * Set bookmarkName
     *
     * @param string $bookmarkName
     *
     * @return Bookmark
     */
    public function setBookmarkName($bookmarkName)
    {
        $this->bookmarkName = $bookmarkName;

        return $this;
    }

    /**
     * Get bookmarkName
     *
     * @return string
     */
    public function getBookmarkName()
    {
        return $this->bookmarkName;
    }

    /**
     * Add market
     *
     * @param \Market\SymfonyBundle\Entity\Markets $market
     *
     * @return Bookmark
     */
    public function addMarket(\Market\SymfonyBundle\Entity\Markets $market)
    {
        $this->markets[] = $market;

        return $this;
    }

    /**
     * Remove market
     *
     * @param \Market\SymfonyBundle\Entity\Markets $market
     */
    public function removeMarket(\Market\SymfonyBundle\Entity\Markets $market)
    {
        $this->markets->removeElement($market);
    }

    /**
     * Get markets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkets()
    {
        return $this->markets;
    }
}
