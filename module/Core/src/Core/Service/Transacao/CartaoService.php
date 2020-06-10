<?php


namespace Core\Service\Transacao;

use Core\Entity\Transacao\Cartao;
use Doctrine\ORM\EntityManager;


class CartaoService
{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $cartao){
        if(!$cartao){
            $cartao = new Cartao();
        }
        $cartao->cpf = $data['cpf'];
        $cartao->nome = $data['nome'];
        $cartao->sobrenome = $data['sobrenome'];
        $cartao->nrcartao = $data['nrcartao'];
        $cartao->tipo = $data['tipo'];
        $cartao->validade = $data['validade'];
        $cartao->descadd = $data['descadd'];
        $cartao->codpessoa = $data['codpessoa'];
        $dono = $this->em->getRepository(\Core\Entity\Projeto\Usuario::class)->findOneBy(['clientId' => $usr['client_id']]);
//        //\Doctrine\Common\Util\Debug::dump($dono);
//        $projeto->idDono = $dono;
//        $status = $this->em->getRepository(\Core\Entity\Projeto\Status::class)->findOneBy(['id' => $data['status']]);
//        $projeto->idStatus = $status;
//        $prioridade = $this->em->getRepository(\Core\Entity\Projeto\Prioridade::class)->findOneBy(['id' => $data['prioridade']]);
//        $projeto->idPrioridade = $prioridade;
//        try{
//            $this->em->persist($projeto);
//            $this->em->flush();
//            return $projeto;
//        } catch (\Exception $e){
//            var_dump($e->getCode());
//            var_dump($e->getMessage());
//            exit;
//        }
    }


}