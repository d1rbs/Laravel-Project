<?php


namespace App\services;


use App\Category;
use App\repositories\CategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CategoryService
 * @package App\services
 */
class CategoryService
{
    /* @var $CategoryRepository */
    public $categoryRepository;

    /* @var $cyrToLat */
    private $cyrToLat;
    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(Request $request, CategoryRepository $categoryRepository)
    {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->cyrToLat = new CyrToLatServices();
    }

    /**
     * create Category!
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
    }

    /**
     * @param string $slug
     * @return \App\Category|null
     */
    public function getCategoryBySlug(string $slug = null){
        return $this->categoryRepository->findBySlug($slug);
    }

    /**
     * @return \App\Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories()
    {
       return $this->categoryRepository->findCategories();
    }
}