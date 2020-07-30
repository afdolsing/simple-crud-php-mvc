<?php

class App{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // url berisi apapun yg kita ketikkan di url
        $url = $this->parseURL();
        // controller
        // cek file di controllers apakah ada yang sesuai dengan di url
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            // timpa protected controler yang ada jadi controller di url
            $this->controller = $url[0];
            // hilangkan controller dari element array, agar bisa ambil parameternya
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method, berada pada url index ke 1
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                // kalau ada, timpa method default index
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // parameter
        if(!empty($url)){
            // ambil data dari url
            $this->params = array_values($url);
        }

        /*
            Jalankan controller dan method, serta kirimkan params jika ada.
            pakai fungsi call_user_func_array
        */
        call_user_func_array([$this->controller, $this->method], $this->params );
        


    }

    public function parseURL()
    {
        if(isset($_GET['url']))
        {
            // hapus tanda slash '/' diakhir
            $url = rtrim($_GET['url'], '/');
            // bersihkan url dari karakter2 ngaco atau aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // pecah url jadikan array
            $url = explode('/', $url);
            return $url;
        }
    }
}