<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;
use App\Entity\BookInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

final class BookRepository implements BookRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var ObjectRepository
     */
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Book::class);
    }

    public function findById(int $id): ?BookInterface
    {
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function save(BookInterface $book): void
    {
        // TODO: Implement save() method.
    }

    public function delete(BookInterface $book): void
    {
        // TODO: Implement delete() method.
    }
}
