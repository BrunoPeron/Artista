<?php


namespace Core\Service\Usuarios;

use Core\Entity\Usuarios\Usuario;
use Doctrine\ORM\EntityManager;

class UsuarioService
{
    public $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $tarefa=null){

    }
}