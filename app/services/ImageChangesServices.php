<?php


namespace App\services;


use Illuminate\Http\Request;
use App\repositories\ImageChangesRepository;

class ImageChangesServices
{
    /* @var Request */
    private $request;

    /* @var $changesRepository */
    private $ImageChangesRepository;

    /* @var $update */
    private $update;

    /* @var $delete */
    private $delete;

    /**
     * ImageChangesServices constructor.
     * @param Request $request
     * @param ImageChangesRepository $changesRepository
     */
    public function __construct(Request $request, ImageChangesRepository $ImageChangesRepository)
    {
        $this->request = $request;
        $this->ImageChangesRepository = $ImageChangesRepository;
        $this->delete = new ImageUploaderServices();
        $this->update = new ImageUploaderServices();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getArticleByID($id)
    {
        return $this->ImageChangesRepository->findById($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSlugByID($id)
    {
        return $this->ImageChangesRepository->getSlugByID($id);
    }

    /**
     * @param $id
     */
    public function updateImage($id)
    {
        if($this->ImageChangesRepository->findById($id)) {
            $this->update->updateImage($this->request->file('image'), $this->ImageChangesRepository->findById($id));
            $this->request->session()->flash('status', 'Image successful!');
        }
    }

    /**
     * @param $id
     */
    public function deleteImage($id)
    {
        $value = $this->getArticleByID($id);

        if($value)
        {
            $this->delete->setSlug($value->slug)->deleteImageArticle($value);
        }
    }
}