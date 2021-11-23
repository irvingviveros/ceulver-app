<!-- PROJECT SHIELDS -->
<p align="center">
  <h3 align="center">CEULVER PAE</h3>

  <p align="center">
    Plataforma de Administrcion Escolar bajo el framework Laravel versión 8.*
    <br />
    <a href="https://github.com/irvingviveros/ceulver-app"><strong>Explorar la documentación »</strong></a>
    <br />
    <br />
    <a href="https://github.com/irvingviveros/ceulver-app/issues">Reportar Bug</a>
    ·
    <a href="https://github.com/irvingviveros/ceulver-app/issues">Solicitar Función</a>
  </p>


<!-- TABLE OF CONTENTS -->
  <summary><h2 style="display: inline-block">Tabla de contenido</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">Acerca del proyecto</a>
      <ul>
        <li><a href="#built-with">Elaborado con</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Introducción</a>
      <ul>
        <li><a href="#prerequisites">Pre-requisitos</a></li>
        <li><a href="#installation">Instalación</a></li>
      </ul>
    </li>
    <li><a href="#usage">Uso</a></li>
    <li><a href="#roadmap">Ruta del proyecto</a></li>
    <li><a href="#contributing">Contribución</a></li>
    <li><a href="#license">Licencia</a></li>
    <li><a href="#contact">Contacto</a></li>
  </ol>



<!-- ABOUT THE PROJECT -->

## Acerca del proyecto


Sistema de gestión de información escolar, gestión de pagos en línea y aula virtual, todos integrados en un solo sistema.</br>
El sistema funciona en la nube, lo que permite a los usuarios acceder a sus datos de forma segura desde cualquier lugar mediante una conexión a Internet.


### Elaborado con

* <a href="https://laravel.com/docs/8.x/releases">Laravel 8.x</a>
* <a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-laravel-folder-structure.html">Vuexy HTML & HTML + Laravel Admin</a>


<!-- GETTING STARTED -->
## Introducción (Información proporcionada el 12/01/2021)

<h3>Antecedentes</h3>
La institución educativa privada Centro Universitario Latino Veracruz (CEULVER) cuenta con una plataforma en línea para la gestión administrativa de los alumnos y maestros con características limitadas debido a que está hecha en base a la plataforma de WordPress con un tema para la administración de escuelas que no cubre con todas las necesidades de la institución.
En CEULVER reconocen que la plataforma con la que operan en la actualidad funciona, pero no cubre con requisitos clave que se encuentran listados en la sección “Características”.

<h3>Solución</h3>
La solución que ofrecemos es crear un proyecto de gestión de información escolar a la medida con las herramientas y tecnología adecuada que cubra dichos requisitos, dividendo todo el proceso en 8 etapas o metas de desarrollo descritas en la sección “Estimación de tiempo de desarrollo estimado”.
El tiempo de desarrollo del sistema da un total estimado de 4 meses incluyendo las pruebas de cada uno de los módulos.

El tiempo puede variar dependiendo las condiciones que se vayan presentando durante su desarrollo, por ejemplo:

* Nuevas características no descritas en el documento inicial.
* Factores externos al proyecto.</li>


El sistema está pensado para poder distribuirse en diversas instituciones, por lo que CEULVER contará con la licencia y derechos de la misma. Dicho esto, el sistema será desarrollado pensando en su distribución y cada escuela tendrá sus propias configuraciones e información en un servidor externo o en el de CEULVER con un espacio particionado exclusivamente para dicha institución.
Si CEULVER decide comercializar el sistema, puede vender la base del sistema y por separado los módulos no esenciales, por ejemplo, el módulo de Finanzas. Hay diversas características que puede sacar provecho para generar un modelo de negocio entorno a las funciones del sistema.

<h3>Ventajas</h3>
Este sistema será capaz de reducir drásticamente los tiempos de trabajo debido a la automatización de las tareas que se hacen a mano o que pueden ser computables y a su vez generará ahorro económico en utilerías, como papel y tinta.
Gracias a esto, se puede decir que el proceso de automatizar las tareas conlleva a la conservación del medio ambiente y recursos de la institución.

Para el departamento de Coordinación Académica y el departamento Administrativo será más fácil la transferencia de información interna y la distribución de la información hacia los alumnos, maestros y padres de familia.

Contarán con soporte y asistencia personal o remota durante 1 año sin costo alguno para casos de soporte o ayuda con las funciones del sistema.

