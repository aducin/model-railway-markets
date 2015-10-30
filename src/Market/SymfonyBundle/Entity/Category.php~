<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category
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
     * @ORM\Column(name="CategoryName", type="string", length=255, nullable=false)
     */
    private $categoryName;


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
     * Set categoryName
     *
     * @param string $categoryName
     *
     * @return Category
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
      * @ORM\OneToMany(targetEntity="MarketName", mappedBy="category")
      */
     protected $products;

     public function __construct()
     {
         $this->products = new ArrayCollection();
     }

     public function getProducts() {
        return $this->products;
    }

    public function addProducts($marketName) {
        $this->products=$marketName;
    }
}
