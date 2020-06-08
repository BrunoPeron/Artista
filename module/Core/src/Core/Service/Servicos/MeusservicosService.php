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
            //echo 25;
            $meusservicos = new meusservicos();
            //echo 24;
        }
        $meusservicos->nome = $data['nome'];
        //echo 26;     
//    	$data_inicial = \DateTime::createFromFormat("Y-m-d", $data['data_inicial']);
        $data_fim = \Date::createFromFormat("Y-m-d", $data['data_fim']);
        
        $meusservicos->dataInicio = $data['data_inicial'];
        $meusservicos->dataFim = date("Y/m/d", $data['data_fim']);
 //       var_dump($meusservicos->dataInicio);
 //       var_dump($meusservicos->dataFim);
        //echo 28;
        $meusservicos->cliente = $data['cliente'];
        $meusservicos->artista = $data['artista'];

        //var_dump($cliente);
        //echo 34;
        $meusservicos->descricao = $data['descricao'];
        //$status = $this->em->getRepository(\Core\Entity\Projeto\Status::class)->findOneBy(['id' => $data['status']]);
        //var_dump($status);
        $meusservicos->idStatus = $data['status'];
    
        try{
    		$this->em->persist($meusservicos);
    		$this->em->flush();
            return $meusservicos;
		} catch (\Exception $e){
			var_dump($e->getCode());
			var_dump($e->getMessage());
			exit;
		}
    }

}