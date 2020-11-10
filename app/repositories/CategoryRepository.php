<?php


namespace App\repositories;

use App\Category;
use App\services\CyrToLatServices;
use Illuminate\Http\Request;

/**
 * Class CategoryRepository
 * @package App\repositories
 */
class CategoryRepository
{
    /* @var $cyrToLat */
    private $cyrToLat;

    /**
     * CategoryRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->cyrToLat = new CyrToLatServices();
    }

    /**
     * create
     */
    public function create()
    {
        $category = new Category();

        /* ---------------------Create $slug-----------------------*/
        $category_slug = $this->cyrToLat->trasliterate(($this->request->input('name')), $category);

        /* ---------------------Download input in BD and save-----------------------*/
        $category->name = $this->request->input('name');
        $category->slug = $category_slug;
        $category->description = $this->request->input('description');

        $category->save();

        return redirect()->back();
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories()
    {
        return Category::all();
    }

    /**
     * @param string $slug
     * @return Category|null
     */
    public function findBySlug(string $slug = null): ?Category
    {
        return Category::where('slug', '=', $slug)->first();
    }
}