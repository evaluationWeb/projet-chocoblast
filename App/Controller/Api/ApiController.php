<?php

namespace App\Controller\Api;

use App\Controller\AbstractController;

class ApiController extends AbstractController
{
    public function index()
    {
        //Tableau de data
        $data = ["Data" => "test", "author" => "Mathieu"];
        
        //Entête HTTP
        header("Content-Type: text/json; charset=utf-8");
        header("Access-Control-Allow-Origin: localhost");
        
        //Réponse Json + status code
        $this->jsonResponse($data);
    }
}
