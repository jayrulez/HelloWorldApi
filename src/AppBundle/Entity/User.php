<?php

/**
 * Copyright (C) Senit Financial Services Inc - All rights Reserved
 * Written by Senit Financial Services Inc (www.senit.com)
 *
 * This file is part of the Senit Money Transfer platform
 * Unauthorized copying of this file, via any medium is strictly 
 * prohibited without express permission from Senit Financial Services
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @UniqueEntity(fields={"username"}, errorPath="username", message="The username is already in use.")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=32, unique=true)
     *
     * @Assert\NotBlank(message="Username is required.")
     * @Assert\Length(
     *      min=3, 
     *      max=15, 
     *      minMessage="Username must be at least {{ limit }} characters long.",
     *      maxMessage="Username can be at most {{ limit }} characters long."
     * )
     */
    protected $username;
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     *
     * @Assert\NotBlank(message="Password is required.")
     * @Assert\Length(
     *      min=6,
     *      minMessage="Password must be at least {{ limit }} characters long."
     * )
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;


    public function getId()
    {
        return $this->id;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
