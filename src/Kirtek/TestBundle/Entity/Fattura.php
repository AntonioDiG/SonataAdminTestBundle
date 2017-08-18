<?php

namespace Kirtek\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Fattura
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\Column(type="datetime")
    */
    protected $data;

    /**
    * @ORM\Column(type="integer")
    * @Assert\NotBlank()
    */
    protected $numero;

    /**
    * @ORM\Column(type="integer")
    * @Assert\NotBlank()
    */
    protected $id_cliente;

    public function __construct()
    {
        $this->data = new \DateTime("now");
    }

    public function __toString()
    {
        return (string)$this->getId();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Fattura
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return Fattura
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set id_cliente
     *
     * @param integer $idCliente
     * @return Fattura
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;

        return $this;
    }

    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }
}
