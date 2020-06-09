<?php


namespace Core\Service\Pessoa;

use Core\Entity\Pessoa\Pessoap;
use Doctrine\ORM\EntityManager;

class PessoapService
{
    public $em;
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function create($data, $usr, $pessoa=null){
        if(!$pessoa){
            $pessoa = new Pessoap();
        }
        $pessoa->nomep = $data['nomep'];
        $pessoa->idade = $data['idade'];
        $pessoa->sobrenome = $data['sobrenome'];
        $pessoa->sexo = $data['sexo'];
        $pessoa->profissao = $data['profissao'];
        $pessoa->cpf = $data['cpf'];
        $pessoa->descricao = $data['descricao'];
        $pessoa->pais = $data['pais'];
        $pessoa->estado = $data['estado'];
        $pessoa->cidade = $data['cidade'];
        $pessoa->bairro = $data['bairro'];
        $pessoa->rua = $data['rua'];
        $pessoa->complemento = $data['complemento'];
        $pessoa->cep = $data['cep'];
        $pessoa->infadd = $data['infadd'];
        $data_nasc = \DateTime::createFromFormat("d/m/Y", $data['datanasc']);
        $pessoa->datanasc = $data_nasc;
//        exit;
//        $data_nasc = date_create($data['datanasc']);
//        var_dump($data['datanasc']);
//        $teste = date_format($data['datanasc'], 'Y/m/d H:i:s');
//        var_dump($teste);
        try{
//            var_dump($pessoa);exit;
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
        $qb = $this->em->createQueryBuilder()
            ->select('p.nomep')
            ->from('Core\Entity\Pessoa\Pessoap', 'p');
        if($id){
            $qb->where("p.codpessoa = ?1");
            // $qb->setParamaters(array(1 => $id));
            $qb->setParameters([1 => $id]);
        }
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function update($id, $data, $usr){
        echo "id\n";
        var_dump($id);
        echo "data\n";
        var_dump($data);
        echo "usr\n";
        var_dump($usr);
        exit;
        // \Doctrine\Common\Util\Debug::dump($projeto);
        if($id){
            return $this->create($data, $usr, $tarefa);
        }
        return 'Nenhuma tarefa encontrada!';
    }

}