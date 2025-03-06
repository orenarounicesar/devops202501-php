
<?php

    require_once '../database/consulta.php';
    require_once "../app/respuestas/respuesta.php";
    require_once "../app/models/datos.php";

    
    class Datos extends Consulta{

        private $table = 'datos_personales';
        private $datoList = array();

        public function getDatos(){
            try {
                $respuesta = new Respuesta();
                $query = "select * from $this->table";
                $result = parent::executeQuery($query);
                foreach ($result as $key => $value) {
                    $dato = $this->setDato($value);
                    $this->datoList[] = $dato->getDatos();
                }
                return $this->datoList;
            } catch (Exception $e) {
                return $respuesta->error500(); 
            }
        }

        public function getDato($id){
            try {
                $respuesta = new Respuesta();
                $query = "select * from $this->table where id = '$id'";
                $result = parent::executeQuery($query);
                $dato = $this->setDato($result[0]);
                return $dato->getDatos();
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        public function getDatoByCode($codigo){
            try {
                $respuesta = new Respuesta();
                $query = "select * from $this->table where codigo = $codigo";
                $result = parent::executeQuery($query);
                $dato = $this->setDato($result[0]);
                return $dato->getDatos();
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        public function saveDato($data){
            try {
                $respuesta = new Respuesta();
                $dato = json_decode($data, true);
                if(!$this->validateData($dato)){
                    return $respuesta->error400();
                }
                $dato = $this->setDato($dato);
                $query = "insert into $this->table (tipo_id, id, apellido1, apellido2, nombre1, nombre2, sexo, fecha_nacimiento) 
                            values 
                            (
                                '".$dato->getTipoId()."', 
                                '".$dato->getId()."', 
                                '".$dato->getApellido1()."', 
                                '".$dato->getApellido2()."',
                                '".$dato->getNombre1()."',
                                '".$dato->getNombre2()."',
                                '".$dato->getSexo()."',
                                '".$dato->getFechaNacimiento()."'
                            )";
                $result = parent::executeNotQuery($query);
                if ($result) {
                    $response = $respuesta->response;
                    $response["result"] = array(
                        "message" => "Datos guardados"
                    );
                    return $response;
                } else {
                    return $respuesta->error500();
                }
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        public function updateDato($data){
            try {
                $respuesta = new Respuesta();
                $dato = json_decode($data, true);
                if(!isset($dato['codigo']) || !$this->validateData($dato)){
                    return $respuesta->error400();
                }
                $dato = $this->setDato($dato);
                $query = "update $this->table set
                            tipo_id = '".$dato->getTipoId()."', 
                            id = '".$dato->getId()."', 
                            apellido1 = '".$dato->getApellido1()."', 
                            apellido2 = '".$dato->getApellido2()."',
                            nombre1 = '".$dato->getNombre1()."',
                            nombre2 = '".$dato->getNombre2()."',
                            sexo = '".$dato->getSexo()."',
                            fecha_nacimiento = '".$dato->getFechaNacimiento()."'
                            where codigo = ".$dato->getCodigo()."";
                $result = parent::executeNotQuery($query);
                if ($result) {
                    $response = $respuesta->response;
                    $response["result"] = array(
                        "message" => "Dato actualizado"
                    );
                    return $response;
                } else {
                    return $respuesta->error500();
                }
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        public function deleteDato($codigo){
            try {
                $respuesta = new Respuesta();
                $query = "delete from $this->table
                            where codigo = $codigo";
                $result = parent::executeNotQuery($query);
                if ($result) {
                    $response = $respuesta->response;
                    $response["result"] = array(
                        "message" => "Dato eliminado"
                    );
                    return $response;
                } else {
                    return $respuesta->error500();
                }
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        public function deleteDatoById($id){
            try {
                $respuesta = new Respuesta();
                $query = "delete from $this->table
                            where id = '$id'";
                $result = parent::executeNotQuery($query);
                if ($result) {
                    $response = $respuesta->response;
                    $response["result"] = array(
                        "message" => "Dato eliminado"
                    );
                    return $response;
                } else {
                    return $respuesta->error500();
                }
            } catch (Exception $e) {
                return $respuesta->error500();
            }
        }

        private function setDato($data){
            try {
                if(isset($data['codigo'])){
                    $dato = new DatosModel(
                        $data['codigo'], 
                        $data['tipo_id'], 
                        $data['id'], 
                        $data['apellido1'],
                        $data['apellido2'],
                        $data['nombre1'],
                        $data['nombre2'],
                        $data['sexo'],
                        $data['fecha_nacimiento']
                    );
                }else{
                    $dato = new DatosModel(
                        '',
                        $data['tipo_id'], 
                        $data['id'], 
                        $data['apellido1'],
                        $data['apellido2'],
                        $data['nombre1'],
                        $data['nombre2'],
                        $data['sexo'],
                        $data['fecha_nacimiento']
                    );
                }
                return $dato;
            } catch (Exception $e) {
                return false; 
            }
        }

        private function validateData($data){
            if(isset($data['tipo_id']) && 
                isset($data['id']) && 
                isset($data['apellido1']) && 
                isset($data['apellido2']) &&
                isset($data['nombre1']) &&
                isset($data['nombre2']) &&
                isset($data['sexo']) &&
                isset($data['fecha_nacimiento'])){
                    return true;
            }
            return false;
        }

    }

?>