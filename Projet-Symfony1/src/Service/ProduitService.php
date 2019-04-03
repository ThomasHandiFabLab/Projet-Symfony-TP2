<?php

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Produit;

class ProduitService{
    private $om;
    private $repository;
    public function __construct( ObjectManager $om ){
        $this->om = $om;
        $this->repository = $om->getRepository( Produit::class );
    }
    public function getAll( $criteria ){
        if ($criteria=='date') {
            return $this->repository -> triDate();
        } elseif ($criteria=='price') {
            return $this->repository -> triPrice();
        } elseif ($criteria=='capacity') {
            return $this->repository -> triCapacity();
        } else {
        return $this->repository->findAll();
        }
    }
    public function get( $id ){
        return $this->repository->find( $id );
    }
    public function search( $term ){
        return $this->repository->search( $term );
    }
}