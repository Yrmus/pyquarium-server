<?php
/**
 * Created by PhpStorm.
 * User: damianjankowski
 * Date: 6/27/18
 * Time: 8:32 PM
 */

namespace App\Util;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer
{
    /**
     * @var \Symfony\Component\Serializer\Serializer
     */
    private $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);
    }

    public function serialize($data, string $format = 'json', array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }
}