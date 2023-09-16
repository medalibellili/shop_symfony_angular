<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Entreprise;
use App\Entity\Biography;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
 
class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    
    /**
     * @Route("/api/users", name="app_create_user", methods={"POST"})
     */
    public function createUser(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $jsonData = json_decode($request->getContent(), true);
        $find = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$jsonData["entreprise"]["id"]]);
        //dd($find);
             // Désérialiser l'objet User à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), User::class, 'json');
        $find2 = $em->getRepository(User::class)->findOneBy(["email"=>$object->getEmail()]);
        if ($find2 != null) {
            return new JsonResponse(
                [
                    'message' => 'Error',
                    'error' => 'L\'email utilisée existe déja!',
                  
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $object->setEnable(false);
        //$object->setFirstActive(false);
        $object->generateToken();
        $encoded = $passwordHasher->hashPassword($object, $object->getPassword());
        $object->setPassword($encoded);
        
        $object->setEntreprise($find);
        //
       
        // Persister l'objet User et les utilisateurs
        $em->persist($object);
        $em-> flush();

        $email = (new TemplatedEmail())
            ->from('Hirafy.company@gmail.com')
            ->to($object->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Confirmation d\'email')
            ->htmlTemplate('emails/signup.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'token' => $object->getToken(),
                'name'  =>$object->getNomComplet()
            ]);
        $mailer->send($email);
        
        return $this->json("success", JsonResponse::HTTP_OK);
    }


    /**
     * @Route("/api/admins", name="app_create_admin", methods={"POST"})
     */
    public function createAdmin(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer, UserPasswordHasherInterface $passwordHasher): Response
    {
        $jsonData = json_decode($request->getContent(), true);
        //$find = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$jsonData["entreprise"]["id"]]);
        // Désérialiser l'objet User à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), User::class, 'json');
        $find = $em->getRepository(User::class)->findOneBy(["email"=>$object->getEmail()]);
        if ($find != null) {
            return new JsonResponse(
                [
                    'message' => 'Error',
                    'error' => 'L\'email utilisée existe déja!',
                  
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $object->setEnable(false);
        $object->generateToken();
        $encoded = $passwordHasher->hashPassword($object, $object->getPassword());
        //$object->setEntreprise($find);
        $object->setPassword($encoded);
        $object->setRoles(["ROLE_ADMIN"]);
        // Persister l'objet User et les utilisateurs
    
        $em->persist($object);
        $em-> flush();
       
        return $this->json("success", JsonResponse::HTTP_OK);
    }

   /**
 * @Route("/api/users", name="app_get_all_user", methods={"GET"})
 */
public function getAllUsers(Request $request, EntityManagerInterface $em): Response
{
    $userRepository = $em->getRepository(User::class);

    // Récupérez les utilisateurs triés par ordre décroissant d'ID d'insertion
    $users = $userRepository->findBy([], ['id' => 'DESC']);

    return $this->json($users, 200, [], ['groups' => 'read:user']);
}

    /**
     * @Route("/api/admins", name="app_get_all_admin", methods={"GET"})
     */
    public function getAllAdmins(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(User::class)->findAllAdmin("ROLE_ADMIN");
        return $this->json($find,200, [], ['groups' => 'read:user']);
    }

    

    /**
     * @Route("/api/users/{id}", name="app_edit_user", methods={"PUT"})
     */
    public function editUsers($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(["id"=>$id]);
        $item=json_decode($request->getContent(),true); 
        if (!$user) {
            throw $this->createNotFoundException('User introuvable.');
        }
        // $entreprise = $serializer->deserialize(
        // $item["entreprise"][0],
        // Entreprise::class,
        // 'json'
        // [ 
        //     AbstractNormalizer::OBJECT_TO_POPULATE =>$entreprise,
        //     AbstractObjectNormalizer::DEEP_OBJECT_TO_POPULATE => true,
        // ]
  //  );
     $user->setEmail($item["email"]);
    $user->setRoles($item["roles"]);
    $encoded = $passwordHasher->hashPassword($user, $item["password"]);
    $user->setPassword($encoded);
    $user->setEnable($item["enable"]);
    // $user->setToken($item["token"]);
    $user->setCivility($item["civility"]);
    $user->setNomComplet($item["nomComplet"]);
    $user->setTel($item["tel"]);
    
  //  dd($item["entreprise"]['id']);
    if($item["entreprise"] != null){
    $entreprise = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$item["entreprise"]['id']]);
    $user->setEntreprise($entreprise);
    }
    if($user->isFirstActive() == false && $user->isEnable() == true){
        $user->setFirstActive(true);
        $email = (new TemplatedEmail())
            ->from('Hirafy.company@gmail.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Activation d\'email')
            ->htmlTemplate('emails/firstActive.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'name'=> $user->getNomComplet()
            ]);

        $mailer->send($email);
        
    }

    
             
        $em->flush();

        return $this->json($user,200, [], ['groups' => 'read:user']);
    }

    /**
     * @Route("/api/users/{id}", name="app_get_user", methods={"GET"})
     */
    public function getUserById($id, Request $request, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(["id"=>$id]);
        return $this->json($user,200, [], ['groups' => 'read:user']);
    }

    /**
     * @Route("/api/users/email", name="app_get_user_email", methods={"POST"})
     */
    public function getUserByEmail(Request $request, EntityManagerInterface $em): Response
    {
        $item=json_decode($request->getContent(),true);
        $user = $em->getRepository(User::class)->findOneBy(["email"=>$item["email"]]);
        $bio = $em->getRepository(Biography::class)->findOneBy(["user"=>$user]);
        return $this->json($bio,200, [], ['groups' => 'read:biography']);
    }

     /**
     * @Route("/api/users/product", name="app_get_user_product", methods={"POST"})
     */
    public function getProductByUser(Request $request, EntityManagerInterface $em): Response
    {
        $item=json_decode($request->getContent(),true);
        $user = $em->getRepository(User::class)->findBy(["email"=>$item["email"]]);
        $product = $em->getRepository(Product::class)->findBy(["user"=>$user]);
        return $this->json($product,200, [], ['groups' => 'read:product']);
    }


    /**
     * @Route("/api/users/{id}", name="app_delete_user", methods={"DELETE"})
     */
    public function deleteUser($id, Request $request, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(["id"=>$id]);
        $em->remove($user);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/users/notifier/{id}", name="app_notifier_user", methods={"POST"})
     */
    public function notifierUser($id, Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $item=json_decode($request->getContent(),true);
        $user = $em->getRepository(User::class)->findOneBy(["id"=>$id]);
        $email = (new TemplatedEmail())
            ->from('Hirafy.company@gmail.com')
            ->to($user->getEmail())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Changement de mot de passe d\'email')
            ->htmlTemplate('emails/notifierUser.html.twig')
            // pass variables (name => value) to the template
            ->context([
                'name'=> $user->getNomComplet(),
                'password' => $item['password']
            ]);

        $mailer->send($email);
        return $this->json("success", JsonResponse::HTTP_OK);
    }
}