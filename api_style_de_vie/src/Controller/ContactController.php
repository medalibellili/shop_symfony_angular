<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    /**
     * @Route("/api/contacts", name="app_create_contact", methods={"POST"})
     */
    public function createContact(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {
        // Désérialiser l'objet Entreprise à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), Contact::class, 'json');
        $object->setCreatedAt(new \DateTime());
        $object->setStatus(false);
        $object->setNotification(true);
        // Persister l'objet Entreprise et les utilisateurs
        $em->persist($object);
        $em-> flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/reset-notifications", name="app_reset_notifications", methods={"POST"})
     */
    public function resetNotification(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {
        //  $object = $serializer->deserialize($request->getContent(), Contact::class, 'json');
        // $object->setCreatedAt(new \DateTime());
        // $object->setStatus(false);
        // $object->setNotification(true);
        //  $em->persist($object);
        // $em-> flush();
        // return $this->json("success", JsonResponse::HTTP_OK);
        // Code pour réinitialiser les notifications dans la base de données
        // Assurez-vous d'adapter cela à votre modèle et gestionnaire de données

         $entityManager = $this->getDoctrine()->getManager();
        $contacts = $entityManager->getRepository(Contact::class)->findAll();
        foreach ($contacts as $contact) {
            $contact->setNotification(false);
            $entityManager->persist($contact);
        }
        $entityManager->flush();

        return $this->json(['message' => 'Notifications réinitialisées']);
    }

    /**
     * @Route("/api/contacts", name="app_get_all_contact", methods={"GET"})
     */
    public function getAllContact(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Contact::class)->findAll();
        return $this->json($find,200);

    }

    /**
     * @Route("/api/contacts/status", name="app_get_status_contact", methods={"GET"})
     */
    public function getStatusContact(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Contact::class)->findBy(['status'=>false]);
        return $this->json($find,200);

    }

    /**
     * @Route("/api/contacts/{id}", name="app_edit_contact", methods={"PUT"})
     */
    public function editContacts($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $contact = $em->getRepository(Contact::class)->findOneBy(["id"=>$id]);
        $contact2 = $serializer->deserialize($request->getContent(), 
                Contact::class, 
                'json',
                [
                    'object_to_populate' => $contact
                ] 
                );
        
        $em->flush();
        return $this->json($contact2,200);

    }

    /**
     * @Route("/api/contacts/{id}", name="app_get_contact", methods={"GET"})
     */
    public function getContact($id, Request $request, EntityManagerInterface $em): Response
    {
        $contact = $em->getRepository(Contact::class)->findOneBy(["id"=>$id]);
        return $this->json($contact,200);

    }


    /**
     * @Route("/api/contacts/{id}", name="app_delete_contact", methods={"DELETE"})
     */
    public function deleteContact($id, Request $request, EntityManagerInterface $em): Response
    {
        $contact = $em->getRepository(Contact::class)->findOneBy(["id"=>$id]);
        $em->remove($contact);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }

    /**
     * @Route("/api/contacts/delete-multiple", name="app_delete_multiple_contact")
     */
    public function deleteMultipleContacts(Request $request, EntityManagerInterface $entityManager)
    {
        // Récupérez les identifiants des contacts à supprimer depuis le corps de la requête
        $data = json_decode($request->getContent(), true);

        // Vérifiez si 'contactIds' existe dans les données JSON reçues
        if (!isset($data['contactIds']) || !is_array($data['contactIds'])) {
            return new JsonResponse(['error' => 'Paramètre invalide'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $contactIds = $data['contactIds'];

        // Votre logique de suppression des contacts ici
        // Utilisez $contactIds pour obtenir les identifiants des contacts à supprimer
        // Par exemple, avec Doctrine :
        
        $repository = $entityManager->getRepository(Contact::class);

        foreach ($contactIds as $contactId) {
            $contact = $repository->find($contactId);

            if (!$contact) {
                return new JsonResponse(['error' => 'Contact introuvable'], JsonResponse::HTTP_NOT_FOUND);
            }

            // Suppression du contact
            $entityManager->remove($contact);
        }

        $entityManager->flush();

        // Retournez une réponse JSON appropriée
        return new JsonResponse(['message' => 'Contacts supprimés avec succès'], JsonResponse::HTTP_OK);
    }
}