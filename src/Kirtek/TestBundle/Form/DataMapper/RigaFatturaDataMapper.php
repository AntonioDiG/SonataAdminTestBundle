<?php

namespace Kirtek\TestBundle\Form\DataMapper;

use Symfony\Component\Form\DataMapperInterface;
use Kirtek\TestBundle\Entity\RigaFattura;

class RigaFatturaDataMapper implements DataMapperInterface
{
    /**
     * @param RigaFattura $data
     * @param FormInterface[]|\Traversable $forms
     */
    public function mapDataToForms($data, $forms)
    {
        if (null !== $data) {
            $forms = iterator_to_array($forms);
        }
    }

    /**
     * @param FormInterface[]|\Traversable $forms
     * @param RigaFattura $data
     */
    public function mapFormsToData($forms, &$data)
    {
        $forms = iterator_to_array($forms);

        if (null === $data->getId()) {
            $importo = $forms['importo']->getData();
            $iva = $forms['importo_iva']->getData();
            $descrizione = $forms['descrizione']->getData();
            $fat = $forms['id_fattura']->getData();
            $qnt = $forms['quantita']->getData();

            // New entity is created
            $data = new RigaFattura();
            $data->setDescrizione($descrizione);
            $data->setImporto($importo);
            $data->setImportoIva($iva);
            $data->setTotale($importo + $iva);
            $data->setIdFattura($fat);
            $data->setQuantita($qnt);

        } else {
            $data->update(
                $forms['importo']->getData(),
                $forms['importo_iva']->getData()
            );
        }
    }
}
