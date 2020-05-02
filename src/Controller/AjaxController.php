<?php 

namespace Vu\PremiumizeMe\Controller; 

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse; 

use Vu\Ajax\FrontendAjax;

class AjaxController extends Controller
{ 
    /** 
     * @Route("/ajax") 
     * 
     * @return JsonResponse 
     */ 
    public function ajaxAction() 
    { 
		$this->container->get('contao.framework')->initialize();
		
		$controller = new FrontendAjax();
        $data = new JsonResponse($controller->run());
		
		//$response = new JsonResponse(array('result' => 'success', 'data' => $data));
        //$response->send();
		
		return $data;
		
        //return new JsonResponse(['Hello Ajax-World!']); 
    } 
}
