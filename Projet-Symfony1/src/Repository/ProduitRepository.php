<?php
namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry){
        parent::__construct($registry, Event::class);
    }
    public function search( $query ){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->where( 'e.name LIKE :query' );
        $stmt->setParameter( ':query', '%' . $query . '%' );
        return $stmt->getQuery()->getResult();
    }
    public function countIncoming(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select( 'COUNT( e )' );
        $stmt->where( 'e.startAt > CURRENT_TIMESTAMP()' );
        return $stmt->getQuery()->getSingleScalarResult();
    }
    public function triDate(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select('e')->orderBy('e.date', 'ASC');
        return $stmt->getQuery()->getResult();
    }
    public function triPrice(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select('e')->orderBy('e.price', 'ASC');
        return $stmt->getQuery()->getResult();
    }
    public function triCapacity(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select('e')->orderBy('e.capacity', 'ASC');
        return $stmt->getQuery()->getResult();
    }
}