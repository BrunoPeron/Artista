<?php


namespace Core\Service\Pessoa;

use Core\Entity\Pessoa\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaService
{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $pessoa=null){
        if(!$pessoa){
            $pessoa = new Pessoa();
        }
        $pessoa->nome_completo = $data['nome_completo'];
        $pessoa->cpf = $data['cpf'];
        $pessoa->data_nasc = $data['data_nasc'];
        try{
            $this->em->persist($pessoa);
            $this->em->flush();
            return ['codigo' => 201, 'mensagem' => 'Pessoa criada com sucesso!'];
        } catch (\Exception $e){
            // var_dump($e->getCode());
             var_dump($e->getMessage());
            return ['codigo' => 500, 'mensagem' => 'Não foi possível criar uma pessoa!'];
        }
    }

}