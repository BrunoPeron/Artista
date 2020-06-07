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

    public function fetch($id = null)
    {
        var_dump("pasta config");
        $qb = $this->em->createQueryBuilder()
            ->select('p.nome')
            ->from('Core\Entity\Pessoa\Pessoa', 'p');
        if($id){
            $qb->where("p.cod_pessoa = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

}