<?php

/**
 * Define la clase Connexio, responsable de gestionar la conexión con la base de datos.
 *
 * Este script proporciona una forma centralizada y reutilizable de establecer
 * una conexión a la base de datos para el resto de la aplicación.
 *
 * @package    Botiga
 * @author     cristinalopezmontalvo
 * @version    1.0
 */
class Connexio {
    //Dades de la connexió a la base de dades la_meva_botiga.
    private $host = "127.0.0.1";
    private $usuario = "root";
    private $contraseña = "";
    private $baseDatos = "la_meva_botiga";
    /**
     * Crea y devuelve un objeto de conexión `mysqli`.
     *
     * Utiliza las propiedades de la clase para instanciar un nuevo objeto `mysqli`.
     * En caso de fallo en la conexión, el script terminará su ejecución
     * mostrando un mensaje de error.
     *
     * @return mysqli El objeto de conexión a la base de datos en caso de éxito.
     */
    public function obtenirConnexio() {
        $conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->baseDatos);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>
