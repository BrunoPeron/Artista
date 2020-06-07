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
        $pessoa->idade = $data['idade'];
        $data_nasc = \DateTime::createFromFormat("d/m/Y", $data['data_nasc']);
        $pessoa->data_nasc = $data_nasc;
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
        $qb = $this->em->createQueryBuilder()
            ->select('p.nome_completo')
            ->from('Core\Entity\Pessoa\Pessoa', 'p');
        if($id){
            $qb->where("p.cod_pessoa = ?1");
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