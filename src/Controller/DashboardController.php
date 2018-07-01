<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/27/18
 * Time: 4:04 PM
 */

namespace App\Controller;


use App\Entity\Orders;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * @Route("/")
     */
    public function show()
    {
//        phpinfo();
        $ordersToExecute = $this->getDoctrine()->getRepository(Orders::class)->findLastUnexecuted();
        var_dump($ordersToExecute);
        return new Response('haha');
    }
}