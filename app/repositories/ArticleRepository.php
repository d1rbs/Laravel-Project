<?php


namespace App\repositories;

use App\Category;
use App\Models\Articles;
use Illuminate\Http\Request;

/**
 * Class ArticleRepository
 * @package App\repositories
 */
class ArticleRepository
{
    /* @var $request */
    private $request;

    /**
     * ArticleRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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

}