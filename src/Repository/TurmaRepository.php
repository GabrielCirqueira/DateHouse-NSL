<?php

namespace App\Repository;

use App\Entity\Turma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Turma>
 */
class TurmaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Turma::class);
    }

    public function salvarTurma(Turma $turma) : void
    {
        $this->getEntityManager()->persist($turma);
        $this->getEntityManager()->flush();
    }
   
}
