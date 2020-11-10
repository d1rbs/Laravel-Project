<?php


namespace App\repositories;

use App\Category;
use App\Models\Articles;
use App\services\CyrToLatServices;
use App\services\ImageChangesServices;
use App\services\ImageUploaderServices;
use Illuminate\Http\Request;

/**
 * Class ArticleRepository
 * @package App\repositories
 */
class ArticleRepository
{
    /* @var $request */
    private $request;

    /* @var $cyrToLat */
    private $cyrToLat;

    /* @var $imageChangesServices */
    private $imageChangesServices;

    /* @var $uploader */
    private $uploader;

    /**
     * ArticleRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request, ImageChangesServices $imageChangesServices)
    {
        $this->request = $request;
        $this->imageChangesServices = $imageChangesServices;
        $this->cyrToLat = new CyrToLatServices();
        $this->uploader = new ImageUploaderServices();
    }

    /**
     * @param Category|null $category
     * @return array
     */
    public function search(Category $category = null)
    {
        $query = Articles::orderByDesc('id');

        if($category)
        {
            $query = $query->where('categories', $category->id);
        }

        $query = $query->paginate(3);

        return $query;
    }

    public function findByID($id)
    {
        $query = Articles::find($id);
        return $query;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug){

        $query = Articles::where('slug', '=', $slug)->first();
        return $query;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
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

        return redirect()->back();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyArticle($id)
    {
        if($id)
        {
            $this->imageChangesServices->deleteImage($id);
            $this->uploader->setSlug($this->imageChangesServices->getArticleByID($id)->slug)->destroyArticle($this->imageChangesServices->getArticleByID($id));
        }

        $this->request->session()->flash('status', 'Blog successful destroy!');
        return $id;
    }
}