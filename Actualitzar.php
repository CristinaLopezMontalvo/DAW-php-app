<?php
/**
 * Este script se encarga de actualizar un producto.
 *
 * Coje los datos que le llegan de un formulario y los usa para cambiar
 * la información de un producto en la base de datos.
 *
 * @package    Botiga
 * @author     cristinalopezmontalvo
 * @version    1.0
 */
// Incluye el archivo de conexión
require_once('Connexio.php');

class Actualitzar {
    
     /**
     * Procesa la actualización de un producto específico.
     *
     * Este método valida que se hayan recibido todos los datos necesarios,
     * establece una conexión segura a la base de datos, sanitiza las entradas
     * para prevenir inyecciones SQL y ejecuta la consulta `UPDATE`.
     *
     * @param int|null    $id         El ID único del producto a modificar.
     * @param string|null $nom        El nuevo nombre para el producto.
     * @param string|null $descripcio La descripción actualizada del producto.
     * @param float|null  $preu       El nuevo precio del producto.
     * @param int|null    $categoria  El ID de la nueva categoría del producto.
     * @return void                   Este método no retorna ningún valor. Su ejecución finaliza con una redirección o mostrando un error.
     */
    public function actualizar($id, $nom, $descripcio, $preu, $categoria) {
        // Verifica si todos los campos requeridos están presentes
        if (!isset($id) || !isset($nom) || !isset($descripcio) || !isset($preu) || !isset($categoria)) {
            echo '<p>Se requieren todos los campos para actualizar el producto.</p>';
            return;
        }

        // Crea una instancia de la clase de conexión
        $conexionObj = new Connexio();
        // Obtiene la conexión a la base de datos
        $conexion = $conexionObj->obtenirConnexio();

        // Escapa las variables para prevenir SQL injection
        $id = $conexion->real_escape_string($id);
        $nom = $conexion->real_escape_string($nom);
        $descripcio = $conexion->real_escape_string($descripcio);
        $preu = $conexion->real_escape_string($preu);
        $categoria = $conexion->real_escape_string($categoria);

        // Construye la consulta SQL de actualización
        $consulta = "UPDATE productes
                     SET nom = '$nom', descripció = '$descripcio', preu = '$preu', categoria_id = '$categoria'
                     WHERE id = '$id'";

        // Ejecuta la consulta y redirige a la página principal si tiene éxito
        if ($conexion->query($consulta) === TRUE) {
            header('Location: Principal.php');
            exit();
        } else {
            // Muestra un mensaje de error si la consulta falla
            echo '<p>Error al actualizar el producto: ' . $conexion->error . '</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Obtiene los valores del formulario (si existen)
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$descripcio = isset($_POST['descripcio']) ? $_POST['descripcio'] : null;
$preu = isset($_POST['preu']) ? $_POST['preu'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

// Crea una instancia de la clase Actualitzar y llama al método actualizar
$actualizarProducto = new Actualitzar();
$actualizarProducto->actualizar($id, $nom, $descripcio, $preu, $categoria);

?>
