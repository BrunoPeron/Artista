<?php
namespace Usuarios\V1\Rest\Testeuser;

class TesteuserResourceFactory
{
    public function __invoke($services)
    {
        return new TesteuserResource();
    }
}
