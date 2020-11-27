<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Models\CategoryTranslation;

class MigrateToMultylang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = Category::all();

        foreach ($categories as $category)
        {
            $category_translation = new CategoryTranslation();

            $category_translation->category_id = $category->id;
            $category_translation->language = 'ru';
            $category_translation->title = $category->name;
            $category_translation->description = $category->description;
            $category_translation->save();

            $category_translation = new CategoryTranslation();

            $category_translation->category_id = $category->id;
            $category_translation->language = 'ua';
            $category_translation->title = $category->name;
            $category_translation->description = $category->description;

            $category_translation->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
