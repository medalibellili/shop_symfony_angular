<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Depot;
use App\Entity\Entreprise;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\UserRepository;
use App\Repository\EntrepriseRepository;


class DepotController extends AbstractController
{
    /**
     * @Route("/depot", name="app_depot")
     */
    public function index(): Response
    {
        return $this->render('depot/index.html.twig', [
            'controller_name' => 'DepotController',
        ]);
    }

    /**
     * @Route("/api/depots", name="app_create_depot", methods={"POST"})
     */
    public function createDepot(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {
        $data = json_decode($request->getContent(), true);
        $entrepprise = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$data['entreprise']['id']]);


        // Désérialiser l'objet Depot à partir des données JSON
        $object = $serializer->deserialize($request->getContent(), Depot::class, 'json');

        
        //$object->setEnable(false);
        // Persister l'objet Depot et les utilisateurs
        $object->setEntreprise($entrepprise);
        $em->persist($object);
        $em-> flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/depots", name="app_get_all_depot", methods={"GET"})
     */
    public function getAllDepot(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Depot::class)->findAll();
        return $this->json($find,200, [], ['groups' => 'read:depot']);

    }

   /**
     * @Route("/api/depots/user", name="app_get_all_depot_user", methods={"POST"})
     */
    public function getAllDepotUser(Request $request, UserRepository $userRepository, EntrepriseRepository $er): Response
    {
        $data = json_decode($request->getContent(), true);

        $user = $userRepository->findOneBy(['email' => $data['email']]);

        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non trouvé.'], 404);
        }
        
        $entrep = $er->findOneBy(['id' => $user->getEntreprise()->getId()]);

        $depots = $entrep->getDepots();

        return $this->json($depots, 200, [], ['groups' => 'read:depot']);
    }

    /**
     * @Route("/api/depots/{id}", name="app_edit_depot", methods={"PUT"})
     */
    public function editDepots($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {

        $data = json_decode($request->getContent(), true);
        //dump( );
        $entrepprise = $em->getRepository(Entreprise::class)->findOneBy(["id"=>$data['entreprise']['id']]);

        $depot = $em->getRepository(Depot::class)->findOneBy(["id"=>$id]);
        $serializer->deserialize($request->getContent(), 
                Depot::class, 
                'json',
                [
                    'groups' => ['read:depot'],
                    'object_to_populate' => $depot
                ] 
                );



         //  dump( $depot ) ;die;    
           $depot->setEntreprise( $entrepprise);
           //dump($depot);die;
           $em->persist($depot);

        $em->flush();
        return $this->json($depot,200,[], ['groups' => 'read:depot']);

    }

    /**
     * @Route("/api/depots/{id}", name="app_get_depot", methods={"GET"})
     */
    public function getDepot($id, Request $request, EntityManagerInterface $em): Response
    {
        $depot = $em->getRepository(Depot::class)->findOneBy(["id"=>$id]);
        return $this->json($depot,200, [], ['groups' => 'read:depot']);

    }


    /**
     * @Route("/api/depots/{id}", name="app_delete_depot", methods={"DELETE"})
     */
    public function deleteDepot($id, Request $request, EntityManagerInterface $em): Response
    {
        $depot = $em->getRepository(Depot::class)->findOneBy(["id"=>$id]);
        $em->remove($depot);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }
}