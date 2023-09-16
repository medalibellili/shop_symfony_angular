<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Depot;
use App\Entity\Stock;
use App\Entity\Declinaison;
use App\Entity\SimpleProduct;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;



class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

     /**
     * @Route("/api/products", name="app_create_product", methods={"POST"})
     */
    public function createProduct(Request $request ,EntityManagerInterface $em ,SerializerInterface $serializer): Response
    {

            // Désérialiser l'objet Entreprise  à partir des données JSON
  
        $data = json_decode($request->getContent(), true);
         

        $product = $serializer->deserialize($request->getContent(), Product::class, 'json');
        
         
        $product->setStatus(false);

        
       $user = $em->getRepository(User::class)->findOneBy(["id"=>$data['user']['id']]);
        $product->setUser($user);
        foreach($product->getCategories() as $item){
            $product->removeCategory($item);
        }

        foreach($data['categories'] as $item){
            $cat = $em->getRepository(Category::class)->findOneBy(["id"=>$item['id']]);
            $product->addCategory($cat);
        }

        if(isset($data['declinaison'])){
            $listStock=$data['declinaison'];
        
            foreach($product->getDeclinaison() as $i=>$item){
                //$product->removeDeclinaison($item);
                foreach($item->getStock() as $j=>$item2){
                    $item2->setDepot(null);
                    $index=$listStock[$i]['stock'][$j]['depot']['id'];
                    $depot = $em->getRepository(Depot::class)->findOneBy(["id"=>$index]);
                    $item2->setDepot($depot);
                }
            }
        }

       
        
        
        $em->persist($product);
        $em-> flush();
        
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    

    /**
 * @Route("/api/products", name="app_get_all_product", methods={"GET"})
 */
public function getAllProducts(Request $request, EntityManagerInterface $em): Response
{
    $productRepository = $em->getRepository(Product::class);

    // Récupérez les produits triés par ordre décroissant d'ID d'insertion
    $products = $productRepository->findBy([], ['id' => 'DESC']);

    return $this->json($products, 200, [], ['groups' => 'read:product']);
}

    /**
     * @Route("/api/productsWithStock", name="app_get_all_product_with_stock", methods={"GET"})
     */
    public function getAllProductsWithStock(Request $request, EntityManagerInterface $em): Response
    {
        $find = $em->getRepository(Product::class)->findAll();
        return $this->json($find,200, [], ['groups' => 'read:withStock']);

    }
    /**
     * @Route("/api/products/status/{id}", name="app_edit_status_product", methods={"PUT"})
     */
    public function editProductsStatus($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);
        $product= $em->getRepository(Product::class)->findOneBy(["id"=>$id]);
        $product->setStatus($data['status']);
        $em->persist($product);     
        $em-> flush();
        return $this->json("success", JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/api/products/{id}", name="app_edit_product", methods={"PUT"})
     */
    public function editProducts($id, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $product= $em->getRepository(Product::class)->findOneBy(["id"=>$id]);
        $simpleProduct = $product->getSimpleProduct();
        $serializer->deserialize($request->getContent(), 
                Product::class, 
                'json',
                [
                    'object_to_populate' => $product
                ] 
                );
        
                      
               $data = json_decode($request->getContent(), true);
               $serializer->deserialize(json_encode($data['simpleProduct']), 
                SimpleProduct::class, 
                'json',
                [
                    'object_to_populate' => $simpleProduct
                ] 
                );
               
               $product->setSimpleProduct($simpleProduct);

              $user = $em->getRepository(User::class)->findOneBy(["id"=>$data['user']['id']]);
               $product->setUser($user);
               foreach($product->getCategories() as $item){
                   $product->removeCategory($item);
               }
       
               foreach($data['categories'] as $item){
                   $cat = $em->getRepository(Category::class)->findOneBy(["id"=>$item['id']]);
                   $product->addCategory($cat);
               }

               foreach($product->getDeclinaison() as $item){
                $product->removeDeclinaison($item);
            }
            
        
            
            if(isset($data['declinaison'])){                          
               $listStock=$data['declinaison'];
               
               foreach($data['declinaison'] as $i=>$item){
                if(isset($item['id'])){
                $dec = $em->getRepository(Declinaison::class)->findOneBy(["id"=>$item['id']]);
                }else{
                    $dec = new Declinaison();
                }
                $serializer->deserialize(json_encode($data['declinaison'][$i]), 
                        Declinaison::class, 
                        'json',
                        [
                            'object_to_populate' => $dec
                        ],
                        ['groups' => 'read:product']
                );
                foreach($dec->getStock() as $item){
                    $dec->removeStock($item);
                }

                   foreach($listStock[$i]['stock'] as $j=>$item2){
                    $stock = $em->getRepository(Stock::class)->findOneBy(["id"=>$item2['id']]);
                    $serializer->deserialize(json_encode($listStock[$i]['stock'][$j]), 
                        Stock::class, 
                        'json',
                        [
                            'object_to_populate' => $stock
                        ],
                        
                );
                    $depot = $em->getRepository(Depot::class)->findOneBy(["id"=>$listStock[$i]['stock'][$j]['depot']['id']]);
                    $serializer->deserialize(json_encode($listStock[$i]['stock'][$j]['depot']), 
                    Depot::class, 
                    'json',
                    [
                        'object_to_populate' => $depot
                    ],
                    
            );
                    $stock->setDepot($depot);
                    
                      
                    $dec->addStock($stock);
                   }
                 
                $product->addDeclinaison($dec);
               }
            }
               
          
               $em->persist($product);
              
            $em-> flush();
               
               return $this->json("success", JsonResponse::HTTP_OK);

    }

    /**
     * @Route("/api/products/{id}", name="app_get_product", methods={"GET"})
     */
    public function getProduct($id, Request $request, EntityManagerInterface $em): Response
    {
        $product = $em->getRepository(Product::class)->findOneBy(["id"=>$id]);
        return $this->json($product,200, [], ['groups' => 'read:product']);

    }


    /**
     * @Route("/api/products/{id}", name="app_delete_product", methods={"DELETE"})
     */
    public function deleteProduct($id, Request $request, EntityManagerInterface $em): Response
    {
        $product = $em->getRepository(Product::class)->findOneBy(["id"=>$id]);
        $em->remove($product);
        $em->flush();
        return $this->json("success", JsonResponse::HTTP_OK);

    }
}