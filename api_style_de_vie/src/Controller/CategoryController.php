<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="app_category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/api/categories", name="app_create_category", methods={"POST"})
     */
    public function create(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {

            // Désérialiser l'objet Entreprise à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), Category::class, 'json');
        $object->setEnable(false);
    
           // Persister l'objet Entreprise et les utilisateurs
        
        $em->persist($object);
        $em-> flush();
        
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/categories", name="app_get_all_category", methods={"GET"})
     */
    public function getAllCategories(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Category::class)->findBy(["categoryParent"=> null]);
        return $this->json($find,200, [], ['groups' => 'read:category']);

    }

    /**
     * @Route("/api/categories/{id}", name="app_edit_category", methods={"PUT"})
     */
    public function editCategories($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $category = $em->getRepository(Category::class)->findOneBy(["id"=>$id]);


        $category2 = $serializer->deserialize($request->getContent(), 
                Category::class, 
                'json',
                [
                    'object_to_populate' => $category
                ] 
                );
        
        $em->flush();
        return $this->json($category2,200, [], ['groups' => 'read:category']);

    }

    /**
     * @Route("/api/categories/{id}", name="app_get_category", methods={"GET"})
     */
    public function getCategory($id, Request $request, EntityManagerInterface $em): Response
    {
        $category = $em->getRepository(Category::class)->findOneBy(["id"=>$id]);
        return $this->json($category,200, [], ['groups' => 'read:category']);
    }

    /**
     * @Route("/api/categories/{id}", name="app_delete_category", methods={"DELETE"})
     */
    public function deleteCategory($id, Request $request, EntityManagerInterface $em): Response
    {
        $category = $em->getRepository(Category::class)->findOneBy(["id"=>$id]);
        $em->remove($category);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }
}
