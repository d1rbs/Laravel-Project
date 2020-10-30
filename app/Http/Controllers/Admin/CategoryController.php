<?php


namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Controllers\Controller;
use App\services\CategoryService;
use App\services\CyrToLatServices;
use App\services\ImageUploaderServices;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /* @var Request */
    private $request;

    /* @var $categoryService */
    private $categoryService;

    /**
     * CategoryController constructor.
     * @param Request $request
     */
    public function __construct(Request $request, CategoryService $categoryService)
    {
        $this->request = $request;
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        if($this->request->isMethod('post'))
        {
            $this->validate($this->request, [
                'name' => 'required|min:3|max:20',
                'description' => 'required'
            ], [
                'name.required' => 'Потрібно обовязково ввести дані в це поле',
                'name.min' => 'мін 3 букви!',
                'description.required' => 'Опис Категорії обов`язковий!'
            ]);

        $this->categoryService->create();
        }

        return view('/admin/category/create');
    }

    public function update()
    {
//
    }

    public function delete()
    {
//
    }
}