<?php
namespace MUNDIAL\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type as tp;
/**
 * Controlador principal para paginas estaticas.
 */
class MainController
{
  public function index(Application $app, Request $request)
  {
    $form = $app['form.factory']->createBuilder()
              ->add('username', tp\TextType::class, array(
                'attr' => array(
                  'placeholder' => 'username',
                ),
              ))
              ->add('password', tp\RepeatedType::class, array(
                'type' => tp\PasswordType::class,
                'invalid_message' => 'Las contraseñas deben ser iguales',
                'required' => true,
                'first_options' => array(
                  'label' => '',
                  'attr' => array(
                    'placeholder' => 'Password',
                  ),
                ),
                'second_options' => array(
                  'label' => '',
                  'attr' => array(
                    'placeholder' => 'Repeat password',
                  ),
                ),
                'attr' => array(
                  'placeholder' => 'placeholder',
                ),
              ))
              ->add('email', tp\EmailType::class, array(
                'attr' => array(
                  'placeholder' => 'placeholder',
                ),
              ))
              ->add('country', tp\CountryType::class, array(
                'label' => 'Pais'
              ))
              ->add('sex', tp\ChoiceType::class, array(
                'choices' => array(
                  'Male'=>'male',
                  'Female'=>'female',
                ),
                'expanded' => true
              ))
              ->add('secretQustion', tp\TextType::class, array(
                'attr' => array(
                  'placeholder' => 'placeholder',
                ),
              ))
              ->add('secretAnswer', tp\TextType::class, array(
                'attr' => array(
                  'placeholder' => 'placeholder',
                ),
              ))
              ->add('terms', tp\CheckboxType::class, array(
                'attr' => array(
                  'placeholder' => 'placeholder',
                ),
                'label' => 'Acepto los terminos y condiciones',
                'required' => true,
              ))
              ->add('save', tp\SubmitType::class, array('label' => 'Registrar'))
              ->getForm();
    $form->handleRequest($request);
    if ($form->isValid()) {
      $data = $form->getData();
      return $app->redirect("/");
    }
    return $app['twig']->render("formulario.twig", array(
      'form' => $form->createView(),
    ));
  }
}
