<?php

namespace App\manager;


use App\api\GoogleBooksApi;


class GoogleBooksApiManager
{
    protected object $googleBooksAPI;
    protected array $arrBooks;


    public function __construct()
    {
        $this->googleBooksAPI = new GoogleBooksApi();
        $this->arrBooks = [];
    }


    public function getData($name): array
    {

        $datas = $this->googleBooksAPI->findByName($name);


        $arrItemsCount = count($datas['items']);

        for ($h = 0; $h < $arrItemsCount; $h++) {


            $identifierCount = count($datas['items'][$h]['volumeInfo']['industryIdentifiers']);
            for ($i=0; $i < $identifierCount; $i++)
            {

                if ($datas['items'][$h]['volumeInfo']['industryIdentifiers'][$i]['type'] === "ISBN_13")
                {
                    $isbn = $datas['items'][$h]['volumeInfo']['industryIdentifiers'][$i]['identifier'];
                }
            }



            if (!empty($datas['items'][$h]['volumeInfo']['imageLinks'])) {
                $cover =$datas['items'][$h]['volumeInfo']['imageLinks'];
            } else {
                $cover = [];
            }

            $name= $datas['items'][$h]['volumeInfo']['title'] ?? "";
            $publication = $datas['items'][$h]['volumeInfo']['publishedDate'] ?? "";
            $summary = $datas['items'][$h]['volumeInfo']['description'] ?? "";

            if (!empty($datas['items'][$h]['volumeInfo']['categories'])) {

                $category = $datas['items'][$h]['volumeInfo']['categories'];
            } else {
                $category =[];
            }

            $author = $datas['items'][$h]['volumeInfo']['authors'] ?? "";

            $this->arrBooks [] =[
               "isbn" => $isbn,
                "cover" => $cover,
                "name" => $name,
                "publication" => $publication,
                "summary" => $summary,
                "category" => $category,
                "author" => $author

];

        }
        return $this->arrBooks ;

    }


    public function getListInfos($name): array
    {
        $arrBooks = $this->getData($name);


            foreach ($arrBooks as $book)
            {
                $listInfo [] = [
                    'isbn' => $book['isbn'],
                    'name' => $book['name'],
                    'publication' => $book['publication'],
                    'categorie' => $book['category'],
                    'authors' => $book['author']
                ];


    }

        return $listInfo;
    }

    public function getBookByIsbn(int $isbn): array
    {
        $book = $this->googleBooksAPI->findByISBN($isbn);
       /* var_dump($book['items'][0]['volumeInfo']);
        die;*/

            $title= $book['items'][0]['volumeInfo']['title'] ?? "";
            $authors= $book['items'][0]['volumeInfo']['authors'][0] ?? "";
            $categories= $book['items'][0]['volumeInfo']['categories'][0] ?? "";
            $publishedDate= $book['items'][0]['volumeInfo']['publishedDate'] ?? "";
            $imageLinks= $book['items'][0]['volumeInfo']['imageLinks']['thumbnail'] ?? "";
            $description= $book['items'][0]['volumeInfo']['description'] ?? "";
            $pageCount= $book['items'][0]['volumeInfo']['pageCount'] ?? "";
            $language= $book['items'][0]['volumeInfo']['language'] ?? "";

            if ($language === "fr")
            {
                $language = "Français";
            }

            $arrBookData ["data"] = [
            "isbn" => $isbn,
            "title" => $title,
            "authors" => $authors,
            "categories" => $categories,
            "publishedDate" => $publishedDate,
            "imageLinks" => $imageLinks,
            "description" => $description,
            "pageCount" => $pageCount,
            "language" => $language,
            ];

              return $arrBookData;

    }
}