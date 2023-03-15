# MVC
Repositorio con estructura MVC para desarrollos fundamentamos en este diseño.
Este repositorio está basado en PHP y JavaScript para back-end, HTML, CSS y JavaScript para front-end y MySQL como motor de la base de datos.

Tiene como recursos open source:
* librería Font Awesome 6.2.0     --> https://fontawesome.com
* plantilla AdminLTE 3            --> https://adminlte.io/themes/v3/
* librería Sweet Alert 2          --> https://sweetalert2.github.io
* plantilla de login de Colorlib  --> https://colorlib.com/etc/lf/Login_v1/index.html
* libería JQuery 3.6.3            --> https://blog.jquery.com/2022/12/20/jquery-3-6-3-released-a-quick-selector-fix/
* librería Tilt de JQuery         --> https://gijsroge.github.io/tilt.js/
* librería Datatable de JQuery    --> https://datatables.net

Organización:

* app
  * config      --> cofiguración general del proyecto: constantes globales
  * controllers --> controladores de la estructura MVC
  * helpers     --> carpeta adicional de ayuda para archivos que no pertenezcan a las carpetas ya establecidas
  * libraries   --> archivos que son el núcleo de funcionamiento de la estructura MVC
  * models      --> modelos de la estructura MVC
  * views       --> vistas de la estructura MVC
  * .htaccess   --> prohíbe el ingreso por URL a la carpeta 'app'
  * starter.php --> inicializa la aplicación, concretamente los archivos de las carpetas 'config' y 'libraries'
  
* database
  * .htaccess   --> prohíbe el ingreso por URL a la carpeta 'database'
  * mvc.sql     --> archivo SQL que contiene los querys para crear la base de datos en MySQL

* public
  * css         --> archivos CSS para estilización del sitio web
  * doc         --> archivos binarios caso que se requiera trabajar con estos
  * font        --> archivo .ttf (DaFont) para trabajar con estas fuentes en el sitio web
  * img         --> imágenes requeridas para el sitio web
  * js          --> archivos JavaScript para front-end y back-end según sea requerido
  * phpmailer   --> se integra PHP Mailer para manejar envíos de correos
  * .htaccess   --> permite la organización MVC (controlador / método / parámetros) desde la URL manipulando el archivo index.php
                    NOTA: el valor de RewriteBase en este archivo debe cambiarse manualmente por el nombre de la carpeta del proyecto (en este caso es 'MVC')
  * index.php   --> este archivo representa la página web que se muestra al público, inicializa el archivo starter.php e instancia la clase Core de 'libraries'
