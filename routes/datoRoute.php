<?php 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json");

    require_once "../app/services/datos.php";
    require_once "../app/respuestas/respuesta.php";

    $dato = new Datos;
    $respuesta = new Respuesta;

    $headers = getallheaders();

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET["codigo"])){
            $cod_dato = $_GET["codigo"];
            $data = $dato->getDatoByCode($cod_dato);
            http_response_code(200);      
            echo json_encode($data);
        }else if(isset($_GET["id"])){
            $id_dato = $_GET["id"];
            $data = $dato->getDato($id_dato);
            http_response_code(200);      
            echo json_encode($data);
        }else{
            $datoLista = $dato->getDatos();
            http_response_code(200);      
            echo json_encode($datoLista);
        }  
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                
        $body = file_get_contents("php://input");
        $result = $dato->saveDato($body);
        if(isset($result["result"]["error_id"])){
            $error_code = $result["result"]["error_id"];
            http_response_code($error_code);
        }else{
            http_response_code(200);
        }
        echo json_encode($result); 

    }else if($_SERVER["REQUEST_METHOD"] == "DELETE"){

        $result = '';
        if(isset($_GET["codigo"])){
            $cod_dato = $_GET["codigo"];
            $result = $dato->deleteDato($cod_dato);
        }else if(isset($_GET["id"])){
            $id_dato = $_GET["id"];
            $result = $dato->deleteDatoById($id_dato);
        }
        
        if(isset($result["result"]["error_id"])){
            $error_code = $result["result"]["error_id"];
            http_response_code($error_code);
        }else{
            http_response_code(200);
        }
        echo json_encode($result);
        
    }else if($_SERVER["REQUEST_METHOD"] == "PUT"){
        
        $body = file_get_contents("php://input");
        $result = $dato->updateDato($body);
        if(isset($result["result"]["error_id"])){
            $error_code = $result["result"]["error_id"];
            http_response_code($error_code);
        }else{
            http_response_code(200);
        }
        echo json_encode($result);
        
    }else{

        $response_invalid = $respuesta->error405();
        echo json_encode($response_invalid);

    }
    

?>