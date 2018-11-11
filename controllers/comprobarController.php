<?php

class comprobarController extends AppController
{
	public function __construct(){
		parent::__construct();
    }
    
    
	public function index(){
        $comprobar = $this->loadmodel("comprobar");
        if ($comprobar->VerificarSiExistenCuentas() && $comprobar->VerificarSiExistenCategorias() && $comprobar->VerificarSiExistenTransacciones()) {
            $this->redirect(array("controller"=>"transacciones"));
        }elseif ($comprobar->VerificarSiExistenCuentas()) {
            if ($comprobar->VerificarSiExistenCategorias()) {
                if ($comprobar->VerificarSiExistenTransacciones()) {
                    $this->redirect(array("controller"=>"transacciones"));
                }else{
                    header('Location: http://localhost/Dia8/Money/transacciones/agregar');
                }
            }else{
                header('Location: http://localhost/Dia8/Money/categorias/agregar');
            }
        }else {
            header('Location: http://localhost/Dia8/Money/cuentas/agregar');
          
        }
	}
}   