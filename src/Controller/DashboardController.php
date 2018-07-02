<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/27/18
 * Time: 4:04 PM
 */

namespace App\Controller;


use App\Entity\Orders;
use App\Form\OrdersForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        $lastExecuted = $this->getDoctrine()->getRepository(Orders::class)->findLastExecuted(10);
        $orders = new Orders();
        $ordersForm = $this->createForm(OrdersForm::class, $orders);
        $ordersForm->handleRequest($request);
        if ($ordersForm->isSubmitted() && $ordersForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orders);
            $em->flush();
        }
        return $this->render('dashboard.html.twig', [
            'form' => $ordersForm->createView(),
            'last_executed' => $lastExecuted
        ]);
    }
}