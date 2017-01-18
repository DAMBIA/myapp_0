<?php

namespace Aso\GestionUtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aso\GestionUtilisateurBundle\Entity\Sexe;
use Aso\GestionUtilisateurBundle\Entity\PaysMonde;
use Aso\GestionUtilisateurBundle\Entity\Email;
use Symfony\Component\HttpFoundation\Response;
use Aso\GestionUtilisateurBundle\Entity\Utilisateur;

class GestionUtilisateurController extends Controller {
	public function inscriptionAction() {
		$this->get ( 'session' )->set ( '_locale', 'fr' );
		
		$request = $this->getRequest ();
		$request->setLocale ( $this->get ( 'session' )->get ( '_locale' ) );
		if ($this->get ( 'session' )->get ( 'userId' ) == "") {
			$getsexe = $this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:Sexe' );
			$sexe = $getsexe->findAll ();
			$getpays = $this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:PaysMonde' );
			$pays = $getpays->findAll ();
			return $this->render ( 'AsoGestionUtilisateurBundle:Default:inscription.html.twig', array (
					'sexes' => $sexe,
					'pays' => $pays 
			) );
		} else {
			return $this->redirect ( $this->generateUrl ( 'aso_utilisateur_home' ) );
		}
	}
	public function isAvailbleEmailAction() {
		$request = $this->container->get ( 'request' );
		$email = $request->request->get ( 'email' );
		$getEmail = $this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:Email' );
		$result = $getEmail->findByEmail ( $email );
		$a = false;
		if (empty ( $result )) {
			$a = true;
		}
		$reponse = new Response ( json_encode ( $a ) );
		$reponse->headers->set ( 'Content-Type', 'application/json' );
		return $reponse;
	}
	public function doInscriptionAction() {
		$request = $this->container->get ( 'request' );
		$user = new Utilisateur ();
		$user->setNom ( strtoupper ( $request->request->get ( 'nom' ) ) );
		$user->setPrenom ( ucwords ( strtolower ( $request->request->get ( 'prenom' ) ) ) );
		$user->setDateNaissance ( new \DateTime ( $request->request->get ( 'naissance_date' ) ) );
		$user->setVilleNaissance ( ucwords ( strtolower ( $request->request->get ( 'naissance_ville' ) ) ) );
		$user->setPaysNaissance ( $request->request->get ( 'naissance_pays' ) );
		$email = new Email ();
		$email->setEmail ( $request->request->get ( 'email' ) );
		
		$characts = 'abcdefghijklmnopqrstuvwxyz';
		$characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characts .= '1234567890';
		$validationCode = '';
		
		for($i = 0; $i < 10; $i ++) {
			$validationCode .= substr ( $characts, rand () % (strlen ( $characts )), 1 );
		}
		$email->setValidationCode ( $validationCode );
		$user->setEmail ( $email );
		$user->setPassword ( $request->request->get ( 'password' ) );
		$user->setSexe ( $request->request->get ( 'sexe' ) );
		$maxid = 1 + $this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' )->getMaxId ();
		$matricule = substr ( date ( "Y" ), - 2 ) . "-ASO-" . str_pad ( $maxid, 9, 0, STR_PAD_LEFT );
		$user->setMatricule ( $matricule );
		$inscription = $this->getDoctrine ()->getManager ();
		$inscription->persist ( $user );
		$inscription->flush ();
		
		$this->get ( 'session' )->getFlashBag ()->add ( 'message', array (
				'nom' => $user->getNom () . ' ' . $user->getPrenom () 
		) );
		$this->get ( 'session' )->getFlashBag ()->add ( 'invitation', array (
				'email' => $user->getEmail ()->getEmail () 
		) );
		
		$this->get ( 'session' )->set ( 'con_identifiant', $user->getEmail ()->getEmail () );
		return $this->redirect ( $this->generateUrl ( 'aso_gestion_utilisateur_connexion' ) );
	}
	public function connexionAction() {
		$request = $this->getRequest ();
		$request->setLocale ( $this->get ( 'session' )->get ( '_locale' ) );
		if ($this->get ( 'session' )->get ( 'userId' ) == "") {
			return $this->render ( 'AsoGestionUtilisateurBundle:Default:connexion.html.twig' );
		} else {
			return $this->redirect ( $this->generateUrl ( 'aso_utilisateur_home' ) );
		}
	}
	public function doConnexionAction() {
		$request = $this->container->get ( 'request' );
		$identifiant = $request->request->get ( 'identifiant' );
		$secret = $request->request->get ( 'password' );
		
		$this->get ( 'session' )->set ( 'con_identifiant', $identifiant );
		
		$user = new Utilisateur ();
		$service = $this->getDoctrine ()->getManager ();
		$user = $service->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' )->getConnexion ( $identifiant, $secret );
		
		if (($user == null) || ($user->getEmail ()->getIsValid () == true && $user->getEmail ()->getValidationCode () == $secret)) {
			$this->get ( 'session' )->getFlashBag ()->add ( 'erreur_identifiant', 'erreur' );
			
			return $this->redirect ( $this->generateUrl ( 'aso_gestion_utilisateur_connexion' ) );
		} else {
			if (($user->getEmail ()->getIsValid () == true) || ($user->getEmail ()->getIsValid () == false && $user->getEmail ()->getValidationCode () == $secret)) {
				
				if ($user->getEmail ()->getIsValid () == false && $user->getEmail ()->getValidationCode () == $secret) {
					$this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:Email' )->validateEmail ( $user->getEmail ()->getEmail () );
				}
				
				$a = 'abcdefghijklmnopqrstuvwxyz';
				$a .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$a .= '1234567890';
				$b = '';
				
				for($i = 0; $i < 4; $i ++) {
					$b .= substr ( $a, rand () % (strlen ( $a )), 1 );
				}
				
				$c = 'abcdefghijklmnopqrstuvwxyz';
				$c .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$c .= '1234567890';
				$d = '';
				
				for($i = 0; $i < 6; $i ++) {
					$d .= substr ( $c, rand () % (strlen ( $c )), 1 );
				}
				
				$this->get ( 'session' )->set ( 'userId', $user->getId () );
				
				if (isset ( $_POST ['session'] )) {
					setcookie ( 'md', base64_encode ( $user->getEmail ()->getEmail () ), strtotime ( '+30 days' ) );
					setcookie ( 'mys', $b . base64_encode ( $user->getPassword () ) . $d, strtotime ( '+30 days' ) );
				} else {
					setcookie ( 'md', base64_encode ( $user->getEmail ()->getEmail () ) );
					setcookie ( 'mys', $b . base64_encode ( $user->getPassword () ) . $d );
				}
				
				return $this->redirect ( $this->generateUrl ( 'aso_utilisateur_home' ) );
			} else {
				
				/*
				 * renvoi du code de validation par email
				 */
				$this->get ( 'session' )->getFlashBag ()->add ( 'erreur_validation', array (
						'email' => $user->getEmail ()->getEmail () 
				) );
				
				return $this->redirect ( $this->generateUrl ( 'aso_gestion_utilisateur_connexion' ) );
			}
		}
	}
	public function sendPasswordAction() {
		$request = $this->getRequest ();
		$request->setLocale ( $this->get ( 'session' )->get ( '_locale' ) );
		if ($this->get ( 'session' )->get ( 'userId' ) == "") {
			return $this->render ( 'AsoGestionUtilisateurBundle:Default:sendPassword.html.twig' );
		} else {
			return $this->redirect ( $this->generateUrl ( 'aso_utilisateur_home' ) );
		}
	}
	public function doSendPasswordAction() {
		$request = $this->container->get ( 'request' );
		$identifiant = $request->request->get ( 'identifiant' );
		
		$user = new Utilisateur ();
		$service = $this->getDoctrine ()->getManager ();
		$user = $service->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' )->getUserByIdentifiant ( $identifiant );
		
		if ($user != null) {
			$password = $user->getPassword ();
			/*
			 * renvoi du mot de passe par email
			 */
		}
		$this->get ( 'session' )->getFlashBag ()->add ( 'renvoi_password', 'renvoi du password' );
		$this->get ( 'session' )->set ( 'con_identifiant', $identifiant );
		return $this->redirect ( $this->generateUrl ( 'aso_gestion_utilisateur_connexion' ) );
	}
	public function isAvailbleConnexionAction() {
		$a = false;
		if (! isset ( $_SESSION ['userId'] )) {
			if (isset ( $_COOKIE ["md"] ) && isset ( $_COOKIE ["mys"] )) {
				$identifiant = base64_decode ( $_COOKIE ["md"] );
				$secretCode = substr ( $_COOKIE ["mys"], 4, - 6 );
				$secret = base64_decode ( $secretCode );
				$user = new Utilisateur ();
				$service = $this->getDoctrine ()->getManager ();
				$user = $service->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' )->getConnexion ( $identifiant, $secret );
				
				if ($user != null) {
					$this->get ( 'session' )->set ( 'userId', $user->getId () );
					$a = true;
				} else {
					$a = false;
				}
			} else {
				$a = false;
			}
		} else {
			$a = true;
		}
		$reponse = new Response ( json_encode ( $a ) );
		$reponse->headers->set ( 'Content-Type', 'application/json' );
		return $reponse;
	}
}