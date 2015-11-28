<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index_Bay extends Controller_Index{
    public function before(){
        parent::before();
        //получить виджет
        $menu = Request::factory('widgets/menu')->execute();
        $top = Request::factory('widgets/topproducts')->execute();
       
        //вывести в шаблон
        $this->template->block_left = array($menu);
        $this->template->block_right = array($top);
    }
    public function action_index(){
        //получить данные из модуля и обработать
        $products_s = $this->session->get('products');
        
        if($products_s != NULL){
            $products = ORM::factory('product');
            foreach($products_s as $id => $count){
                $products->or_where('id', '=', $id);
            }
            $products = $products->find_all();
        }
        else{
            $products = NULL;
        }

        $content = View::factory('index/v_bay', array(
            'products' => $products,
            'products_s' => $products_s,
            'sum' => 0,
            ));
        $sirch = Request::factory('widgets/sirch')->execute();
        //вывести в шаблон
        $this->template->page_title = Kohana::$config->load('myconf.bay');
        $this->template->block_center = array($sirch, $content);
    }
    public function action_add(){
        $products_s = $this->session->get('products');
        $id = $this->request->param('id');

        if (isset($products_s[$id])){
            $products_s[$id]++;
        }else{
            $products_s[$id] = 1;
        }
        $this->session->set('products', $products_s);
        header('Location: /bay');
        exit;
    }
    public function action_del(){
        $id = $this->request->param('id');
        $products_s = $this->session->get('products');
        if(isset($products_s[$id])){
            unset($products_s[$id]);
        }
        $this->session->set('products', $products_s);
        header('Location: /bay');
        exit;
    }
    public function action_order(){
        if(!$this->auth->logged_in('login')){
            header('Location: /auto/login');
            exit;
        }
        
        // регистрационная информация (логин, пароль #1)
        // registration info (login, password #1)
        $mrh_login = "demo";
        $mrh_pass1 = "password_1";

        // номер заказа
        // number of order
        $inv_id = 0;

        // описание заказа
        // order description
        $inv_desc = "Оплата заказа в Тестовом магазине ROBOKASSA";

        // сумма заказа
        // sum of order
        $out_summ = "11.00";

        // тип товара
        // code of goods
        $shp_item = 1;

        // язык
        // language
        $culture = "ru";

        // кодировка
        // encoding
        $encoding = "utf-8";

        // формирование подписи
        // generate signature
        $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:shp_Item=$shp_item");

        // HTML-страница с кассой
        // ROBOKASSA HTML-page
        $print = "<html><script language=JavaScript ".
              "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
              "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
              "&Description=$inv_desc&SignatureValue=$crc&shp_Item=$shp_item".
              "&Culture=$culture&Encoding=$encoding'></script></html>";
        
        $print2 = 
              "https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
              "MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
              "&Description=$inv_desc&SignatureValue=$crc&shp_Item=$shp_item".
              "&Culture=$culture&Encoding=$encoding";
        
        
        
        $cont = View::factory('/index/bay/v_bay_order', array('print' => $print, 'print2' => $print2));
        $this->template->block_center = array($cont);
        
    }
}
