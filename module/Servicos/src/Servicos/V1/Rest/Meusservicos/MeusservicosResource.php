<?php 
namespace Servicos\V1\Rest\Meusservicos;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Core\Service\Servicos\MeusservicosService as meusservicos;

class MeusservicosResource extends AbstractResourceListener
{
    protected $em;
	protected $sm;
	protected $db;
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */

    public function __construct($services){
		$this->sm = $services;
		$this->em = $services->get('Doctrine\ORM\EntityManager');
		//$this->db = $service->get('oauth2');
	}

    public function create($data)
    {
//        echo 18;
        $data = $this->getInputFilter()->getValues();
//        echo 20;
        $usr = $this->getEvent()->getIdentity()->getAuthenticationIdentity();
//        echo 22;
//        var_dump($this->em);
        $meusservicos = new meusservicos($this->em);
        
        $retorno = $meusservicos->create($data,$usr);
        //echo 37;
        return new ApiProblem(405, 'The POST method has not been defined');
        /*$retorno = $tarefa->create($data, $usr);
        return new ApiProblem($retorno['codigo'], $retorno['mensagem']);
        
        $data = $this->getInputFilter()->getValues();
        $usr = $this->getEvent()->getIdentity()->getAuthenticationIdentity();
        $projeto = new Projeto($this->em);
        $projeto->create($data, $usr);*/
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
