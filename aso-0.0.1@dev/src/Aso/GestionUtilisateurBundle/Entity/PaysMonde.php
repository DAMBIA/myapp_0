<?php

namespace Aso\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaysMonde
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aso\GestionUtilisateurBundle\Entity\PaysMondeRepository")
 */
class PaysMonde
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
     * @ORM\Column(name="code", type="string", length=3)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2)
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3)
     */
    private $alpha3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_en_gb", type="string", length=45)
     */
    private $nomEnGb;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fr_fr", type="string", length=45)
     */
    private $nomFrFr;


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
     * Set code
     *
     * @param string $code
     * @return PaysMonde
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return PaysMonde
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;
    
        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return PaysMonde
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;
    
        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set nomEnGb
     *
     * @param string $nomEnGb
     * @return PaysMonde
     */
    public function setNomEnGb($nomEnGb)
    {
        $this->nomEnGb = $nomEnGb;
    
        return $this;
    }

    /**
     * Get nomEnGb
     *
     * @return string 
     */
    public function getNomEnGb()
    {
        return $this->nomEnGb;
    }

    /**
     * Set nomFrFr
     *
     * @param string $nomFrFr
     * @return PaysMonde
     */
    public function setNomFrFr($nomFrFr)
    {
        $this->nomFrFr = $nomFrFr;
    
        return $this;
    }

    /**
     * Get nomFrFr
     *
     * @return string 
     */
    public function getNomFrFr()
    {
        return $this->nomFrFr;
    }
}
