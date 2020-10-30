<?php

namespace App\Http\Middleware;

use App\services\ArticleService;
use App\services\CategoryService;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRedirect
{
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var
     */
    private $categoryService;

    const path = 'App\Http\Controllers\ArticleController@view';

    /**
     * ArticleRedirect constructor.
     * @param ArticleService $articleService
     * @param CategoryService $categoryService
     */
    public function __construct(ArticleService $articleService, CategoryService $categoryService)
    {
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     *
     */
    public function handle($request, Closure $next)
    {
        $slug = $request->route('slug');

       // $action = $request->route()->getAction();

       // $test = $request->route()->
        //dd($action['uses']);
       // dd($this->articleService->getArticleBySlug($slug)->slug );die;
        if(!$slug){
            return $next($request);
        }

        if($this->articleService->getArticleBySlug($slug))
        {
            /*$host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'view.blade.php';
            header("Location: http://$host$uri/".$slug);*/

          //  return action('ArticleController@view', [$slug]);
            //exit;
           // header("Location: http://127.0.0.1:8000/article/".$slug);

            /*$action['controller'] = self::path;
            $action['uses'] = "App\Http\Controllers\ArticleController@view";
            $action['as'] = "view";*/
           // return redirect('article/'.$slug);
            //dd($action);
           // return redirect()->route('showArticle', $slug);

          //  return redirect()->action('ArticleController@view', [$slug]);
        }

        return $next($request);

     /*   if($this->articleService->search($this->categoryService->getCategoryBySlug($slug)))
        {
            return redirect ('article/'.$slug)->route('blog');
            //return redirect()->action('ArticleController@index');

        }*/



         // throw new HttpResponseException(404);

        //$categories = $this->categoryService->getCategoryBySlug($slug);
       // dd($categories);die;
      //  $action = $request->route()->getAction();



        /*if ($slug == null) {
            //return redirect('/article');
        } else {
            $categories = $this->categoryService->getCategoryBySlug($slug);
            $article = $this->articleService->getSlug($slug);

            if ($slug == $categories->slug) {
                return redirect('article/index');
            } elseif ($slug == $article->slug) {
                return redirect('article/view');
            } else {
                echo 'error 404';
            }
        }*/


    }
}
