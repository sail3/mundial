<?php
namespace MUNDIAL\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as tp;

/**
 * Formulario de Categoria.
 */
class CategoryForm extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    return $builder
            // ->add('title')
            ->add("title", tp\TextType::class,array(
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
                'Activado'=>'1',
                'Desactivado'=>'0',
              ),
              'label' => 'Habilidado',
              'expanded' => true
            ))
            ->add("save", tp\SubmitType::class, array('label' => 'Guardar'));
  }
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'MUNDIAL\Entity\Category',
    ));
  }
}
