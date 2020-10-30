<?php


namespace App\traits;


trait ImageUploader
{
    /**
     * @param $image
     * @param $slug
     * @return string
     */
    public function saveImage($image, $slug)
    {

        if (!is_dir('storage/images/articles/' . $slug . '/')) {
            mkdir('storage/images/articles/' . $slug . '/', 0777, true);
        }
        $imageName = $slug . time() . '.' . $image->extension();
        $path = $image->storeAs('images/articles/' . $slug, $imageName, 'public');

        return $imageName;
    }

    /**
     * @param $slug
     */
    public function deleteImage($slug, $image)
    {
        if ($image) {
            unlink('storage/images/articles/' . $slug . '/' . $image);
        }
    }
}