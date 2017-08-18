<?php

namespace Kirtek\TestBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class RigaFatturaAdmin extends AbstractAdmin {

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper

    ->tab('DatiFattura')
        ->with('Dati Fattura', array(
          'class' => 'col-md-8'
        ))
          ->add('id_fattura', 'sonata_type_model', array(
              'class' => 'Kirtek\TestBundle\Entity\Fattura',
              'property' => 'id',
          ), array(
            'label' => 'ID Fattura'
          ))
          ->add('descrizione', 'text', array(
              'label' => 'Descrizione'
          ))
          ->add('quantita', 'integer', array(
              'label' => 'Quantita\''
          ))
        ->end()
        ->with('Importo', array(
          'class' => 'col-md-4'
        ))
          ->add('importo', 'number', array(
              'label' => 'Importo'
          ))
          ->add('importo_iva', 'number', array(
              'label' => 'Importo IVA'
          ))
          ->add('totale', 'number', array(
              'label' => 'Totale'
          ))
        ->end()
      ->end()
    ;

  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
      $listMapper
          ->add('id')
          ->add('id_fattura')
          ->add('totale')
          ->add('descrizione')
     ;
  }

}
