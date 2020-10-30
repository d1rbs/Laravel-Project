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
        $query = Articles::select('articles.*', 'article_category_relation.category_id')
            ->join('article_category_relation', 'article_category_relation.article_id', '=', 'articles.id')
            ->orderByDesc('id');

        if($category)
        {
            $query = $query->where('category_id', $category->id);
        }

        $query = $query->paginate(3);

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