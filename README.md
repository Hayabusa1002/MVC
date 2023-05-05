# MVC
Repositorio con estructura MVC para desarrollos fundamentamos en este diseño.
Este repositorio está basado en PHP y JavaScript para back-end, HTML, CSS y JavaScript para front-end y MySQL como motor de la base de datos.

Organización:

* app
  * config        --> cofiguración general del proyecto: constantes globales
  * controllers   --> controladores de la estructura MVC
  * helpers       --> carpeta adicional de ayuda para archivos que no pertenezcan a las carpetas ya establecidas
  * libraries     --> archivos que son el núcleo de funcionamiento de la estructura MVC
  * models        --> modelos de la estructura MVC
  * views         --> vistas de la estructura MVC
  * .htaccess     --> prohíbe el ingreso por URL a la carpeta 'app'
  * starter.php   --> inicializa la aplicación, concretamente los archivos de las carpetas 'config' y 'libraries'
  
* database
  * .htaccess     --> prohíbe el ingreso por URL a la carpeta 'database'
  * mvc.sql       --> archivo SQL que contiene los querys para crear la base de datos en MySQL

* public
  * css           --> archivos CSS para estilización del sitio web
  * doc           --> archivos binarios caso que se requiera trabajar con estos
  * font          --> archivo .ttf (DaFont) para trabajar con estas fuentes en el sitio web
  * img           --> imágenes requeridas para el sitio web
  * js            --> archivos JavaScript para front-end y back-end según sea requerido
  * .htaccess     --> permite la organización MVC (controlador / método / parámetros) desde la URL manipulando el archivo index.php
                    NOTA: el valor de RewriteBase en este archivo debe cambiarse manualmente por el nombre de la carpeta del proyecto (en este caso es 'MVC')
  * index.php     --> este archivo representa la página web que se muestra al público, inicializa el archivo starter.php e instancia la clase Core de 'libraries'

* .gitignore      --> Evita que la carpeta 'vendor/' de Composer sea enviada al repositorio de GitHub. Para ello el usuario tiene acceso a composer.json y composer.lock, debe ejecutar en el terminal: `composer dump` y `composer install`
* .htaccess       --> Permite la redirección a la carpeta 'public/' cuando el usuario accede a la URL base (http://localhost/MVC/ para este caso)
* composer.json   --> Configuración de Composer donde se definen los paquetes y dependencias a utilizar en el proyecto. De momento sólo se requiere PHPMailer
* composer.lock   --> archivo generado con `composer install`, el cual contiene las licencias y versiones de los paquetes y dependencias requeridos en composer.json