<?php
namespace MUNDIAL\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type as tp;

use MUNDIAL\Model\CategoryModel;
use MUNDIAL\Form\CategoryForm;
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

  public function categoryCreate(Application $app, Request $request)
  {
    $categoryModel = new CategoryModel($app);
    $form = $app['form.factory']->createBuilder(CategoryForm::class)
              ->setAction('categoryRegister')
              ->getForm();
    $form->handleRequest($request);
    if ($form->isValid()) {
      $data = $form->getData();
      dump($data);
      $categoryModel->save($data);
      return $app->redirect("/");
    }
    return $app['twig']->render('categoryForm.twig', array(
      'form' => $form->createView(),
    ));
  }
  public function categoryView(Application $app, Request $request, $idCategory) {
    $categoryModel = new CategoryModel($app);
    $valores = $categoryModel->retrieve($idCategory)[0];
    dump($valores);
    $valores['description'] = ($valores['description']);
    return $app['twig']->render('categoryViewFull.twig', array(
      'category' => $valores,
    ));
  }
  public function categoryList(Application $app, Request $request){
    $categoryModel = new CategoryModel($app);
    $data = $categoryModel->retrieveAll();
    return $app['twig']->render('categoryView.twig', array(
      'categoryList' => $data,
    ));
  }
  public function categoryDelete(Application $app, Request $request, $idCategory) {
    $categoryModel = new CategoryModel($app);
    $categoryModel->delete($idCategory);
    return $app->redirect("/category");
  }

  public function theme(Application $app, Request $request)
  {
    return $app['twig']->render('user.twig');
  }
}
