<?php

namespace JarOfGreen\SampleAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JarOfGreen\BrowserIDBundle\Entity\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_info")
 */
class User extends BaseUser {
	
	
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
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


}

