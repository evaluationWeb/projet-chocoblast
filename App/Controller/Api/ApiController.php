<?php

namespace App\Controller\Api;

use App\Controller\AbstractController;
use App\Service\SecurityService;

class ApiController extends AbstractController
{
    private readonly SecurityService $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    /**
     * Méthode exemple API qui retourne une Json reponse avec body + code status
     */
    public function index()
    {
        //Tableau de data
        $data = ["data" => "test", "author" => "Mathieu"];
        
        //Entête HTTP
        header("Content-Type: text/json; charset=utf-8");
        header("Access-Control-Allow-Origin: localhost");

        //Réponse Json + status code
        return $this->jsonResponse($data);
    }


    public function post() 
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $response = $this->securityService->addUser($data);


        return $this->jsonResponse(["response"=>$response],201);
    }


    public function put() 
    {
        $json = file_get_contents('php://input');

        var_dump($json);
        //Test json vide
        if ($json !='') {
            return $this->jsonResponse(["error"=>"Le json est invalide"], 400);
        }
        $data = json_decode($json, true);

        $this->jsonResponse(["Retour"=>$data["email"]??"autre"]);
    }
}
