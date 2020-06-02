<?php 

namespace Core\Service\Servicos;

use Core\Entity\Servicos\Meusservicos;
use Doctrine\ORM\EntityManager;

class MeusservicosService{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $projeto = null){
        if(!$projeto){
            $meusservicos = new Projeto();
        }
    	$meusservicos->nome = $data['nome'];
    	$data_inicial = \DateTime::createFromFormat("Y-m-d", $data['data_inicial']);
        $data_fim = \DateTime::createFromFormat("Y-m-d", $data['data_fim']);
        $meusservicos->descricao = $data['descricao'];
        $status = $this->em->getRepository(\Core\Entity\Projeto\Status::class)->findOneBy(['id' => $data['status']]);
        $meusservicos->idStatus = $status;
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