<?php

namespace App\Controller;

use App\Entity\Pin;
use App\Entity\User;
use App\Repository\PinRepository;
use Symfony\Config\TwigConfig;
use Doctrine\DBAL\Types\JsonType;
use src\Controller\DashboardController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter; 
use Twig\Environment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserController extends AbstractController
{

    /**
     * @Route("/", name="app_home" , methods={"GET"})
     */
    public function index(PinRepository $repo): Response
    {
        return $this->render('user/create.html.twig', ['users' => $repo->findAll()]);
    }


    /**
     * @Route("/user/create", name="Formulaire", methods={"GET", "POST"})
     * 
     * @ParamConverter("user", options={"use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;": {"player_name" : "name"}})
     * 
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $pin = new User; #met des valeurs par défaut vierge de user dans le form

        $form =  $this->createFormBuilder($pin)
            ->setMethod('POST')
            ->add('email', EmailType::class)
            #->add('roles', TextType::class, [
            #    'required' => false,
            #    'attr' => ['rows' => 5, 'cols' =>20]])
            ->add('password', PasswordType::class)
            ->add('submit', SubmitType::class, ['label' => 'Creer compte'])
            ->getForm();
            

        $form->handleRequest($request);
        /** Récupère toutes les données du formulaire de la variable resquest instanciée plus haut */

        if ($form->isSubmitted() && $form->isValid()) { 
            /** Vérification si le formulaire à été cliqué sur soumis, si c'est le cas on vérifie si c'est valide (exemple contenir plusieurs caractères) */
            $em->persist($pin);
            $em->flush();

            return $this->redirectToRoute('app_home');
            
        }

        return $this->render('client/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    /*{% for user in users %}
            <article>
                <h1>{{user.email}}</h1>
            </article>
        {% else %}
            <p>Désolé il n'y a aucun compte à afficher</p>
        {% endfor %}*/

    // public function redirection(): RedirectResponse
    //   {
    // redirects to the "homepage" route
    //    return $this->redirectToRoute('user');

    // redirectToRoute is a shortcut for:
    // return new RedirectResponse($this->generateUrl('homepage'));

    // redirects to a route and maintains the original query string parameters
    //return $this->redirectToRoute('blog_show', $request->query->all());

    //   }
}
