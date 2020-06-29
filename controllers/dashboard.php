<?php 


require_once 'helper/jqgridhelper.php';
/**
 * Controlador del panel de administracion del sitio web contiene todas las funciones del panel
 * para lograr su buen funcionanmiento
 */
class dashboard extends controller
{
    private $Dm;

    public $menu;

    public $titulo;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT(); 
        session::start();
        $this->Dm = $this->LoadModel('dashboardmodel');
        $this->Area = 'section';
        if(isset($_SESSION['type']) && $_SESSION['type']<>1):
            $this->Attach['menu'] = $this->Dm->getDataWhere('ruta.icon, ruta.modulo, ruta.url', 'ruta, permisos, usuario', '(permisos.ruta=ruta.ruta) AND (permisos.persona=usuario.persona)');
        else:
            $this->Attach['menu'] = $this->Dm->getData('ruta.icon, ruta.modulo, ruta.url', 'ruta');
        endif;
        if(isset($_SESSION['id'])){
            $this->Attach['mensajes'] = $this->Dm->getDataWhere('*', 'mensajes', "para ='".$_SESSION['id']."'");
        }
    }
    public function index()
    {
        $this->Layout = true;
        $this->LoadView('dashboard/index');
    }
    /**
     * Metodo mensajes
     * Encargado de cargar la vista de mensajes encargada de modificar parametos especificos realacionados
     * con su nombre
     */
    public function mensajes()
    {
        $this->Attach['modulo']='mensajes';
        $this->Attach['data']=$this->Dm->getData('*','mensajes');
        $this->LoadView('pagina');
    }
    /**
     * Metodo clases
     * Encargado de cargar la vista de clases encargada de modificar parametos especificos realacionados
     * con su nombre
     */
    public function clases()
    {
        if (isset($_POST['from'])) 
        {
        
            // Si se ha enviado verificamos que no vengan vacios
            if ($_POST['from']!="" AND $_POST['to']!="") 
            {
        
                // Recibimos el fecha de inicio y la fecha final desde el form
                $Datein = date('d/m/Y H:i:s', strtotime($_POST['from']));
                $Datefi = date('d/m/Y H:i:s', strtotime($_POST['to']));
                $array['start']= $this->_formatear($Datein);
                // y la formateamos con la funcion _formatear
                $array['end']= $this->_formatear($Datefi);
        
                // Recibimos el fecha de inicio y la fecha final desde el form
                $orderDate = date('d/m/Y H:i:s', strtotime($_POST['from']));
                $array['inicio_normal'] = $orderDate;
        
                // y la formateamos con la funcion _formatear
                $orderDate2 = date('d/m/Y H:i:s', strtotime($_POST['to']));
                $array['final_normal'] = $orderDate2;
        
                // Recibimos los demas datos desde el form
                $array['title']= $this->evaluar($_POST['title']);
        
                // y con la funcion evaluar
                $array['body']= $this->evaluar($_POST['event']);
        
                // reemplazamos los caracteres no permitidos
                $array['class']= $this->evaluar($_POST['class']);
            
                // Ejecutamos nuestra sentencia sql
                $this->Dm->insertData($array,'actividades') or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');
        
                $this->LoadView('dashboard/actividades');        
        
        
                // Obtenemos el ultimo id insetado
                $im=$this->Dm->getData('MAX(id) AS id','actividades'); 

                $id = trim($im[0]['id']);
        
                // para generar el link del evento
                $arrayUpdate['url'] = $this->BaseUrl("index.php/dashboard/descripcion_evento/?id=$id");
        
                // Ejecutamos nuestra sentencia sql
                $this->Dm->UpdateData($arrayUpdate,'actividades',"id = $id");
            }
        }
        $this->Attach['modulo']='actividades';
        $this->Attach['data']=$this->Dm->getData('*','actividades');
        $this->LoadView('dashboard/actividades');   
        
    }
    /**
    * Metodo Categorias
    * Encargado de cargar la vista de Portafolio encargada de modificar parametos especificos realacionados
    * con su nombre
    */
    public function categoria()
    {
        $this->Attach['modulo']='categoria';
        $this->Attach['data']=$this->Dm->getData('*','categoria');
        $this->LoadView('pagina');
    }
    /**
    * Metodo Portafolio
    * Encargado de cargar la vista de Portafolio encargada de modificar parametos especificos realacionados
    * con su nombre
    */
    public function Portafolio()
    {
        $this->Attach['modulo']='Proyecto';
        $this->Attach['data']=$this->Dm->getData('*','proyecto');
        $this->LoadView('pagina');
    }
    /**
    * Metodo entradas
    * Encargado de cargar la vista de entradas encargada de modificar parametos especificos realacionados
    * con su nombre
    */
    public function Blog()
    {
        $this->Attach['modulo']='Articulo';
        $this->Attach['data']=$this->Dm->getDataWhere('id, Nombre, Descripcion, Fecha, Lectura','entrada',"Eliminado <> 1");
        $this->LoadView('pagina');
    }
    /**
     * Metodo permisos
     * Encargado de cargar la vista de permisos encargada de modificar parametos especificos realacionados
     * con su nombre
     */
    public function permisos()
    {

        $this->Attach['modulo']='permisos';
        $this->Attach['data']=$this->Dm->getDataWhere('permisos.permiso as id, persona.nombre, ruta.modulo','permisos, persona, ruta', "permisos.persona=persona.id AND permisos.ruta=ruta.ruta");
        $this->LoadView('pagina');
    }
    /**
     * Metodo usuarios
     * Encargado de cargar la vista de usuarios encargada de modificar parametos especificos realacionados
     * con su nombre
     */
    public function usuarios()
    {
        $this->Attach['data']=$this->Dm->getDataWhere('persona as id, nick, persona.nombre, persona.email, rol.nombre, condicion','usuario, persona, rol',"usuario.persona=persona.id AND usuario.rol=rol.rol");
        $this->LoadView('dashboard/user');
    }
    /**
     * Metodo config
     * Encargado de cargar la vista de actividades encargada de modificar parametos especificos realacionados
     * con su nombre
     */
    public function config()
    {
        $this->LoadView('config');
    }
    /**
     * Metodo signOut
     * Encargado de cargar la vista de inicio y borrar los datos de la session
     * dentro del sistema
     */
    public function signOut(){
        session::destroy();
        $this->Layout = false;
        header("location:".$this->BaseUrl(''));
    }
    public function upload(){
        // If 0, will OVERWRITE the existing file 
        define('RENAME_F', 1); 
        
        /** 
         * Establecer nombre de archivo
         * Si el archivo existe y RENAME_F es 1, establezca "img_name_1" 
         * 
         * $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename 
         */ 
        function setFName($p, $fn, $ex, $i){ 
            if(RENAME_F == 1 && file_exists($p .$fn .$ex)){ 
                return setFName($p, $fn .'_'. ($i +1), $ex, ($i +1)); 
            }else{ 
                return $fn .$ex; 
            } 
        } 
        // array con las direcciones donde se van a cargar las imagenes
        $upload_dir = array( 
            'img'=> 'uploads/img/'
        );
        // parametros permitidos
        $imgset = array( 
            'maxsize' => 2000, 
            'maxwidth' => 2000, 
            'maxheight' => 2000, 
            'minwidth' => 10, 
            'minheight' => 10, 
            'type' => array('image/bmp', 'image/gif', 'image/jpg', 'image/jpeg', 'image/png') 
        );
        $re = '';
        if(isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
            $sepext = explode('.', strtolower($_FILES['upload']['name'])); 
            $extension = end($sepext); 
            $F_Name =preg_replace(
                array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), 
                array('', '-', ''),
                basename($_FILES['upload']['name'],'.'.$extension)
            );

            // Obtenemos el tipo de imagen
            $type = $_FILES['upload']['type'];
            // cargamos el directorio segun el tipo de archivo 
            $upload_dir = in_array($type, $imgset['type']) ? $upload_dir['img'] : $upload_dir['audio']; 
            $upload_dir = trim($upload_dir, '/') .'/';  
        }
        // validamos el tipo de archivo
        if(in_array($type, $imgset['type'])){  
            // Obtenemos el ancho y el alto de la imagen
            list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);
            if(isset($width) && isset($height)) { 
                if($width > $imgset['maxwidth'] || $height > $imgset['maxheight']){ 
                    $re .= '\n Width x Height = '. $width .' x '. $height .' \n El ancho y el alto maximo es : '. $imgset['maxwidth']. ' x '. $imgset['maxheight']; 
                } 
     
                if($width < $imgset['minwidth'] || $height < $imgset['minheight']){ 
                    $re .= '\n Width x Height = '. $width .' x '. $height .'\n  El ancho y el alto minimo es : '. $imgset['minwidth']. ' x '. $imgset['minheight']; 
                } 
     
                if($_FILES['upload']['size'] > $imgset['maxsize']*1000){ 
                    $re .= '\n Tamaño maximo de archivo permitido es : '. $imgset['maxsize']. ' KB.'; 
                } 
            } 
        }else{ 
            $re .= 'El archivo: '. $_FILES['upload']['name']. ' Posee una extesion no permitida.'; 
        } 
        
        $f_name = setFName($_SERVER['DOCUMENT_ROOT'] .'/'. $upload_dir, $F_Name, ".$extension", 0); 
        $uploadpath = $upload_dir . $f_name; 


        // Si no hay error , subimos la imagen de lo contrario mostramos el error
        if($re == ''){ 
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) { 
            $CKEditorFuncNum = $_GET['CKEditorFuncNum']; 
            $url = _BASE_URL_.$upload_dir . $f_name; 
            $msg = $F_Name.'.'. $extension .' successfully uploaded: \n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB'; 
            $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(" ", '.unfiltered_html.'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>'; 
        }else{ 
            $re = '<script>alert("Error Al cargar el archivo")</script>'; 
        } 
        }else{ 
            $re = '<script>alert("'. $re .'")</script>'; 
        }
        // cargamos el html de salidad 
        @header('Content-type: text/html; charset=utf-8'); 
        echo $re; 
        
    }
    public function redim($ruta1,$ruta2,$ancho,$alto,$nombre){
        
        # se obtene la dimension y tipo de imagen
        $datos=getimagesize($ruta1);
        
        $ancho_orig = $datos[0]; # Anchura de la imagen original
        $alto_orig = $datos[1];    # Altura de la imagen original
        $tipo = $datos[2];

        switch ($tipo) {
            case 1:
                if (function_exists("imagecreatefromgif"))
                    $img = imagecreatefromgif($ruta1);
                else
                    return false;
                break;
            case 2:
                if (function_exists("imagecreatefromjpeg"))
                    $img = imagecreatefromjpeg($ruta1);
                else
                    return false;
                break;
            case 3:
                if (function_exists("imagecreatefrompng"))
                    $img = imagecreatefrompng($ruta1);
                else
                    return false;
                break;
            default:
                return false;
                break;
        }
        
        # Se calculan las nuevas dimensiones de la imagen
        if ($ancho_orig>$alto_orig){
            $ancho_dest=$ancho;
            $alto_dest=($ancho_dest/$ancho_orig)*$alto_orig;
        }else{
            $alto_dest=$alto;
            $ancho_dest=($alto_dest/$alto_orig)*$ancho_orig;
        }

        // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+
        $img2=@imagecreatetruecolor($ancho_dest,$alto_dest) or $img2=imagecreate($ancho_dest,$alto_dest);

        // Redimensionar
        // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+
        @imagecopyresampled($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig) or imagecopyresized($img2,$img,0,0,0,0,$ancho_dest,$alto_dest,$ancho_orig,$alto_orig);

        // Crear fichero nuevo, según extensión.
        switch ($tipo) {
            case 1:
                if (function_exists("imagecreatefromgif")){
                    imagegif($img2, $ruta2.'.gif');
                    return $nombre.'.gif';
                }else{
                    return false;
                }
                break;
            case 2:
                if (function_exists("imagecreatefromjpeg")){
                    imagejpeg($img2, $ruta2.'.jpg');
                    return $nombre.'.jpg';
                }
                else{
                    return false;
                }
                break;
            case 3:
                if (function_exists("imagecreatefrompng")){
                    imagepng($img2, $ruta2.'.png');
                    return $nombre.'.png';
                }
                else{
                    return false;
                }
                break;
            default:
                return false;
                break;
        }
    }
    //Funciones optimizar imagenes
    public function opti_img($image){

        if(isset($image)){
            //Ruta de la carpeta donde se guardarán las imagenes
            $patch=_BASE_URL_.'uploads/blog/';
            //Parámetros optimización, resolución máxima permitida
            $max_ancho = 1280;
            $max_alto = 900;
            
            if($image['images']['type']=='image/png' || $image['images']['type']=='image/jpeg' || $image['images']['type']=='image/gif'){
            
                $medidasimagen= getimagesize($image['images']['tmp_name']);
            
                //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
                if($medidasimagen[0] < 1280 && $_FILES['images']['size'] < 100000){
                    $nombrearchivo=$_FILES['images']['name'];
                    move_uploaded_file($_FILES['images']['tmp_name'], $patch.'/'.$nombrearchivo);
                }
                //Si no, se generan nuevas imagenes optimizadas
                else {
            
                    $nombrearchivo=$image['images']['name'];
                
                    //Redimensionar
                    $rtOriginal=$image['images']['tmp_name'];
                
                    if($image['images']['type']=='image/jpeg'){
                        $original = imagecreatefromjpeg($rtOriginal);
                    }else if($image['images']['type']=='image/png'){
                        $original = imagecreatefrompng($rtOriginal);
                    }else if($image['images']['type']=='image/gif'){
                        $original = imagecreatefromgif($rtOriginal);
                    }
                
                    list($ancho,$alto)=getimagesize($rtOriginal);
                
                    $x_ratio = $max_ancho / $ancho;
                    $y_ratio = $max_alto / $alto;
                
                    
                    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
                        $ancho_final = $ancho;
                        $alto_final = $alto;
                    }elseif (($x_ratio * $alto) < $max_alto){
                        $alto_final = ceil($x_ratio * $alto);
                        $ancho_final = $max_ancho;
                    }else{
                        $ancho_final = ceil($y_ratio * $ancho);
                        $alto_final = $max_alto;
                    }
                
                    $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 
                    
                    imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
                    $cal=8;
                    $ruta = "";
                    if($image['images']['type']=='image/jpeg'){
                        $ruta = $patch.$nombrearchivo.'jpeg';
                        imagejpeg($lienzo,$patch.$nombrearchivo);
                    }else if($image['images']['type']=='image/png'){
                        $ruta = $patch.$nombrearchivo.'png';
                        imagepng($lienzo,$patch.$nombrearchivo);
                    }else if($image['images']['type']=='image/gif'){
                        $ruta = $patch.$nombrearchivo.'gif';
                        imagegif($lienzo,$patch.$nombrearchivo);
                    }
                }
                return $ruta;
            }else{
                return NULL;
            }     
        }
    }
    public function insert(){
        foreach ($_POST as $key => $value) {
            if($_POST['sub_modulo'] == 'Proyecto' && $key == 'contenido'){
                $array["`".'descripcion'."`"] = $value;
            }elseif( $key <> 'sub_modulo'){
                $array["`".strtolower($key)."`"] = $value;
            }
        }
        if($_POST['sub_modulo'] == 'Articulo'){
            if(!empty($_FILES)){
                $array["`imagen`"] =$this->opti_img($_FILES);
            }
        }
        $agg=$this->Dm->insertData($array, strtolower($_POST['sub_modulo']));
        if($agg==''){
            echo 'Datos registrados con exitos';
        }else{
            echo  $agg;
        }
    }
    public function new()
    {
        $this->Layout = true;
        $this->Attach['sub_modulo']=$_GET['sub_modulo'];
        if (isset($_GET['sub_modulo'])) {
            if ($_GET['sub_modulo']=='permisos') {
                $this->Attach['data']['ruta']=$this->Dm->getData('id_ruta, modulo','ruta');
                $this->Attach['data']['usuarios']= $this->Dm->getDataWhere('id_user, name_user', 'usuarios', "type_user <> '1'");
            }
            $this->Attach['data']['categoria']= $this->Dm->getData('*', 'categoria');
            $this->LoadView('new');     
        }else{
            $this->LoadView('index');
        }
    }
    public function register_permisos()
    {
        if (isset($_POST)) {
            $del= $this->Am->deleteData('permisos',"id_user='".$_POST['user']."'");
            if($del==''){

                for ($i=0; $i < count($_POST['permisos']); $i++) { 
                    foreach ($_POST['permisos'][$i] as $key => $value) {
                        $data = array('id_ruta'=>$value,'id_user'=>$_POST["user"]);
                    }
                    $agg=$this->Am->insertData($data,'permisos');
                    
                }
                if($agg==''){
                    echo 'Datos registrados con exitos';
                }
            }
        }

    }
    public function editar()
    {
        if (isset($_POST)) {
            $table= $_POST['sub_modulo'];
            if ($table=='actividades') {
                $this->Attach['data']=$this->Am->getDataWhere('*', $table, "$table.id_actividad ='".$_POST['id']."'");
            }else{
                $this->Attach['data']=$this->Am->getDataWhere('*', $table, "$table.id_$table ='".$_POST['id']."'");
            }
            
            if (!empty($this->Attach['data']) && $this->Attach['data']<>2) {
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    public function page_editar()
    {
        $this->Layout = true;
        $this->Attach['sub_modulo']=$_GET['sub_modulo'];
        $table= $_GET['modulo'];
        if ($table=='actividades') {
            $this->Attach['data']=$this->Am->getDataWhere('*', $table, "$table.id_actividad ='".$_GET['id']."'");
        }else{
            $this->Attach['data']=$this->Am->getDataWhere('*', $table, "$table.id_$table ='".$_GET['id']."'");
        }
        $this->LoadView('edit');
    }
    public function eliminar()
    {
        if (isset($_POST)) {
            $table= $_POST['sub_modulo'];
            $del= $this->Am->deleteData($table,"id_".$table."='".$_POST["id"]."'");
            if($del==''){
                echo 'Dato eliminado con exito';
            }
        }
    }
    public function edit_prof(){
        $this->Attach['edit_prof'] = $this->Dm->getDataWhere('usuario.*, persona.email', 'usuario, persona', "usuario.persona = persona.id AND persona ='".$_SESSION['id']."'");
        $this->LoadView('edit_prof');
    }
    public function evaluar($valor) 
    {
        $nopermitido = array("'",'\\','<','>',"\"");
        $valor = str_replace($nopermitido, "", $valor);
        return $valor;
    }

    // Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
    public function _formatear($fecha)
    {
        return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
    }
    public function obtener_eventos()
    {
        $data = $this->Dm->getData('*','actividades');
        if(!empty($data)){
            echo json_encode(
                array(
                    "success" => 1,
                    "result" => $data
                )
            );
        }else{
            echo "No hay datos"; 
        }
    }
    public function descripcion_evento(){
        // Obtenemos el id del evento
        if (isset($_POST['eliminar_evento'])){
            $id  = $this->evaluar($_GET['id']);
            $sql = $this->Dm->deleteData('actividades',"id = $id");;
            if ($sql) {
                echo "Evento eliminado";
            }
            else{
                echo "El evento no se pudo eliminar";
            }
        }else{
            $id  = $this->evaluar($_GET['id']);
            // y lo buscamos en la base de dato
            $this->Attach['data'] = $this->Dm->getDataWhere('*','actividades',"id=$id");
    
            $this->Attach['sub_modulo']='descripcion_actividad';
            $this->LoadView('pagina');
        }
        

    }
}