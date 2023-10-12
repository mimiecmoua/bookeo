<?php

namespace App\Repository;

use App\Entity\Book;

class BookRepository
{
    public function FindOneById(int $id)
    {
        // Appel bdd
        $book = ['id' => 1, 'title' => 'titre test', 'description' => 'description test'];

        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

        return $bookEntity;
    }
}
