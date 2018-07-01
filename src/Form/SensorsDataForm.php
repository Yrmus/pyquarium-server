<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/30/18
 * Time: 6:58 PM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SensorsDataForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('temperature')
            ->add('day_time');
    }

}