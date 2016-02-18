<?php
namespace MUNDIAL\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionResolver\OptionResolverInterface;
use Symfony\Component\Form\Extension\Core\Type as tp;

/**
 * Formulario de Categoria.
 */
class CategoryForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    return $builder
            // ->add('title')
            ->add("titulo", tp\TextType::class,array(
              'attr' => array(
                'placeholder' => 'Titulo',
              )
            ))
            ->add("description", tp\TextareaType::class, array(
              'attr' => array(
                'placeholder' => 'Descripcion',
                'class' => 'ckeditor',
                'name' => 'category-content',
                'id' => 'category-content',
              ),
            ))
            ->add("enable", tp\ChoiceType::class, array(
              'choices' => array(
                'Male'=>'male',
                'Female'=>'female',
              ),
              'expanded' => true
            ))
            ->add("save", tp\SubmitType::class, array('label' => 'Guardar'));
  }
  public function __get($str)
  {
    return "";
  }
}
