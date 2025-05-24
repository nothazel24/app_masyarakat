<?php

class App
{
    // untuk mengembalikan user ke controller default, apabila user salah mengisi controler dan methodnya
    // SINGKATNYA, INIT MEN-SET CONTROLLER, METHOD, DAN PARAMETER DEFAULT
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];


    // membuat fitur parseURL/pretty url
    // agar URL terlihat lebih rapih
    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];

            // menghapus array URL ber-index 0 jika file index.php ditemukan
            // bertujuan untuk menghindari adanya duplikasi array pada URL
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];

                // menghapus array URL ber-index 0 jika file index.php ditemukan
                // bertujuan untuk menghindari adanya duplikasi array pada URL
                unset($url[1]);
            }
        }

        // paramater
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller dan method, dan kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {

            // Mengubah url menjadi array dan membersihkan url dari karakter aneh
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        // mengembalikan nilai controller home, apabila user tidak menemukan controller yang tepat/sudah ada.
        return ["Home"];
    }
}
