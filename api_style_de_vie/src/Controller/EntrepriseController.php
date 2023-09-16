<?php
// src/Controller/UserController.php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Biography;
use App\Entity\Entreprise;
use App\Entity\ProductGallery;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/api/entreprises", name="app_create_entreprise", methods={"POST"})
     */
    public function create(Request $request, MailerInterface $mailer, UserPasswordHasherInterface $passwordHasher ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {

            // Désérialiser l'objet Entreprise à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), Entreprise::class, 'json');
        $object->setEnable(false);
        
        $find = $em->getRepository(Entreprise::class)->findOneBy(["matriculeFiscale"=>$object->getMatriculeFiscale()]);
    
        if ($find != null && $find->getTypeEntreprise()=="Morale") {
            return new JsonResponse(
                [
                    'message' => 'Error',
                    'error' => 'La matricule fiscale utilisée existe déja!',
                  
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $find = $em->getRepository(Entreprise::class)->findOneBy(["cin"=>$object->getCin()]);
        if ($find != null && $find->getTypeEntreprise()=="Physique") {
            return new JsonResponse(
                [
                    'message' => 'Error',
                    'error' => 'La CIN utilisée existe déja!',
                  
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        $find = $em->getRepository(User::class)->findOneBy(["email"=>$object->getUsers()[0]->getEmail()]);
        if ($find != null) {
            return new JsonResponse(
                [
                    'message' => 'Error',
                    'error' => 'L\'email utilisée existe déja!',
                  
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        // Générer le token pour le premier utilisateur et hasher son mot de passe
        if($object->getTypeEntreprise()=="Morale"){
            $object->setTel($object->getUsers()[0]->getTel());
        }
        $object->getUsers()[0]->generateToken();
        $encoded = $passwordHasher->hashPassword($object->getUsers()[0], $object->getUsers()[0]->getPassword());
        $object->getUsers()[0]->setPassword($encoded);

        // Persister l'objet Entreprise et les utilisateurs
        
        $em->persist($object);
        $em-> flush();
        $biography = new Biography();
        //$biography->setName("test");
        $biography->setUser($object->getUsers()[0]);
        $em->persist($biography);
        $em-> flush();
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
                'name'=> $object->getUsers()[0]->getNomComplet()
            ]);
        $mailer->send($email);
        
        return $this->json("success", JsonResponse::HTTP_OK);
    }

     /**
 * @Route("/api/entreprises/edit/{id}", name="app_update_entreprise", methods={"POST"})
 */
public function update(
    Request $request,
    $id,
    UserPasswordHasherInterface $passwordEncoder,
    EntityManagerInterface $entityManager,
    SerializerInterface $serializer
): Response {
    
    $find = $entityManager->getRepository(Entreprise::class)->find($id);
    
    //dd($request->getContent());
    // Check if the 'user' parameter is provided
    $userData = $request->request->get('user');
    if (!$userData) {
        return new JsonResponse(['error' => 'Invalid data provided.'], 400);
    }
    // Deserialize the 'user' data to Entreprise object
    $object = $serializer->deserialize($userData, Entreprise::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $find]);


    // Encode the user's password
    $encodedPassword = $passwordEncoder->hashPassword($object->getUsers()[0], $object->getUsers()[0]->getPassword());
    $object->getUsers()[0]->setPassword($encodedPassword);

    // Handle file upload
    $file = $request->files->get('file');
    if (!$file) {
        return new JsonResponse(['error' => 'No file uploaded.'], 400);
    }

    // Generate a unique filename
    $filename = md5(uniqid()) . '.' . $file->getClientOriginalExtension();

    // Define the target directory
    $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/';

    // Move the uploaded file to the target directory
    try {
        $file->move($targetDirectory, $filename);
    } catch (\Exception $e) {
        return new JsonResponse(['error' => 'File upload failed.'], 500);
    }

    // Set the filename in the Entreprise object
    //$object->setFilename($filename);

    // Persist and flush the changes
    // dd($find);
    //$entityManager->persist($find);
    $entityManager->flush();

    // Return the updated object as JSON response
    return $this->json("success");
}
    /**
 * @Route("/api/upload_file", name="upload_file", methods={"POST"})
 */
public function upload_file(Request $request){
     //file
     if (!$request->files->has('file')) {
        return new JsonResponse(['error' => 'No file uploaded.'], 400);
    }

    // Handle the file upload
    $file = $request->files->get('file');

    // Generate a unique filename
    $filename = md5(uniqid()) . '.' . $file->getClientOriginalExtension();

    // Define the target directory
    $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/';

    // Move the uploaded file to the target directory
    try {
        $file->move($targetDirectory, $filename);
    } catch (\Exception $e) {
        return new JsonResponse(['error' => 'File upload failed.'], 500);
    } 
    return $this->json($filename,200);
    //endfile
}

    /**
 * @Route("/api/multiple_upload_file", name="upload_multiple_file", methods={"POST"})
 */
public function multiple_upload_file(Request $request){
    //file
    if (!$request->files->has('images')) {
       return new JsonResponse(['error' => 'No file uploaded.'], 400);
   }

   // Handle the file upload
   $files = $request->files->get('images');
   $productGalleries=[];
   foreach ($files as $file){
    
        // Generate a unique filename
        $filename = md5(uniqid()) . '.' . $file->getClientOriginalExtension();

        // Define the target directory
        $targetDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/';

        // Move the uploaded file to the target directory
        try {
            $file->move($targetDirectory, $filename);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'File upload failed.'], 500);
        }
        array_push($productGalleries,$filename);
   }
    
   return $this->json($productGalleries,200);
   //endfile
}

/**
 * @Route("/api/entreprises", name="app_get_all_entreprise", methods={"GET"})
 */
public function getAllEntreprises(Request $request, EntityManagerInterface $em): Response
{
    $entrepriseRepository = $em->getRepository(Entreprise::class);

    // Récupérez les entreprises triées par ordre décroissant d'ID d'insertion
    $entreprises = $entrepriseRepository->findBy([], ['id' => 'DESC']);

    return $this->json($entreprises, 200, [], ['groups' => 'read:entreprise']);
}

    /**
 * @Route("/api/entreprises/{id}", name="app_edit_entreprise", methods={"PUT"})
 */
public function editEntreprises($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
{
    $entreprise = $em->getRepository(Entreprise::class)->find($id);
    
    $result=json_decode($request->getContent(),true);
    if (!$entreprise) {
        throw $this->createNotFoundException('Entreprise introuvable.');
    }

    // $serializer->deserialize(
    //     $request->getContent(),
    //     Entreprise::class,
    //     'json',
    //     [ 
    //         AbstractNormalizer::OBJECT_TO_POPULATE =>$entreprise,
    //         AbstractObjectNormalizer::DEEP_OBJECT_TO_POPULATE => true,
    //     ]
    // );
       //dd($entreprise);die; 

  //$em->persist($entreprise)
  
  $entreprise->setRaisonSocial($result["raisonSocial"]);
  $entreprise->setMatriculeFiscale($result["matriculeFiscale"]);
  $entreprise->setAdresse($result["adresse"]);
  $entreprise->setCodePostal($result["codePostal"]);
  $entreprise->setFileRne($result["fileRne"]);
  $entreprise->setFileMatricule($result["fileMatricule"]);
  $entreprise->setLogo($result["logo"]);
  $entreprise->setCin($result["cin"]);
  $entreprise->setTypeEntreprise($result["typeEntreprise"]);
  $entreprise->setFileCin($result["fileCin"]);
  $entreprise->setTel($result["tel"]);
  $entreprise->setNameBrand($result["nameBrand"]);
  $entreprise->setEnable($result["enable"]);
//   $entreprise->getUsers()->clear();
//   foreach($result['users']as $item){
//     $user = new User();
//     $user->setId($item["id"]);
//     $user->setEmail($item["email"]);
//     $user->setRoles($item["roles"]);
//     $user->setPassword($item["password"]);
//     $user->setEnable($item["enable"]);
//     $user->setToken($item["token"]);
//     $user->setCivility($item["civility"]);
//     $user->setNomComplet($item["nomComplet"]);
//     $user->setTel($item["tel"]);
//     $entreprise->addUser($user);

//   }
     $em->flush();
    

    return $this->json($entreprise, 200, [], ['groups' => 'read:entreprise']);
}

    /**
     * @Route("/api/entreprises/{id}", name="app_get_entreprise", methods={"GET"})
     */
    public function getEntreprise($id, Request $request, EntityManagerInterface $em): Response
    {
        $entreprise = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$id]);
        return $this->json($entreprise,200, [], ['groups' => 'read:entreprise']);

    }


    /**
     * @Route("/api/entreprises/{id}", name="app_delete_entreprise", methods={"DELETE"})
     */
    public function deleteEntreprise($id, Request $request, EntityManagerInterface $em): Response
    {
        $entreprise = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$id]);
        foreach ($entreprise->getUsers() as &$value) {
            $value->setEntreprise(null);
        }
        $em->remove($entreprise);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }

    
   
}
   