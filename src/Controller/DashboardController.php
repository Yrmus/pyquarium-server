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

/**
 * @Route("/dashboard")
 * Class DashboardController
 * @package App\Controller
 */
class DashboardController extends Controller
{
    /**
     * @Route("")
     */
    public function show(): Response
    {
        $lastExecuted = $this->getDoctrine()->getRepository(Orders::class)->findLastExecuted(10);
        return $this->render('dashboard.html.twig', [
            'last_executed' => $lastExecuted
        ]);
    }
}