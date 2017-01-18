<?php

namespace Aso\GestionUtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aso\GestionUtilisateurBundle\Entity\EmailRepository")
 */
class Email {
	/**
	 *
	 * @var integer @ORM\Column(name="id", type="integer")
	 *      @ORM\Id
	 *      @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 *
	 * @var string @ORM\Column(name="email", type="string", length=30, nullable=false, unique=true)
	 */
	private $email;
	
	/**
	 *
	 * @var string @ORM\Column(name="validationCode", type="string", length=50, nullable=false)
	 */
	private $validationCode;
	
	/**
	 *
	 * @var boolean @ORM\Column(name="isValid", type="boolean", nullable=false)
	 */
	private $isValid;
	
	/**
	 *
	 * @var boolean @ORM\Column(name="isPublic", type="boolean", nullable=false)
	 */
	private $isPublic;
	
	/**
	 *
	 * @var \DateTime @ORM\Column(name="updateDate", type="datetime", nullable=false)
	 */
	private $updateDate;
	public function __construct() {
		$this->isValid = false;
		$this->isPublic = false;
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
	 * Set email
	 *
	 * @param string $email        	
	 * @return Email
	 */
	public function setEmail($email) {
		$this->email = $email;
		
		return $this;
	}
	
	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * Set validationCode
	 *
	 * @param string $validationCode        	
	 * @return Email
	 */
	public function setValidationCode($validationCode) {
		$this->validationCode = $validationCode;
		
		return $this;
	}
	
	/**
	 * Get validationCode
	 *
	 * @return string
	 */
	public function getValidationCode() {
		return $this->validationCode;
	}
	
	/**
	 * Set isValid
	 *
	 * @param boolean $isValid        	
	 * @return Email
	 */
	public function setIsValid($isValid) {
		$this->isValid = $isValid;
		
		return $this;
	}
	
	/**
	 * Get isValid
	 *
	 * @return boolean
	 */
	public function getIsValid() {
		return $this->isValid;
	}
	
	/**
	 * Set isPublic
	 *
	 * @param boolean $isPublic        	
	 * @return Email
	 */
	public function setIsPublic($isPublic) {
		$this->isPublic = $isPublic;
		
		return $this;
	}
	
	/**
	 * Get isPublic
	 *
	 * @return boolean
	 */
	public function getIsPublic() {
		return $this->isPublic;
	}
	
	/**
	 * Set updateDate
	 *
	 * @param \DateTime $updateDate        	
	 * @return Email
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
	
	/**
	 *
	 * @param
	 *        	$id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
}
