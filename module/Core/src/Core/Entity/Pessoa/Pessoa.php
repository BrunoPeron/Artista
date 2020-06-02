<?php


namespace Core\Entity\Pessoa;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoa", indexes={@ORM\Index(name="IDX_31B4CBA5D37D0F1", columns={"nome_completo"}), @ORM\Index(name="IDX_31B4CBACF964237", columns={"data_nasc"}), @ORM\Index(name="IDX_31B4CBABB4D0D62", columns={"cpf"})})
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
     * @var int
     *
     * @ORM\Column(name="cod_pessoa", type="int", nullable=false)
     */
    public $cod_pessoa;
}