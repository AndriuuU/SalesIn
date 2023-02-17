# __SalesIn App__  
## __Manual de Usuario__
### _Aplicación desarrollada por Ana Blasco y Andrés Molina_
#### _Grado Superior de Desarrollo de Aplicaciones Multiplataforma - 2º Curso_
![N|Solid](https://www.pskitservices.com/wp-content/uploads/2021/03/imageedit_1_2408629393-2.png)




## Índice de contenidos

I. Introducción
 1. Objetivo
 2. Requerimientos
 3. Despliegue
 
II. Funcionamiento
1. Menú home
1.1. Registro
1.2. Inicio de sesión
2. Dentro del sistema
2.1. Admin
2.2. Noticias
2.3. Ofertas

# I. Introducción
### 1. Objetivo
Desarrollar una aplicación web de gestión de empleo y darle soporte.

### 2. Requerimientos
- Navegador web que soporte javascript, cookies y bootstrap
- PHP 7.2
- Un servidor web. Xampp sería la mejor opción, ya que es un paquete de software libre, que consiste principalmente en el sistema de gestión de bases de datos MySQL, el servidor web Apache y los intérpretes para lenguajes de script PHP

| Descargas |  |
| ------ | ------ |
| Google Chrome | [Link de descarga][google] |
| PHP | [Link de descarga][php] |
| XAMPP | [Link de descarga][xampp] |

### 3. Despliegue
Para desplegar la aplicación necesitaremos tener activado MySQL (mismamente desde Xampp) y estar en el directorio de la aplicación.
```sh
cd C:\xampp\htdocs\SalesIn>
```
Una vez ahí, ejecutamos el siguiente comando para desplegar el servidor.
```sh
php artisan serve
```
Cuando hayamos hecho esto, podremos acceder a la aplicación a través de la siguiente dirección ip.
```sh
http://127.0.0.1:8000
```

# II. Funcionamiento
### 1. Menú home
Nada más desplegar la aplicación nos encontramos con el menú de inicio, en cuya esquina superior derecha podemos ver dos botones: ‘login’ y ‘register’. Si ya estamos registrados en el sistema, le daremos a ‘login’; si por el contrario, todavía no tenemos nuestro usuario creado, le daremos a ‘register’. A continuación explicaremos ambas opciones.
![N|Solid](https://i.imgur.com/PDKkzpB.png)
_Pantalla de inicio_

##### 1.2. Registro
Si le damos a la opción de ‘register’ en el inicio seremos llevados a una nueva pantalla en la que se nos pedirá que introduzcamos nuestros datos para crear un nuevo usuario: Nombre, apellido, email, el ciclo en el que queremos inscribirnos y contraseña. Una vez hayamos rellenado todo le damos al botón ‘register’ y estaremos logueados en el sistema, que nos redigirá a la siguiente sección.
![N|Solid](https://i.imgur.com/U4qcu1L.jpg)
_Pantalla de registro_
##### 1.3. Inicio de sesión
Si por el contrario le damos a la opción de ‘login’ en el inicio seremos llevados a una nueva pantalla en la que se nos pedirá que introduzcamos nuestros datos de usuario (email y contraseña), para iniciar sesión en el sistema. Una vez hayamos rellenado todo le damos al botón ‘login’ y estaremos logueados en el sistema, que nos redigirá a la siguiente sección.
![N|Solid](https://i.imgur.com/MqEkZuJ.png)
_Pantalla de inicio de sesión_
### 2. Dentro del sistema
Si nos logueamos como admin veremos de nuevo la pantalla de bienvenida con varias opciones nuevas. Arriba a la derecha saldrá nuestro nombre (en este caso ‘admin’).  
Ahora volvamos a centrar nuestra atención en la lista de vínculos situados debajo del encabezado de ‘Bienvenido’.
![N|Solid](https://i.imgur.com/LE5gQIM.png)
_Pantalla de bienvenida_
##### 2.1. Admin
Este apartado sólo será funcional si te has logeado como administrador del sistema (si no, mostrará un mensaje diciendo que no eres admin). La pantalla que se nos mostrará nos permitirá ver a los usuarios registrados en el sistema y activarlos. 
![N|Solid](https://i.imgur.com/S3AsndE.png)
_Pantalla de administrador_
##### 2.2. Noticias
Este apartado nos muestra un listado de noticias que podemos editar y borrar, así como crearlas.
![N|Solid](https://i.imgur.com/WglWEd8.png)
_Listado de noticias_
![N|Solid](https://i.imgur.com/dgvppCV.png)
_Botón para añadir noticia_
##### 2.3. Ofertas
Este apartado nos muestra un listado de ofertas que podemos aplicar y mostrar en más detalle, así como generar un pdf en nuestro navegador de las ofertas aplicadas.
![N|Solid](https://i.imgur.com/ZEL5RC7.png)
_Listado de ofertas_
![N|Solid](https://i.imgur.com/TCCxVHq.png)
_Visualización de oferta en detalle_
![N|Solid](https://i.imgur.com/x49HDTy.png)
_PDF de oferta en navegador web_

**Github:** [Aquí]

[Aquí]: <https://github.com/AndriuuU/SalesIn>
[google]: <https://www.google.com/intl/es_es/chrome/>
[php]: <https://www.php.net/downloads.php>
[xampp]: <https://www.apachefriends.org/es/download.html>


