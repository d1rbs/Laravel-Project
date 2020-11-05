<?php


namespace App\services;


use App\Category;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\repositories\ArticleRepository;

class ArticleService
{
    /* @var ArticleRepository */
    private $articleRepository;

    /* @var $categoryService */
    private $categoryService;

    /* @var $imageChangesServices */
    private $imageChangesServices;

    /* @var $view */
    private $view = 'index';

    /* @var $request */
    private $request;

    /* @var $uploader */
    private $uploader;

    /* @var $cyrToLat */
    private $cyrToLat;

    /* @var $delete */
    private $delete;

    /**
     * ArticleService constructor.
     * @param Request $request
     * @param ArticleRepository $articleRepository
     * @param CategoryService $categoryService
     * @param ImageChangesServices $imageChangesServices
     */
    public function __construct(Request $request, ArticleRepository $articleRepository, CategoryService $categoryService, ImageChangesServices $imageChangesServices)
    {
        $this->request = $request;
        $this->articleRepository = $articleRepository;
        $this->categoryService = $categoryService;
        $this->imageChangesServices = $imageChangesServices;
        $this->uploader = new ImageUploaderServices();
        $this->cyrToLat = new CyrToLatServices();
    }

    /**
     * create
     */
    public function create()
    {
        //dd($this->request->input('category.0')) ;die;

            $article = new Articles();
            /* ---------------------Create $slug-----------------------*/
            $slug = $this->cyrToLat->trasliterate(($this->request->input('name')), $article);
            /* ---------------------Download images and save-----------------------*/
            $result = $this->uploader->setSlug($slug)->saveImageArticle($this->request->file('image'));

            $article->name = $this->request->input('name');
            $article->user_id = \Auth::user()->id;
            $article->categories = $this->request->input('category.0');
            $article->image = $result;
            $article->slug = $slug;
            $article->description = $this->request->input('description');

            $article->save();

            /*$relation->article_id = $article->id;
            foreach($this->request->category as $category_id)
            {
                $relation->category_id = $category_id;
                $relation->save();
            }*/

            return redirect()->back();
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
   /* public function destroyArticle($id)
    {
        if($this->relationService->getRelationByID($id))
        {
            $this->relationService->getRelationByID($id)->delete($this->relationService->getRelationByID($id)->id);
        }
        if($this->imageChangesServices->getArticleByID($id))
        {
            $this->delete->setSlug($this->relationService->getRelationByID($id)->slug)->destroyArticle($this->relationService->getRelationByID($id));
        }
        $this->request->session()->flash('status', 'Blog successful destroy!');
    }*/

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
     * @param $slug
     * @return mixed
     */
    public function getArticleBySlug($slug)
    {
        return $this->articleRepository->findBySlug($slug);
    }


}