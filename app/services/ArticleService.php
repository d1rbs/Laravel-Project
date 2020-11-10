<?php


namespace App\services;


use App\Category;
use Illuminate\Http\Request;
use App\repositories\ArticleRepository;

class ArticleService
{
    /* @var ArticleRepository */
    private $articleRepository;

    /* @var $categoryService */
    private $categoryService;

    /* @var $view */
    private $view = 'index';

    /* @var $request */
    private $request;

    /**
     * ArticleService constructor.
     * @param Request $request
     * @param ArticleRepository $articleRepository
     * @param CategoryService $categoryService
     * @param ImageChangesServices $imageChangesServices
     */
    public function __construct(Request $request, ArticleRepository $articleRepository, CategoryService $categoryService)
    {
        $this->request = $request;
        $this->articleRepository = $articleRepository;
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return $this->articleRepository->create();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyArticle($id)
    {
       return $this->articleRepository->destroyArticle($id);
    }

    /**
     * @param string|null $slug
     * @return array|string
     */
    public function routeView(string $slug = null)
    {
        if (!is_null($slug) && $this->articleRepository->findBySlug($slug)) {

            $this->view = "view";
        }
        return $this->view;
    }

    /**
     * @param Category|null $category
     * @return array
     */
    public function search(Category $category = null)
    {
        return $this->articleRepository->search($category);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getArticleByID($id)
    {
        return $this->articleRepository->findByID($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getArticleBySlug($slug)
    {
        return $this->articleRepository->findBySlug($slug);
    }


}