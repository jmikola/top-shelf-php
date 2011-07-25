<?php

namespace Acme\TodoBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class TodoRepository extends DocumentRepository
{
    public function findAllOrderedByName()
    {
        return $this->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery()
            ->execute();
    }
}

