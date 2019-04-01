<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ProduitService;
use App\Entity\Produit;
use App\Entity\User;
use App\Form\ProduitType;
class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="produit_list")
     */
    public function list( Request $request, ProduitService $produitService ){
        $query = $request->query->get( 'query' );
        $sort = $request->query->get( 'sort', 'id' );
        if( !empty( $query ) ){
            $produits = $produitService->search( $query, $sort );
        }else{
            $produits = $produitService->getAll( $sort );
        }
        return $this->render( 'produit/list.html.twig', array(
            'produits' => $produits,
            'incomingCounter' => $produitService->countIncoming(),
        ));
    }
    /**
     * @Route("/produit/add", name="produit_add")
     */
    public function add( Request $request ){
        $produit = new Produit();
        $form = $this->createForm( ProduitType::class, $produit );
        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){
            $produit->setOwner( $this->getUser() );
            $em = $this->getDoctrine()->getManager();
            $em->persist( $produit );
            $em->flush();
            return $this->redirectToRoute( 'produit_show', array(
                'id' => $produit->getId(),
            ));
        }
        return $this->render( 'produit/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/produit/{id}", name="produit_show", requirements={"id"="\d+"})
     */
    public function show( ProduitService $produitService, $id ){
        $produit = $produitService->get( $id );
        if( empty( $produit ) ){
            return new Response( 'Produit Not Found', 404 );
        }
        return $this->render( 'produit/show.html.twig', array(
            'produit' => $produit,
        ));
    }
    /**
     * @Route("/produit/{id}/join", name="produit_join", requirements={"id"="\d+"})
     */
    public function join( $id ){
        return new Response( 'Produit join' );
    }
}