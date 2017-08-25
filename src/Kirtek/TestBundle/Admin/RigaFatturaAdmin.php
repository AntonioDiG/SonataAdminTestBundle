<?php

namespace Kirtek\TestBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Kirtek\TestBundle\Form\DataMapper\RigaFatturaDataMapper;

class RigaFatturaAdmin extends AbstractAdmin {

    protected $parentAssociationMapping = 'id_fattura';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
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
                      'label' => 'Importo IVA %'
                  ))
            ->end()
        ;

        $builder = $formMapper->getFormBuilder();
        $builder->setDataMapper(new RigaFatturaDataMapper());
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('id_fattura')
            ->add('descrizione')
            ->add('importo')
            ->add('importo_iva', 'number', array(
                'label' => 'Importo IVA %'
            ))
            ->add('totale')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
       ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id_fattura')
            ->add('importo')
            ->add('importo_iva')
            ->add('totale')
        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Dati Fattura', array(
              'class' => 'col-md-8'
            ))
                ->add('id')
                ->add('id_fattura')
                ->add('quantita', null, array(
                    'label' => 'Quantita\''
                ))
                ->add('descrizione')
            ->end()
            ->with('Importo', array(
              'class' => 'col-md-4'
            ))
                ->add('importo')
                ->add('importo_iva', 'number', array(
                    'label' => 'Importo IVA %'
                ))
                ->add('totale')
            ->end()
       ;
    }

}
