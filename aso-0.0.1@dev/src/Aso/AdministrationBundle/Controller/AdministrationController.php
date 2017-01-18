<?php
namespace Aso\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @author ASO
 *
 */
class AdministrationController extends Controller{
	
public function menuAdministrationAction(){
	return $this->render ( 'AsoAdministrationBundle:Default:menuAdministration.html.twig');
}
public function aAction()
{
	return $this->render('AsoAdministrationBundle:Default:a.html.twig');
}

}