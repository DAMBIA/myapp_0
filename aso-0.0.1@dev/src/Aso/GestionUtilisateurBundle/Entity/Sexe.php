<?php

namespace Aso\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aso\GestionUtilisateurBundle\Entity\SexeRepository")
 */
class Sexe {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer")
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 *
	 * @var string @ORM\Column(name="libelle", type="string", length=1, nullable=false, unique=true)
	 */
	private $libelle;
	
	/**
	 *
	 * @var string @ORM\Column(name="nom", type="string", length=10, nullable=false, unique=true)
	 */
	private $nom;
	
	/**
	 *
	 * @var \DateTime @ORM\Column(name="updateDate", type="datetime", nullable=false)
	 */
	private $updateDate;
	public function __construct() {
		$this->updateDate = new \DateTime ();
	}
	
	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * Set libelle
	 *
	 * @param string $libelle        	
	 * @return Sexe
	 */
	public function setLibelle($libelle) {
		$this->libelle = $libelle;
		
		return $this;
	}
	
	/**
	 * Get libelle
	 *
	 * @return string
	 */
	public function getLibelle() {
		return $this->libelle;
	}
	
	/**
	 * Set nom
	 *
	 * @param string $nom        	
	 * @return Sexe
	 */
	public function setNom($nom) {
		$this->nom = $nom;
		
		return $this;
	}
	
	/**
	 * Get nom
	 *
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}
	
	/**
	 * Set updateDate
	 *
	 * @param \DateTime $updateDate        	
	 * @return Sexe
	 */
	public function setUpdateDate($updateDate) {
		$this->updateDate = $updateDate;
		
		return $this;
	}
	
	/**
	 * Get updateDate
	 *
	 * @return \DateTime
	 */
	public function getUpdateDate() {
		return $this->updateDate;
	}
}
