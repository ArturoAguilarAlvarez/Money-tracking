<?php

class comprobarModel extends AppModel{
    
    public function __construct(){
        parent::__construct();
    }

    public function VerificarSiExistenCuentas(){
        $cuenta = $this->_db->prepare("SELECT * FROM accounts");
        $cuenta->execute();
        $registro = $cuenta->fetch();
        
        if($registro){
            return $registro;
        }  else{
            return false;
        }
    }
    
    public function VerificarSiExistenCategorias(){
        $cuenta = $this->_db->prepare("SELECT * FROM categories");
        $cuenta->execute();
        $registro = $cuenta->fetch();
        
        if($registro){
            return $registro;
        }  else{
            return false;
        }
    }
    public function VerificarSiExistenTransacciones(){
        $cuenta = $this->_db->prepare("SELECT * FROM transactions");
        $cuenta->execute();
        $registro = $cuenta->fetch();
        
        if($registro){
            return $registro;
        }  else{
            return false;
        }
	}
}   
