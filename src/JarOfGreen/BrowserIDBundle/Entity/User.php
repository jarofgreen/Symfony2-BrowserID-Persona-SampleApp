<?php

namespace JarOfGreen\BrowserIDBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class User {
	
	/**
	 * @var string
     * @ORM\Column(type="string")
     */	
	protected $email;
	
    /**
     * Set email
     *
     * @param string $email
     * @return User
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
	
}

