<?php


namespace App\services;

/**
 * Class ImageUploaderServices
 * @package App\services
 */
class ImageUploaderServices
{
    /**
     * @var string
     */
    private $slug = 'default';

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug){

        $this->slug = $slug;

        return $this;
    }

    /**
     * @param $image
     * @param $slug
     * @return string
     */
    public function saveImageArticle($image)
    {
        if (!is_dir('storage/images/blog/' .  $this->slug  . '/')) {
            mkdir('storage/images/blog/' .  $this->slug  . '/', 0777, true);
        }
        $imageName =  $this->slug  . time() . '.' . $image->extension();
        $path = $image->storeAs('images/blog/' .  $this->slug , $imageName, 'public');

        return $imageName;
    }

    /**
     * @param $image
     * @param $articles
     */
    public function updateImage($image, $articles){
/*------------------Перевірка чи є у нас вже залите фото ---------------------*/
               if(!empty($articles->image)) {
                   $this->setSlug($articles->slug)->deleteImageArticle($articles);
               }
        $result = $this->setSlug($articles->slug)->saveImageArticle($image);

        $articles->image = $result;

        $articles->save();
    }

    /**
     * @param $values
     */
    public function deleteImageArticle($values)
         {
             if($values){
                  unlink('storage/images/blog/'. $this->slug .'/'. $values->image);
         }
             $values->image = '';
            $values->save();
         }

    /**
     * @param $delete
     */
    public function destroyArticle($delete){
            $path = 'storage/images/blog/' .  $this->slug ;

        if (\File::exists($path))
        {
            \File::deleteDirectory($path);
        }
           $delete->delete('id');
    }
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * @param $image
     * @return string
     */
    public function saveImageBook($image)
    {

        if (!is_dir('storage/images/book/' . $this->slug . '/')) {
            mkdir('storage/images/book/' . $this->slug . '/', 0777, true);
        }
        $imageName = $this->slug . time() . '.' . $image->extension();
        $path = $image->storeAs('images/book/' . $this->slug, $imageName, 'public');

        return $imageName;
    }

    /**
     * @param $slug
     * @param $image
     */
    public function deleteImageBook($image)
    {
        if ($image) {
            unlink('storage/images/book/' . $this->slug . '/' . $image);
        }
    }
}