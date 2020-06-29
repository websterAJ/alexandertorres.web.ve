<?php 

/**
 * 
 */
require_once 'helper/jqgridhelper.php';

class inicio extends controller
{
    /** 
     * variable de almacenamiento del modal
    */
    private $ini ;
    /** 
     * tamaño de paginas
    */
    public $treg;
     /** 
     * numero de paginas a visualizar
    */
    public $pagina = '';

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->ini = $this->LoadModel('iniciomodel');
    }
    public function index()
	{
        $this->Layout = true;
        $this->LoadView('index');	
    }
    public function blog(){
        $this->Layout = true;
        if(isset($_GET["id"])){
            $this->Attach = $this->ini->GetDataWhere('*', 'entrada','id ='.$_GET["id"]);
        }else{
            $num_row= $this->ini->GetDataAll('nombre, descripcion, imagen, fecha', 'entrada');
            $this->Treg = count($num_row);
            $Tpag= 10;
            $this->pagina = (isset($_GET["p"]) ? $_GET["p"] : NULL);
            if(empty($this->pagina)){
                $inicio = 0;
                $this->pagina=1;
            }else {
                $inicio = ($this->pagina - 1) * $Tpag;
            }
            $this->Attach = $this->ini->GetDataWhere('id, nombre, descripcion, imagen', 'entrada','Eliminado != 1 LIMIT '.$inicio.','.$this->Treg);
        }    
        $this->LoadView('pages/blog');
    }
    public function about(){
        $this->Layout = true;
        $this->Attach['portafolio'] =$this->ini->GetDataAll('*', 'proyecto');
        $this->LoadView('pages/about');
    }
    public function contact(){
        if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])){
            
            $array['fecha'] = date('y-m-d HH:mm:ss');
            $array['tipo'] = 1;
            $array['status'] = 0;
            $array['de'] = $_POST['nombre'].' ('.$_POST['correo'].')';
            $array['para'] = 'Adminitrador';
            $array['asunto'] = 'Formulario de contactato';
            $array['contenido'] = $_POST['mensaje'];
        }else{
            $this->Layout = true;
            $this->LoadView('pages/contact');
        }
        
    }
    public function login(){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            $response = $this->ini->UserLogin(
				"persona.nombre, persona.email,usuario.nick, usuario.clave, usuario.condicion, usuario.rol, usuario.persona",
				"nick ='".$_POST['user']."' OR email ='".$_POST['user']."'"
			);
			$response=$response[0];
			if (password_verify($_POST['pass'], $response["clave"])) {
				session::start();
				session::setsession('user',$response['nick']);
				session::setsession('type',$response['rol']);
				session::setsession('id',$response['persona']);
				if (isset($response['avatar'])) {
					session::setsession('avatar',$response['avatar']);
				}
				session::setsession('autch','TRUE');
				$array['Ultimo_inicio'] =date('Y-m-d h:i:s');
				$array['user']=$response['nick'];
				$array['type_his']=1;
                $inicio = $this->ini->UserActive($array);
                echo $inicio;
                die;
				if (empty($inicio)) {
					echo 1;
				}else{
					echo $inicio;
				}
			}else{
				echo "error contraseña";
			}
        }else{
            $this->Layout = false;
            $this->LoadView('pages/login');
        }
        
    }
}