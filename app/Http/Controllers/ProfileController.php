<?php


namespace App\Http\Controllers;


use App\services\CurlCreator;
use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    private $request;
    /**
     * FieldController constructor.
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){


        return view('profiles.index');
    }

   /* public function header()
    {

        return view('layouts.header_new');
    }*/
    /**
     * @return bool|mixed
     */
    public function CreateToken()
    {
        $curl = new CurlCreator();
        $curl->link = '';
        $curl->method = 'POST';

        $curl->data['request'] = 'початковий елемент';
        $curl->data['request.auth'] = 'Елемент аутентифікації';
        $curl->data['request.auth.mch_id'] = 'ID мерчанта';
        $curl->data['request.auth.salt'] = 'Сіль підпису';
        $curl->data['request.auth.sign'] = 'Підпис запиту';
        $curl->data['request.action'] = 'Назва запиту';
        $curl->data['request.body'] = 'Тіло запиту, може бути пустим так-як містить опціональні поля';
        $curl->data['request.lang'] = 'Мова яку буде відображено на WEB сторінках';
        //Опціональні поля
        $curl->data['request.body.cdata'] = 'Закодовані картданні';
        $curl->data['request.body.url_good'] = 'Посилання до сторінки успіху мерчанта';
        $curl->data['request.body.url_bad'] = 'Посилання до сторінки неуспіху мерчанта';
        $curl->data['request.body.info'] = 'Інформація до платежу, надається мерчантом. Повертається мерчанту в нотифікації';

        $curl->sendCurl();
        return $curl->sendCurl();
    }

    /**
     * @return bool|mixed
     */
    public function ResponseToken()
    {
        $response = new CurlCreator();
        $response->link = 'https:\/\/tokly.ipay.ua\/08196505afe03bab0ff4907b7e0fc8005c6391c8';
        $response->method = 'POST';

        $response->data['request'] = 'початковий елемент';
        $response->data['response.pmt_id'] = 'ID платежу в системі iPay';
        $response->data['response.url'] = 'URL по якому треба перейти для здійснення "валідації"';
        $response->data['response.salt'] = 'Сіль підпису';
        $response->data['response.sign'] = 'Підпис запиту';

        $response->sendCurl();
        return $response->sendCurl();
    }

}