<?php

namespace Aso\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aso\GestionUtilisateurBundle\Entity\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="matricule", type="string", length=20, nullable=false, unique=true)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="datetime", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="villeNaissance", type="string", length=20, nullable=false)
     */
    private $villeNaissance;

    
    /**
     * @var integer
     *
     * @ORM\Column(name="paysNaissance", type="integer", length=5)
     */
    private $paysNaissance;
    
    /**
     * @ORM\OneToOne(targetEntity="Aso\GestionUtilisateurBundle\Entity\Email", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $email;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="sexe", type="integer", length=5)
     */
    private $sexe;
    
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=2, nullable=true)
     */
    private $langue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isAdmin", type="boolean", nullable=false)
     */
    private $isAdmin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isContinent", type="boolean", nullable=false)
     */
    private $isContinent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isPays", type="boolean", nullable=false)
     */
    private $isPays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="datetime", nullable=false)
     */
    private $updateDate;

	public function __construct(){
		$this->isAdmin=false;
		$this->isContinent=false;
		$this->isPays=false;
		$this->updateDate=new \DateTime();
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
     * Set matricule
     *
     * @param string $matricule
     * @return Utilisateur
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    
        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set villeNaissance
     *
     * @param string $villeNaissance
     * @return Utilisateur
     */
    public function setVilleNaissance($villeNaissance)
    {
        $this->villeNaissance = $villeNaissance;
    
        return $this;
    }

    /**
     * Get villeNaissance
     *
     * @return string 
     */
    public function getVilleNaissance()
    {
        return $this->villeNaissance;
    }

    /**
     * Set paysNaissance
     *
     * @param integer $paysNaissance
     * @return Utilisateur
     */
    public function setPaysNaissance($paysNaissance)
    {
        $this->paysNaissance = $paysNaissance;
    
        return $this;
    }

    /**
     * Get paysNaissance
     *
     * @return integer 
     */
    public function getPaysNaissance()
    {
        return $this->paysNaissance;
    }

    /**
     * Set sexe
     *
     * @param integer $sexe
     * @return Utilisateur
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    
        return $this;
    }

    /**
     * Get sexe
     *
     * @return integer 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Utilisateur
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
     * Set langue
     *
     * @param string $langue
     * @return Utilisateur
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    
        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     * @return Utilisateur
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    
        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean 
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set isContinent
     *
     * @param boolean $isContinent
     * @return Utilisateur
     */
    public function setIsContinent($isContinent)
    {
        $this->isContinent = $isContinent;
    
        return $this;
    }

    /**
     * Get isContinent
     *
     * @return boolean 
     */
    public function getIsContinent()
    {
        return $this->isContinent;
    }

    /**
     * Set isPays
     *
     * @param boolean $isPays
     * @return Utilisateur
     */
    public function setIsPays($isPays)
    {
        $this->isPays = $isPays;
    
        return $this;
    }

    /**
     * Get isPays
     *
     * @return boolean 
     */
    public function getIsPays()
    {
        return $this->isPays;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Utilisateur
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    
        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set email
     *
     * @param \Aso\GestionUtilisateurBundle\Entity\Email $email
     * @return Utilisateur
     */
    public function setEmail(\Aso\GestionUtilisateurBundle\Entity\Email $email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return \Aso\GestionUtilisateurBundle\Entity\Email 
     */
    public function getEmail()
    {
        return $this->email;
    }
}