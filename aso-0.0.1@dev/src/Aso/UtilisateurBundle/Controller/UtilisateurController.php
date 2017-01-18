<?php

namespace Aso\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aso\GestionUtilisateurBundle\Entity\Utilisateur;

/**
 *
 * @author ASO
 *        
 */
class UtilisateurController extends Controller {
	public function homeAction(){
		$request = $this->getRequest ();
		$request->setLocale ( $this->get ( 'session' )->get ( '_locale' ) );
		return $this->render ( 'AsoUtilisateurBundle:Default:home.html.twig' );
	}
	
	public function menuGeneralAction(){
		$result=new Utilisateur();
		$id=$this->get ( 'session' )->get ( 'userId' );
		if ($id!=""){
			$service = $this->getDoctrine ()->getManager ();
			$result = $service->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' )->getUserById($id);
			
		}
		$getUser = $this->getDoctrine ()->getManager ()->getRepository ( 'AsoGestionUtilisateurBundle:Utilisateur' );
		$result = $getUser->findOneById ( $this->get ( 'session' )->get ( 'userId' ) );
		return $this->render ( 'AsoUtilisateurBundle:Default:menuGeneral.html.twig',array('user' => $result) );
	}
}