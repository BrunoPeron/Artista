<?php
namespace User\V1\Rest\Usuario;

class UsuarioResourceFactory
{
    public function __invoke($services)
    {
        return new UsuarioResource();
    }
}
