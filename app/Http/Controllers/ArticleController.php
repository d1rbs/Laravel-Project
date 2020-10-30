<?php


namespace App\Http\Controllers;


use App\services\ArticleService;
use App\services\CategoryService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var $articleService
     */
    private $articleService;
    /**
     * @var $categoryService
     */
    private $categoryService;
    private $view;

    /**
     * CategoryController constructor.
     * @param Request $request
     */
    public function __construct(Request $request, ArticleService $articleService, CategoryService $categoryService)
    {
        $this->request = $request;
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
    }

    /**
     * @param string|null $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $slug = null)
    {
        $articles = $this->articleService->search($this->categoryService->getCategoryBySlug($slug));
        $article = $this->articleService->getArticleBySlug($slug);
        $categories = $this->categoryService->getCategories();

        $this->view = $this->articleService->routeView($slug);

        return view('article.'.$this->view,[
            'articles' => $articles,
            'article' => $article,
            'categories' => $categories,
        ]);
    }


}