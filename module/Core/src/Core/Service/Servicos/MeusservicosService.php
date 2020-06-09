<?php

namespace Core\Service\Servicos;

use Core\Entity\Servicos\meusservicos;
use Doctrine\ORM\EntityManager;

class MeusservicosService{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $projeto = null){
        if(!$projeto){
            $meusservicos = new meusservicos();
        }
        $meusservicos->nome = $data['nome'];
//        $data_fim = \Date::createFromFormat("Y-m-d", $data['data_fim']);
//        $meusservicos->dataInicio = $data['data_inicial'];
//        $meusservicos->dataFim = date("Y/m/d", $data['data_fim']);
        $meusservicos->cliente = $data['cliente'];
        $meusservicos->artista = $data['artista'];
        $meusservicos->descricao = $data['descricao'];
        $meusservicos->status = $data['status'];
        $data = date('d/m/Y');
        $meusservicos->dataInicio = \DateTime::createFromFormat("d/m/Y",$data);
    
        try{
    		$this->em->persist($meusservicos);
    		$this->em->flush();
            return ['codigo' => 201,'mensagem'=>'servico criado'];
		} catch (\Exception $e){
			var_dump($e->getCode());
			var_dump($e->getMessage());
			exit;
		}
    }

    public function fetch($id=null){
        $qb = $this->em->createQueryBuilder()
            ->select('p.nome, p.dataInicio, p.dataFim, p.cliente, p.artista, p.descricao, p.status, p.id')
            ->from('Core\Entity\Servicos\meusservicos','p');
        if($id){
            $qb->where("p.id = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

}