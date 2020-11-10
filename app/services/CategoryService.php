<?php


namespace App\services;


use App\Category;
use App\repositories\CategoryRepository;

/**
 * Class CategoryService
 * @package App\services
 */
class CategoryService
{
    /* @var $CategoryRepository */
    public $categoryRepository;

    /**
     * CategoryService constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * create Category!
     */
    public function create()
    {
        return $this->categoryRepository->create();
    }

    /**
     * @param string|null $slug
     * @return Category|null
     */
    public function getCategoryBySlug(string $slug = null){
        return $this->categoryRepository->findBySlug($slug);
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories()
    {
       return $this->categoryRepository->getCategories();
    }
}