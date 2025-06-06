<?php
/**
 * Define la clase Footer, responsable de renderizar el pie de página.
 *
 * Este script genera el código HTML final de la página, incluyendo el footer,
 * los scripts de JavaScript necesarios y las etiquetas de cierre del documento.
 *
 * @package    Botiga
 * @author     cristinalopezmontalvo
 * @version    1.0
 */
class Footer {

    /**
    * Imprime el código HTML completo del pie de página y los scripts finales.
    *
    * Este método genera el div del footer, el enlace al CDN de Bootstrap JS
    * y un script para inicializar componentes de JavaScript como el carrusel.
    * Finalmente, cierra las etiquetas `</body>` y `</html>`.
    *
    * @return void Este método no retorna ningún valor; imprime el HTML directamente en la salida.
    */
   // Método para mostrar el pie de página
   public function mostrarFooter() {
        // Imprime el HTML del pie de página
        echo '<div class="footer text-center bg-dark text-white py-2">
                <p>&copy; 2023 CIFP Pau Casesnoves · Centro de Formación Profesional</p>
              </div>';

        // Imprime los scripts de Bootstrap desde su repositorio remoto y el script personalizado para activar el carrusel
        echo '<!-- Scripts de Bootstrap desde su repositorio remoto y script personalizado para activar el carrusel -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener(\'DOMContentLoaded\', function () {
        // Inicializar el carrusel utilizando Bootstrap
        var myCarousel = new bootstrap.Carousel(document.getElementById(\'carrusel\'), {
            interval: 2000, // Cambiar la velocidad del carrusel (en milisegundos)
            wrap: true // Repetir el carrusel al llegar al final
        });
    });
</script>';
        
        // Cierra la etiqueta </body> y </html>
        echo '</body></html>';
    }
}

// Crea una instancia de la clase Footer y llama al método mostrarFooter
$footer = new Footer();
$footer->mostrarFooter();

?>