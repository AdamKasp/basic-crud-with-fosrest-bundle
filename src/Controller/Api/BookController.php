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

namespace App\Controller\Api;

use App\Entity\Book;
use App\Entity\BookInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BookController extends AbstractFOSRestController
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ObjectRepository */
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Book::class);
    }

    /**
    * @Rest\Post("/books")
    */
    public function postBook(Request $request): View
    {
        $book = new Book();
        $book->setTitle($request->get('title'));
        $book->setAuthor($request->get('author'));
        $book->setLength($request->get('length'));

        $this->entityManager->persist($book);
        $this->entityManager->flush();

        return View::create($book, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/books/{id}")
     */
    public function getBook(int $id): View
    {
        $book = $this->objectRepository->find($id);

        return View::create($book, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/books")
     */
    public function getBooks(): View
    {
        $books = $this->objectRepository->findAll();

        return View::create($books, Response::HTTP_OK);
    }

    /**
     * @Rest\Put("/books")
     */
    public function putBook(int $id, Request $request): View
    {
        /** @var BookInterface $book */
        $book = $this->objectRepository->find($id);

        $book->setTitle($request->get('title'));

        $this->entityManager->persist($book);
        $this->entityManager->flush();

        return View::create($book, Response::HTTP_OK);
    }

    /**
     * @Rest\Delete("/books")
     */
    public function deleteBook(int $id): View
    {
        $this->entityManager->remove($this->objectRepository->find($id));
        $this->entityManager->flush();

        return View::create(Response::HTTP_OK);
    }
}
