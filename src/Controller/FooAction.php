<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FooAction extends AbstractController
{

    public function __invoke(BookRepository $bookRepository)
    {
        // TODO: Implement __invoke() method.
        // id da 2ga teng bolgan bookni topishmi buyurdk
        // Javob sifatida Book sinifiga tegishli obyrky ishlatilladi
        // Agar, bu id ga eng malumot topilmasa - null qaytaradi
        $book = $bookRepository->find(2);


        // Malumotni shartlari boyicha qidirish
        // WHERE name = "Sehrlok Holmes" AND description = "Baker street 224B" LIMIT 1
        $book= $bookRepository->findOneBy([
            'name' => 'Sherlock Holmes',
            'description' => 'Baker street 221B'

        ]);

        // Malumotlarni shartlari boyicha qidirish
        // WHERE name = "Sehrlok Holmes" AND description = "Baker street 224B"
        // Javop sifatida koplik waytarilladi. Har bir koplik elementi
        // Book sinifi obyektiga teng bolladi
        $books = $bookRepository->findBy([
            'name' => 'Sherlok Holmes'
        ]);



        // Ozimiz yaratkan ussulardi ham yaratishimiz mumkin
        $books = $bookRepository->findOneByText('Holmes');


    }


}