<?php

namespace Scrumee\ApiBundle\Serializer;

use Symfony\Component\Serializer\Serializer as GlobalSerializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Serializer
{
    /**
     * Serializes data in the appropriate format.
     *
     * @param mixed  $data    any data
     * @param string $format  format name
     *
     * @return string
     */
    public function objectToJson($data, $format)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new GlobalSerializer($normalizers, $encoders);

        return $serializer->serialize($data, $format);
    }
} 
