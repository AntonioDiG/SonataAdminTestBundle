<?php

namespace Kirtek\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class RigaFattura
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Fattura")
    */
    protected $id_fattura;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $descrizione;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    protected $quantita;

    /**
     * @ORM\Column(type="decimal")
     * @Assert\NotBlank()
     */
    protected $importo;

    /**
     * @ORM\Column(type="decimal")
     * @Assert\NotBlank()
     */
    protected $importo_iva;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $totale;


    /**
     * @param integer quantita
     * @param decimal importo
     * @param decimal importo_iva
     * @param string descrizione
     * @param RigaFattura $data
     */
    public function __construct(
        $quantita = 0,
        $importo = 0,
        $importo_iva = 0,
        $descrizione = ''
    ) {
        $this->quantita = $quantita;
        $this->importo = $importo;
        $this->importo_iva = $importo_iva;
        $this->totale = $importo + $importo_iva;
        $this->descrizione = $descrizione;
    }

    public function update($importo, $iva)
    {
        $this->totale = $importo + $iva;
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
     * Set descrizione
     *
     * @param string $descrizione
     * @return RigaFattura
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set quantita
     *
     * @param integer $quantita
     * @return RigaFattura
     */
    public function setQuantita($quantita)
    {
        $this->quantita = $quantita;

        return $this;
    }

    /**
     * Get quantita
     *
     * @return integer
     */
    public function getQuantita()
    {
        return $this->quantita;
    }

    /**
     * Set importo
     *
     * @param string $importo
     * @return RigaFattura
     */
    public function setImporto($importo)
    {
        $this->importo = $importo;

        return $this;
    }

    /**
     * Get importo
     *
     * @return string
     */
    public function getImporto()
    {
        return $this->importo;
    }

    /**
     * Set importo_iva
     *
     * @param string $importoIva
     * @return RigaFattura
     */
    public function setImportoIva($importoIva)
    {
        $this->importo_iva = $importoIva;

        return $this;
    }

    /**
     * Get importo_iva
     *
     * @return string
     */
    public function getImportoIva()
    {
        return $this->importo_iva;
    }

    /**
     * Set totale
     *
     * @param string $totale
     * @return RigaFattura
     */
    public function setTotale($totale)
    {
        $this->totale = $totale;

        return $this;
    }

    /**
     * Get totale
     *
     * @return string
     */
    public function getTotale()
    {
        return $this->totale;
    }

    /**
     * Set id_fattura
     *
     * @param \Kirtek\TestBundle\Entity\Fattura $idFattura
     * @return RigaFattura
     */
    public function setIdFattura(\Kirtek\TestBundle\Entity\Fattura $idFattura = null)
    {
        $this->id_fattura = $idFattura;

        return $this;
    }

    /**
     * Get id_fattura
     *
     * @return \Kirtek\TestBundle\Entity\Fattura
     */
    public function getIdFattura()
    {
        return $this->id_fattura;
    }
}
