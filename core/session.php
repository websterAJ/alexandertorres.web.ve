<?php 
class session{
   //iniciamos la sesion
    static function start()
    {
        session_start();
    }
    //Obtenemos el valor de uno de los indice de sesion
    public function getsession($name){
        return $_SESSION[$name];
    }
    //Inicialisamos un valor
    public function setsession($name, $data){
        $_SESSION[$name] = $data;
    }
    //Destruye la sesion
    static function destroy()
    {
        session_start();

        // Destruir todas las variables de sesión.
        $_SESSION = array();

        // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
        // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalmente, destruir la sesión.
        @session_destroy();
    }
}
 ?>