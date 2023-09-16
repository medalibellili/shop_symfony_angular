<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Notification;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="app_notification")
     */
    public function index(): Response
    {
        return $this->render('notification/index.html.twig', [
            'controller_name' => 'NotificationController',
        ]);
    }


     /**
     * @Route("/api/notification", name="app_create_notification", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): Response
{
    try {
        $em->beginTransaction();

        // Deserialize the object
        $object = $serializer->deserialize($request->getContent(), Notification::class, 'json');
        $object->setStatus(true);
        // Persist the object
        $em->persist($object);
        $em->flush();
        
        // Commit the transaction
        $em->commit();

        return $this->json("success", JsonResponse::HTTP_OK);
    } catch (\Exception $e) {
        // Rollback the transaction in case of an exception
        $em->rollback();

        return $this->json(['error' => $e->getMessage()], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    /**
     * @Route("/api/notifications", name="app_get_all_notification", methods={"GET"})
     */
    public function getAllNotifications(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Notification::class)->findAll();
        return $this->json($find, 200, [], ['groups' => 'read:notification']);
    }
}