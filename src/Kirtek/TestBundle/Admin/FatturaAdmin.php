<?php

namespace Kirtek\TestBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class FatturaAdmin extends AbstractAdmin {

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('data', 'datetime', array(
          'label' => 'Data'
      ))
      ->add('numero', 'integer', array(
          'label' => 'Numero'
      ))
      ->add('id_cliente', 'integer', array(
          'label' => 'ID Cliente'
      ))
   ;
  }

// Fields to be shown on filter forms
protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
   $datagridMapper
        ->add('data', null, array(), 'sonata_type_datetime_picker', array(
            'format' => 'dd/MM/yyyy',
            'dp_side_by_side' => true,
            'dp_use_current' => false,
            'dp_use_seconds' => false,
        ))
        ->add('id_cliente')
   ;
}

// Fields to be shown on lists
protected function configureListFields(ListMapper $listMapper)
{
    $listMapper
        ->add('id')
        ->add('data')
        ->add('id_cliente')
   ;
}

// Fields to be shown on show action
protected function configureShowFields(ShowMapper $showMapper)
{
    $showMapper
    ->add('id')
    ->add('data')
    ->add('id_cliente')
    ->add('numero')
   ;
}

}
