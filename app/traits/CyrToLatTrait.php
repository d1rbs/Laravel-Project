<?php


namespace App\traits;

use App\Article;
use App\Books;

trait CyrToLatTrait
{

    private $new_char = '';

    private $cyr = array(
        'ж', 'ч', 'щ', 'ш', 'ю', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
        'Ж', 'Ч', 'Щ', 'Ш', 'Ю', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я', ' ');
    private $lat = array(
        'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
        'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q', '-');
    private $special = array(
        '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '[', ']', '\\', '\'', ';', ',', '.', '/', '{', '}', '|', '"', ':', '<', '>', '?', '~', '!', '@', '£',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    /**
     * @param string $slug
     * @return bool|false|mixed|string|string[]|null
     */
    public function trasliterate(string $slug): string
    {
        $strlen = mb_strlen($slug);

        $len = mb_strlen($slug, 'UTF-8');
        $result = [];
        for ($i = 0; $i < $len; $i++) {
            $result[] = mb_substr($slug, $i, 1, 'UTF-8');
        }

        $slug = mb_strtolower($this->loop($result));

        if ($this->slugValidate($slug)) {
            return $slug;
        } else {
            return $slug . mt_rand(0, 999);
        }
    }

    /**
     * @param array $result
     * @return string
     */
    private function loop(array $result): string
    {

        foreach ($result as $char) {

            $key = array_search($char, $this->cyr);

            $s = array_search($char, $this->special);

            if ($key) {
                $this->new_char .= $this->lat[$key];
            } elseif ($s) {

            } else {
                $this->new_char .= $char;
            }
        }
        return $this->new_char;
    }

    /**
     * @param string $slug
     * @return bool
     */
    private function slugValidate(string $slug): bool
    {
        if ($artical = Article::where('slug', '=', $slug)->exists()) {
            return false;
        }
        return true;
    }

    /**
     * @param string $slug
     * @return bool
     */
    private function slugValidateBooks(string $slug): bool
    {
        if($books = Books::where('slug', '=', $slug)->exists()){
            return false;
        }
        return true;
    }

}