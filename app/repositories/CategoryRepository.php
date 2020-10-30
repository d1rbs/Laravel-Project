<?php


namespace App\repositories;


use App\Category;

/**
 * Class CategoryRepository
 * @package App\repositories
 */
class CategoryRepository
{
    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findCategories()
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