Contarán con una guía de uso para entrenamiento de futuros empleados de la institución.

El sistema podrá ser distribuido en base a licencias que serán otorgadas por el personal de desarrollo, por lo que será una distribución controlada hacia otras instituciones.

El sistema será en línea y alojado en un servidor VPS, por lo que se requiere de una conexión a internet para su uso. La ventaja es que tiene una reducción de costos en hardware y de tiempo de mantenimiento físico si es que se contara con un servidor en CEULVER.


### Pre-requisitos

* Node: v14.15.5 or above (LTS)
* PHP: 7.3v or Above
* Composer: 2.0.4v or Above
* Laravel: 8.0v or Above

### Instalación

1. Clona el repositorio
   ```sh
   git clone https://github.com/irvingviveros/ceulver-app.git
   ```
2. Generar archivo .env con configuración propia a partir del archivo .env.example
   ```sh
   git clone https://github.com/irvingviveros/ceulver-app.git
   ```
3. Asegurar de tener instalado el paquete yarn
   ```sh
   npm install -g yarn
   ```
4. Abre la terminal en tu directorio raíz y para instalar los paquetes del compositor, ejecuta el siguiente comando:
   ```sh
   php artisan key:generate
   ```
5. Al ejecutar el siguiente comando, podrás obtener todas las dependencias en tu carpeta node_modules:
   ```sh
   yarn
   ```
6. Para ejecutar el proyecto, debes ejecutar el siguiente comando en el directorio del proyecto.
Compilará los archivos php y todos los demás archivos del proyecto. Si estás realizando algún cambio en cualquiera de los archivos php, debe ejecutar el comando dado nuevamente.
   ```sh
   yarn mix
   ```
7. Para servir la aplicación, debe ejecutar el siguiente comando en el directorio del proyecto. (Esto le dará una dirección con el número de puerto 8000).
Ahora navegue hasta la dirección indicada y verá que su aplicación se está ejecutando.
   ```sh
   php artisan serve
   ```
Para cambiar la dirección del puerto, ejecute el siguiente comando:
   ```sh
   php artisan serve --port=8080 // Para el puerto 8080
sudo php artisan serve --port=80 // Si quieres ejecutarlo en el puerto 80, probablemente necesitarás permisos sudo
   ```
Si desea ver todos los cambios que realiza en la aplicación, ejecute el siguiente comando en el directorio raíz.
   ```sh
   yarn mix watch
   ```
Si desea ejecutar el proyecto y realizar la compilación en el modo de producción, ejecute el siguiente comando en el directorio raíz; de lo contrario, el proyecto continuará ejecutándose en el modo de desarrollo.
   ```sh
   yarn mix --production
   ```
### Permisos requeridos
Si tiene problemas con los permisos, debe ejecutar el siguiente comando en el directorio del proyecto
   ```sh
   yarn mix --production
   ```

<!-- USAGE EXAMPLES -->
## Uso

Editar el archivo <a href="https://github.com/irvingviveros/ceulver-app/blob/dev/.env.example">.env.example</a> para hacer referencia a tu base de datos y ejecutar la migración, cuenta de mailtrap y otros ajustes. 

* Ejecutar el comando para ejecutar las migraciones de Laravel y el Seed. 
   ```sh
   php artisan migrate:refresh --seed
   ```

Para loguear como super administrador, usar las siguientes credenciales

Usuario       | Contraseña
------------- | -------------
admin@mail.com  | admin
admin2@mail.com  | admin2






<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/irvingviveros/ceulver-app/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Your Name - [@twitter_handle](https://twitter.com/twitter_handle) - email

Project Link: [https://github.com/irvingviveros/ceulver-app](https://github.com/irvingviveros/ceulver-app)







<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/irvingviveros/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/irvingviveros/ceulver-app/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/irvingviveros/repo.svg?style=for-the-badge
[forks-url]: https://github.com/irvingviveros/ceulver-app/network/members
[stars-shield]: https://img.shields.io/github/stars/irvingviveros/repo.svg?style=for-the-badge
[stars-url]: https://github.com/irvingviveros/ceulver-app/stargazers
[issues-shield]: https://img.shields.io/github/issues/irvingviveros/repo.svg?style=for-the-badge
[issues-url]: https://github.com/irvingviveros/ceulver-app/issues
[license-shield]: https://img.shields.io/github/license/irvingviveros/repo.svg?style=for-the-badge
[license-url]: https://github.com/irvingviveros/ceulver-app/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/irvingviveros
