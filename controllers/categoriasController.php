<?php

class categoriasController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$categorias = $this->loadmodel("categoria");
		$this->_view->categorias = $categorias->getCategorias();

		$this->_view->titulo = "Listado de categorias";
		$this->_view->renderizar("index");
	}
    
    public function agregar(){

		if ($_POST) {
			$categorias = $this->loadmodel("categoria");
			$this->_view->categorias = $categorias->guardar($_POST);
            $this->redirect(array("controller"=>"comprobar"));
		}

		$this->_view->titulo = "Agregar categoria";
		$this->_view->renderizar("agregar");
	}
    
    public function editar($id=null){
        if($_POST){
            $categorias = $this->loadmodel("categoria");
            
            if ($categorias->actualizar($_POST)) {
                $this->_view->flashMessage = "Datos guardados correctamente...";
                $this->redirect(array("controller"=>"categorias"));
            }else{
                $this->_view->flashMessage = "Error al guardar los datos...";

                $this->redirect(array("controller"=>"categorias", "action"=>"/editar/".$id));
            }     
        }
        $categorias = $this->loadmodel("categoria");
        $this->_view->categoria = $categorias->buscarPorId($id);
        
        $this->_view->titulo = "Editar categoria";
		$this->_view->renderizar("editar");
        
    }
    
     public function eliminar($id){
    	$categoria = $this->loadmodel("categoria");
    	$registro = $categoria->buscarPorId($id);

    	if (!empty($registro)) {
    		$categoria->eliminarPorId($id);
    		$this->redirect(array("controller"=>"categorias"));
    	}
	}
	






	public function VerificarSiExisten(){
        $cuenta = $this->_db->prepare("SELECT * FROM categories");
        $cuenta->execute();
        $registro = $cuenta->fetch();
        
        if($registro){
            return $registro;
        }  else{
            return false;
        }
	}

}

