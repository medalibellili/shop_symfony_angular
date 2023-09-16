<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Biography;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class BiographyController extends AbstractController
{
    /**
     * @Route("/biography", name="app_biography")
     */
    public function index(): Response
    {
        return $this->render('biography/index.html.twig', [
            'controller_name' => 'BiographyController',
        ]);
    }

     /**
     * @Route("/api/biography", name="app_create_biography", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): Response
{
    try {
        $em->beginTransaction();

        // Deserialize the object
        $object = $serializer->deserialize($request->getContent(), Biography::class, 'json');
        
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
     * @Route("/api/biographies", name="app_get_all_biography", methods={"GET"})
     */
    public function getAllBiographies(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Biography::class)->findAll();
        return $this->json($find,200);
    }

    /**
 * @Route("/api/biography/{id}", name="app_edit_biography", methods={"PUT"})
 */
public function editBiography($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
{
     
    $biography = $em->getRepository(Biography::class)->findOneBy(["id" => $id]);

    

    // Deserialize the request content and merge changes into the existing entity
    $serializer->deserialize($request->getContent(), Biography::class, 'json', [
        AbstractNormalizer::OBJECT_TO_POPULATE => $biography,
    ]);

   
    $em->persist($biography);
    $em->flush();

    return $this->json($biography, 200, [], ['groups' => 'read:biography']);
}

    /**
     * @Route("/api/biography/{id}", name="app_get_biography", methods={"GET"})
     */
    public function getBiography($id, Request $request, EntityManagerInterface $em): Response
    {
        $biography = $em->getRepository(Biography::class)->findOneBy(["id"=>$id]);
        return $this->json($biography,200);

    }


    /**
     * @Route("/api/biography/{id}", name="app_delete_biography", methods={"DELETE"})
     */
    public function deleteBiography($id, Request $request, EntityManagerInterface $em): Response
    {
        $biography = $em->getRepository(Biography::class)->findOneBy(["id"=>$id]);
        $em->remove($biography);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }
}