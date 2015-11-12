<?php

namespace Market\SymfonyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Addresses
 *
 * @ORM\Table(name="addresses")
 * @ORM\Entity
 */
class Addresses
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
      * @Assert\NotBlank()
      */
    private $nameText;

    /**
      * @Assert\NotBlank()
      * @Assert\Type("String")
      */
    private $email;

    /**
      * @Assert\NotBlank()
      * @Assert\Type("String")
      */
    private $message;

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
     * Set nameText
     *
     * @param string $nameText
     *
     * @return Addresses
     */
    public function setNameText($nameText)
    {
        $this->nameText = $nameText;

        return $this;
    }

    /**
     * Get nameText
     *
     * @return string
     */
    public function getNameText()
    {
        return $this->nameText;
    }


    /**
     * Set email
     *
     * @param string $email
     *
     * @return Addresses
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Message
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function mailSend($mail, $message, $name)
    {
        $to      = 'ad9bis@gmail.com';
        $subject = $name .'- Wiadomość wysłana przez formularz - Terminy giełd';
        $message = htmlspecialchars($message, ENT_COMPAT, 'UTF-8');;
        $headers = "Reply-to: ".$name."<ad9bis@gmail.pl>".PHP_EOL;
        $headers .= "From: ".$mail.PHP_EOL;
        $headers .= "MIME-Version: 1.0".PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8".PHP_EOL; 
        if(mail($to, $subject, $message, $headers))
        {
            $result='Email został poprawnie wysłany!';
        }else{
            $result='Problem z wysłaniem maila! Przykro nam.';
        }
        return $result;
    }
}
