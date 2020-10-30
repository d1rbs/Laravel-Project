<?php


namespace App\Http\Controllers\Admin;

use App\Books;
use App\services\BookService;
use App\services\CyrToLatServices;
use App\services\ImageUploaderServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /* @var Request */
    private $request;

    /* @var $bookService */
    private $bookService;

    /* @var $uploader */
    private $uploader;

    /* @var $cyrToLat */
    private $cyrToLat;

    /**
     * BooksController constructor.
     * @param Request $request
     */
    public function __construct(Request $request, BookService $bookService){

        $this->request = $request;
        $this->bookService = $bookService;
        $this->uploader = new ImageUploaderServices();
        $this->cyrToLat = new CyrToLatServices();
    }

    public function create()
    {
        if($this->request->isMethod('post')){

            /* ---------------------Validator-----------------------*/
         $this->validate($this->request, [
             'book' => 'required|min:3|max:50',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'chapter' => 'required',
             'description' => 'required|max:999',
             'active' => 'required|max:25'
         ],[
             'book.required' => 'Потрібно обовязково ввести дані в це поле, рак',
             'book.min' => 'Вася, введи мін 3 букви!',
             'chapter.number' => 'тут повинні бути тільки цифри!!!',
             'description.required' => 'Якщо тут буде пусто, що я буду читати?',
             'active.required' => 'Обов`язково потрібно вказати статус книги!'
         ]);
        $this->bookService->create();
        }
        return view('admin.books.create');
    }
}

