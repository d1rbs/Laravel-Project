<?php


namespace App\services;


use App\Books;
use App\repositories\BookRepository;
use Illuminate\Http\Request;

class BookService
{
    /* @var BookRepository */
    private $bookRepository;

    /* @var $cyrToLat */
    private $cyrToLat;

    /* @var $uploader */
    private $uploader;
    /**
     * BookService constructor.
     * @param Request $request
     * @param BookRepository $bookRepository
     */
    public function __construct(Request $request, BookRepository $bookRepository)
    {
        $this->request = $request;
        $this->bookRepository = $bookRepository;
        $this->cyrToLat = new CyrToLatServices();
    }

    /**
     * create BOOK!
     */
    public function create()
    {
        /* ---------------------Created $slug-----------------------*/
        $slug = $this->cyrToLat->trasliterate($this->request->input('book'));
        /* ---------------------Download images and save-----------------------*/
        $result = $this->uploader->setSlug($slug)->saveImageBook($this->request->file('image'));
        /* ---------------------Download input in BD and save-----------------------*/
        $book = new Books();
        $book->book = $this->request->input('book');
        $book->slug = $slug;
        $book->image = $result;
        $book->chapter = $this->request->input('chapter');
        $book->description = $this->request->input('description');
        $book->active = $this->request->input('active');

        $book->save();
    }
}