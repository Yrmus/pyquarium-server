<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/27/18
 * Time: 8:27 PM
 */

namespace App\Controller;


use App\Entity\Orders;
use App\Util\Serializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/orders")
 * Class OrdersController
 * @package App\Controller
 */
class OrdersController extends Controller
{
    /**
     * @Route("/last")
     * @param Serializer $serializer
     * @return Response
     */
    public function getLastOrder(Serializer $serializer): Response
    {
        $ordersToExecute = $this->getDoctrine()->getRepository(Orders::class)->findLastUnexecuted();
        return new Response($serializer->serialize($ordersToExecute));
    }

    /**
     * @Route("/execute/{id}", )
     * @param int $id
     * @return Response
     */
    public function markAsExecuted(int $id): Response
    {
        $order = $this->getDoctrine()->getRepository(Orders::class)->find($id);

        if (null !== $order) {
            $order->setExecuted(true);
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
            return new Response();
        }
        return new Response(sprintf('Unable to find order by id %d', [$id]), 404);
    }
}