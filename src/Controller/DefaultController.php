<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Publisher;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use App\Repository\PublisherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/authors/{id}", name="authors_get", requirements={"id": "\d+"})
     * @param Author $author
     * @return JsonResponse
     */
    public function authorsGet(Author $author) : JsonResponse
    {
        return new JsonResponse($author);
    }

    /**
     * @Route("/authors/list", name="authors_list")
     * @param AuthorRepository $repository
     * @return JsonResponse
     */
    public function authorsList(AuthorRepository $repository) : JsonResponse
    {
        $authors = $repository->findAll();
        return new JsonResponse($authors);
    }

    /**
     * @Route("/publishers/{id}", name="publishers_get", requirements={"id": "\d+"})
     * @param Publisher $publisher
     * @return JsonResponse
     */
    public function publishersGet(Publisher $publisher) : JsonResponse
    {
        return new JsonResponse($publisher);
    }

    /**
     * @Route("/publishers/list", name="publishers_list")
     * @param PublisherRepository $repository
     * @return JsonResponse
     */
    public function publishersList(PublisherRepository $repository) : JsonResponse
    {
        $publishers = $repository->findAll();
        return new JsonResponse($publishers);
    }

    /**
     * @Route("/books/highlighted", name="books_list_highlighted")
     * @param BookRepository $repository
     * @return JsonResponse
     */
    public function booksHighlighted(BookRepository $repository) : JsonResponse
    {
        $books = $repository->findBy(['highlight' => true]);
        return new JsonResponse($books);
    }

    /**
     * @Route("/books/{id}", name="books_get", requirements={"id"="\d+"})
     * @param Book $book
     * @return JsonResponse
     */
    public function booksGet(Book $book) : JsonResponse
    {
        return new JsonResponse($book);
    }

    /**
     * @Route("/books/search/{keyword}", name="books_search",  defaults={"offset": 0, "limit": 10})
     * @Route("/books/search/{keyword}/{offset}/{limit}", name="books_search_paginated", requirements={"offset": "\d+","limit": "\d+"})
     * @param BookRepository $repository
     * @param string $keyword
     * @param int $offset
     * @param int $limit
     * @return JsonResponse
     */
    public function booksSearch(BookRepository $repository, string $keyword, int $offset, int $limit) : JsonResponse
    {
        $books = $repository->search($keyword, $offset, $limit);
        return new JsonResponse($books);
    }
}
