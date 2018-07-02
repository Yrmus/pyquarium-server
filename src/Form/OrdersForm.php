<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 7/2/18
 * Time: 4:53 PM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

class OrdersForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sunriseTime', TimeType::class, [
            'widget' => 'choice',
            'with_seconds' => false,
            'input' => 'string',
        ])
            ->add('sunsetTime', TimeType::class, [
                'widget' => 'choice',
                'with_seconds' => false,
                'input' => 'string',
            ])
            ->add('submit', SubmitType::class);
    }

}