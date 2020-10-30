<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\services\ArticleService;
use App\services\CategoryService;
use App\services\ImageChangesServices;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /* @var Request */
    private $request;

    /* @var ImageChangesServices */
    private $ImageChangesServices;

    /* @var ImageChangesServices */
    private $categoryService;

    /* @var $articleService */
    private $articleService;

    /**
     * ArticleController constructor.
     * @param Request $request
     */
    public function __construct(Request $request, ImageChangesServices $ImageChangesServices, CategoryService $categoryService, ArticleService $articleService)
    {
        $this->request = $request;
        $this->ImageChangesServices = $ImageChangesServices;
        $this->categoryService = $categoryService;
        $this->articleService = $articleService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        $categories = $this->categoryService->getCategories();

        if($this->request->isMethod('post')) {
            /* ---------------------Validator-----------------------*/
            $this->validate($this->request, [
                'name' => 'required|min:3|max:200',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required'
            ], [
                'name.required' => 'Потрібно обовязково ввести дані в це поле',
                'name.min' => 'мін 3 букви!',
                'description.required' => 'Якщо тут буде пусто, що я буду читати?'
            ]);

            $this->articleService->create();
        }
        return view('admin/article/create',[
            'categories' => $categories,
        ]);
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     * update IMAGE!
     */
    public function update($id){
        if($this->request->isMethod('post')) {
            /* ---------------------Validator-----------------------*/
            $this->validate($this->request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $this->ImageChangesServices->updateImage($id);
        }
        return view('admin/article/update');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function delete($id){

        $this->ImageChangesServices->deleteImage($id);

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function destroy($id){

        $this->articleService->destroyArticle($id);

        return view('home');
    }
}