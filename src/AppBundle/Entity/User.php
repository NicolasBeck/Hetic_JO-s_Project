<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{

    public function __construct() {
        $this->followedProjects = new ArrayCollection();
        $this->participatingProject = new ArrayCollection();
        $this->createdProject = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zipccode", type="string", length=255, nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(name="profile_picture", type="string", length=255, nullable=true)
     *
     */
    private $profilePicture;

    /**
     * @ORM\ManyToMany(targetEntity="Project", inversedBy="users")
     * @ORM\JoinTable(name="users_projects_follow")
     */
    private $followedProjects;

    /**
     * @ORM\ManyToMany(targetEntity="Project", inversedBy="users")
     * @ORM\JoinTable(name="users_projects_participate")
     */
    private $participatingProject;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="creator")
     */
    private $createdProject;

    /**
     * @ORM\Column(type="array", nullable=true)
     *
     */
    private $roles;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
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

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return User
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set profilePicture
     *
     * @param string $profilePicture
     *
     * @return User
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }


    /**
     * Add followedProject
     *
     * @param \AppBundle\Entity\Project $followedProject
     *
     * @return User
     */
    public function addFollowedProject(\AppBundle\Entity\Project $followedProject)
    {
        $this->followedProjects[] = $followedProject;

        return $this;
    }

    /**
     * Remove followedProject
     *
     * @param \AppBundle\Entity\Project $followedProject
     */
    public function removeFollowedProject(\AppBundle\Entity\Project $followedProject)
    {
        $this->followedProjects->removeElement($followedProject);
    }

    /**
     * Get followedProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFollowedProjects()
    {
        return $this->followedProjects;
    }

    /**
     * Add participatingProject
     *
     * @param \AppBundle\Entity\Project $participatingProject
     *
     * @return User
     */
    public function addParticipatingProject(\AppBundle\Entity\Project $participatingProject)
    {
        $this->participatingProject[] = $participatingProject;

        return $this;
    }

    /**
     * Remove participatingProject
     *
     * @param \AppBundle\Entity\Project $participatingProject
     */
    public function removeParticipatingProject(\AppBundle\Entity\Project $participatingProject)
    {
        $this->participatingProject->removeElement($participatingProject);
    }

    /**
     * Get participatingProject
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipatingProject()
    {
        return $this->participatingProject;
    }

    /**
     * Add createdProject
     *
     * @param \AppBundle\Entity\Project $createdProject
     *
     * @return User
     */
    public function addCreatedProject(\AppBundle\Entity\Project $createdProject)
    {
        $this->createdProject[] = $createdProject;

        return $this;
    }

    /**
     * Remove createdProject
     *
     * @param \AppBundle\Entity\Project $createdProject
     */
    public function removeCreatedProject(\AppBundle\Entity\Project $createdProject)
    {
        $this->createdProject->removeElement($createdProject);
    }

    /**
     * Get createdProject
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreatedProject()
    {
        return $this->createdProject;
    }

    /**
     * Set roles
     *
     * @param (Role|string)[] The user roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        return null;
    }
}
