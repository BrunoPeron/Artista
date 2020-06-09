<?php
namespace Pessoa\V1\Rest\Pessoap;

class PessoapResourceFactory
{
    public function __invoke($services)
    {
        return new PessoapResource($services);
    }
}
