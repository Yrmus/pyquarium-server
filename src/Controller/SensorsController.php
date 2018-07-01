<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/30/18
 * Time: 6:55 PM
 */

namespace App\Controller;


use App\Entity\SensorsData;
use App\Form\SensorsDataForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/sensors")
 * Class SensorsController
 * @package App\Controller
 */
class SensorsController extends Controller
{

    /**
     * @Route("")
     * @Method("POST")
     * @param Request $request
     * @return Response
     */
    public function postData(Request $request): Response
    {
        $sensorsData = new SensorsData();
        $form = $this->createForm(SensorsDataForm::class, $sensorsData);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sensorsData);
            $em->flush();
            return new Response('Sensors data added');
        }
        return new Response('Unable to save sensors data'.$form->getErrors(), 400);
    }
}