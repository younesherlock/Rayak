<?php

namespace Db\CreatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Db\CreatorBundle\Entity\Patent;

/**
 * Applicant
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Applicant
{

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="fullName", type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\ManyToMany(targetEntity="Patent", mappedBy="applicants")
     */
    private $patents;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="applicants")
     * @ORM\JoinColumn(name="country_code", referencedColumnName="code")
     */
    private $country;

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
     * Set fullName
     *
     * @param string $fullName
     * @return Applicant
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patents = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add patents
     *
     * @param \Db\CreatorBundle\Entity\Patent $patents
     * @return Applicant
     */
    public function addPatent(\Db\CreatorBundle\Entity\Patent $patents)
    {
        $this->patents[] = $patents;

        return $this;
    }

    /**
     * Remove patents
     *
     * @param \Db\CreatorBundle\Entity\Patent $patents
     */
    public function removePatent(\Db\CreatorBundle\Entity\Patent $patents)
    {
        $this->patents->removeElement($patents);
    }

    /**
     * Get patents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPatents()
    {
        return $this->patents;
    }

    /**
     * Set country
     *
     * @param \Db\CreatorBundle\Entity\Country $country
     * @return Applicant
     */
    public function setCountry(\Db\CreatorBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Db\CreatorBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

}
