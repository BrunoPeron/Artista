<?php


namespace Core\Entity\Pessoa;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoa")
 * @ORM\Entity
 */
class Pessoa
{
    /**
     * @var string
     *
     * @ORM\Column(name="nome_completo", type="string", nullable=false)
     */
    public $nome_completo;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_nasc", type="datetime", nullable=false)
     */
    public $data_nasc;
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", nullable=false)
     */
    public $cpf;
    /**
     * @var integer
     *
     * @ORM\Column(name="cod_pessoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pessoa_codpessoa_seq", allocationSize=1, initialValue=1)
     */
    public $cod_pessoa;
    /**
     * @var integer
     *
     * @ORM\Column(name="idade", type="integer", nullable=false)
     */
    public $idade;
}