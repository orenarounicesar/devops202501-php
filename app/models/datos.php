
<?php

    class DatosModel{

        private $codigo;
        private $tipo_id;
        private $id;
        private $apellido1;
	    private $apellido2;
        private $nombre1;
        private $nombre2;
        private $sexo;
        private $fecha_nacimiento;
        private array $datos;

        public function __construct($codigo, $tipo_id, $id, $apellido1, $apellido2, $nombre1, $nombre2, $sexo, $fecha_nacimiento) {
            $this->codigo = $codigo;
            $this->tipo_id = $tipo_id;
            $this->id = $id;
            $this->apellido1 = $apellido1;
            $this->apellido2 = $apellido2;
            $this->nombre1 = $nombre1;
            $this->nombre2 = $nombre2;
            $this->sexo = $sexo;
            $this->fecha_nacimiento = $fecha_nacimiento;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function getTipoId(){
            return $this->tipo_id;
        }
        
        public function getId(){
            return $this->id;
        }

        public function getApellido1(){
            return $this->apellido1;
        }

        public function getApellido2(){
            return $this->apellido2;
        }

        public function getNombre1(){
            return $this->nombre1;
        }

        public function getNombre2(){
            return $this->nombre2;
        }


        public function getSexo(){
            return $this->sexo;
        }

        public function getFechaNacimiento(){
            return $this->fecha_nacimiento;
        }

        public function getDatos(){
            $this->datos = array(
				        'codigo' => $this->codigo,
            			'tipo_id' => $this->tipo_id,
            			'id' => $this->id,
            			'apellido1' => $this->apellido1,
            			'apellido2' => $this->apellido2,
            			'nombre1' => $this->nombre1,
            			'nombre2' => $this->nombre2,
            			'sexo' => $this->sexo,
            			'fecha_nacimiento' => $this->fecha_nacimiento
            );
            return $this->datos;
        }

    }

?>