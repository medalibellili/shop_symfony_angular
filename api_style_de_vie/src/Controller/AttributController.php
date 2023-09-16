<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Attribut;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class AttributController extends AbstractController 
{
    /**
     * @Route("/attribut", name="app_attribut")
     */
    public function index(): Response
    {
        return $this->render('attribut/index.html.twig', [
            'controller_name' => 'AttributController',
        ]);
    }

    /**
     * @Route("/api/attributs", name="app_create_attribut", methods={"POST"})
     */
    public function create(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {

        // Désérialiser l'objet Entreprise à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), Attribut::class, 'json');
        $object->setStatus(false);
        // Persister l'objet Entreprise et les utilisateurs
        $em->persist($object);
        $em-> flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/attributs", name="app_get_all_attribut", methods={"GET"})
     */
    public function getAllAttributs(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Attribut::class)->findAll();
        return $this->json($find,200, [], ['groups' => 'read:attribut']);
    }

    /**
     * @Route("/api/attributs/{id}", name="app_edit_attribut", methods={"PUT"})
     */
    public function editAttributs($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $attribut = $em->getRepository(Attribut::class)->findOneBy(["id"=>$id]);
        $attribut2 = $serializer->deserialize($request->getContent(), 
                Attribut::class, 
                'json',
                [
                    'object_to_populate' => $attribut
                ] 
                );
        $em->flush();
        return $this->json($attribut2,200, [], ['groups' => 'read:attribut']);

    }

    /**
     * @Route("/api/attributs/{id}", name="app_get_attribut", methods={"GET"})
     */
    public function getAttribut($id, Request $request, EntityManagerInterface $em): Response
    {
        $attribut = $em->getRepository(Attribut::class)->findOneBy(["id"=>$id]);
        return $this->json($attribut,200, [], ['groups' => 'read:attribut']);

    }


    /**
     * @Route("/api/attributs/{id}", name="app_delete_attribut", methods={"DELETE"})
     */
    public function deleteAttribut($id, Request $request, EntityManagerInterface $em): Response
    {
        $attribut = $em->getRepository(Attribut::class)->findOneBy(["id"=>$id]);
        $em->remove($attribut);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }
}
