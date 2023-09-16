<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="app_auth")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuthController.php',
        ]);
    }
     /**
     * @Route("/api/register", name="register", methods={"POST"})
     * @param Request $request
     * @param UserPasswordHasherInterface $passwordHasher
     * @return JsonResponse
     */
    public function register(Request $request, MailerInterface $mailer, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em, SerializerInterface $serializer, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        $object = $serializer->deserialize($request->getContent(), Entreprise::class, 'json');
        //dd($object->getUsers());
        $object->getUsers()[0]->generateToken();
        $encoded = $passwordHasher->hashPassword($object->getUsers()[0], $object->getUsers()[0]->getPassword());
        $object->getUsers()[0]->setPassword($encoded);
        $em->persist($object);
        $em-> flush();
        // $confirmationUrl = $urlGenerator->generate('confirm_email', [
        //     'token' => $object->getUsers()[0]->getToken(),
        // ], UrlGeneratorInterface::ABSOLUTE_URL);
        $email = (new TemplatedEmail())
            ->from('Hirafy.company@gmail.com')
            ->to($object->getUsers()[0]->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Confirmation d\'email')
            ->htmlTemplate('emails/signup.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'token' => $object->getUsers()[0]->getToken(),
            ]);
        $mailer->send($email);
        return $this->Json("success", JsonResponse::HTTP_OK);
    }

     /**
     * @Route("/api/confirm/email/{token}", name="confirm_email")
     */
    public function confirmEmail(EntityManagerInterface $em,$token): JsonResponse
    {
        
        $find = $em->getRepository(User::class)->findOneBy( ['token' => $token]);
        $find->setConfirm(true);
        $em->persist($find);
        $em-> flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

     /**
     * @Route("/api/forget_password", name="app_forget_password", methods={"POST"})
     */
    public function forgetPassword(Request $request, MailerInterface $mailer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        
        $content = $request->getContent();
        $data = json_decode($content, true);
        $email = $data["email"];
        
        $find = $em->getRepository(User::class)->findOneBy( ['email' => $email]);
        if(!$find){
            return new JsonResponse(['error' => 'Email does not exist'], 400);
        }
        $find->generateToken();
        $em->persist($find);
        $em-> flush();
        // $confirmationUrl = $urlGenerator->generate('reset_password', [
        //     'token' => $find->getToken(),  
        // ], UrlGeneratorInterface::ABSOLUTE_URL);
        //$confirmationUrl = "http://localhost:4200/reset_password/"+$find->getToken();
        $email = (new TemplatedEmail())
            ->from('Hirafy.company@gmail.com')
            ->to($email)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Réinitialiser le mot de passe')
            ->htmlTemplate('emails/forgetPassword.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'token' => $find->getToken(),
                'name' =>$find->getNomComplet(),
            ]);
        $mailer->send($email);
        return $this->json("success", JsonResponse::HTTP_OK);

    }
    /**
     * @Route("/api/reset_password", name="reset_password")
     */
    public function resetPassword(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $content = $request->getContent();
        $data = json_decode($content, true);
        $password = $data["password"];
        $token = $data["token"];
        $find = $em->getRepository(User::class)->findOneBy( ['token' => $token]);
        $encoded = $passwordHasher->hashPassword($find, $password);
        $find->setPassword($encoded);
        $em->persist($find);
        $em-> flush();
        return $this->json("success password reset", JsonResponse::HTTP_OK);
    }

}
