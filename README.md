# Documentación OsTicket 🚀

## Manual de instalación Shagen
 - CAMBIO DE LOGO
  1. Cambiar el margen para que el logo se centre para ello nos dirigimos en *\upload\assets\shagen\css\theme.css* y buscamos la línea:
  Para que la imagen se coloque en el tamaño correspondiente le colocaremos margenes fijos en los cuales nos dirigiremos a la dirección:  *\upload\assets\shagen\css\bootstrap.css* y buscamos la propiedad img y colocamos lo siguiente:
   
  2. Para que una imagen se agregue automaticamente en el area de cliente nos dirigimos a la dirección: *\Shagen\upload\logo.php* y cambiamos la linea subrayada de   amarillo:
   
  3. Para alinear la lista de opciones del header en *\upload\assets\shagen\css\theme.css* en la sección:
   
 - MODIFICACIONES DE COLOR EN HEADER
 1. Para cambiar el color del header en *\upload\assets\shagen\css\theme.css* en la sección:
 2. Para cambiar el topbar en donde el usuario inicia sesión en la dirección *upload\assets\shagen\css\theme.css*
 3. Para cambiar el color de la lista de títulos, en la siguiente imagen se muestra el color de un link desactivado, en donde dice color: #aaa, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 4. Para cambiar el color de la lista de títulos, en la siguiente imagen se muestra el color del link del título cuando se coloca el mouse en él, en donde dice color: #fff, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 5. Para cambiar el color de la lista de títulos, en la siguiente imagen se muestra el color del link del título se esta en esa página, es la que se encuentra activada o bien estamos en ella, en donde dice color: #7ec01e, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 
 - RESPONSIVE
 1. Para cambiar el color de la barra de opciones en vista teléfono es decir nos dirigimos a la carpeta *upload\assets\shagen\css\theme.css* en donde en la línea a continuación agregamos lo subrayado en verde para ponerle un color diferente.
 - CAMBIOS EN EL BODY
 1. Para cambiar los iconos para las acciones a realizar con el ticket, es decir: ➕ y ℹ️ nos dirigimos a *\upload\assets\shagen\css\theme.css* y cambiamos la propiedad subrayada de background para el fondo del icono. Y para cambiar dentro del icono colocamos el color que deseemos en color.
 2. Para cambiar los colores de los links nos dirigimos a *\upload\assets\shagen\css\theme.css* y en la sección colocamos el color que desemos para los hipervínculos.
 3. Para cambiar el color de los botones para abrir un nuevo ticket nos dirigimos a *\upload\assets\shagen\css\theme.css* nos dirigimos en estas 2 secciones y colocamos el color que deseamos.
Si se desea agregar que al momento de colocar el mouse en el botón cambie de color se colocarán las siguientes propiedades en donde si nos fijamos es la misma etiqueta de los botones con la diferencia que tienen ::hover y el color.
Para cambiar el color de estos 3 botones 
Nos dirigimos a *upload\assets\shagen\css\bootstrap.css* en donde cambiaremos las siguientes líneas de código. 
       1. Para el primero que es crear Ticket:
       Luego para ponerle hover a ese botón colocamos en la parte subrayada el color que deseemos
       2. Para el Restablecer buscamos con la propiedad warning, se proceden a cambiar las mismas líneas de código con la diferencia que el nombre de su clase es otra        (btn-warning).
       3. Para Cancelar procedemos a buscar la propiedad warning y hacemos el mismo cambio
 
- CAMBIO DE FOOTER

  TITULOS
  
     Para cambiar los títulos de pie de pagina, se debe dirigir a la dirección de upload/include/client/footer.inc.php  y cambiamos donde se encuentra subrayado de gris el php echo__(‘titulo que quisieramos’) y en href =’<dirección a donde quisiéramos que se dirigiera al seleccionar el titulo>’
  
  REDES SOCIALES
 1. Para agregar o quitar redes sociales en el footer, se debe dirigir a la dirección de upload/include/client/footer.inc.php Adentro del archivo se puede colocar el link que redirigirá a la red social. En la parte de href = “<colocar link>” y target="_blank" y dependiendo de la red social se quitará la opción que sea como comentario, es decir se quitara “<!--" y “–->”.  
Ejemplo: 
``` html
<li> <a target="_blank" href="https://www.facebook.com/bluedevssoftware/?ti=as"> <i class="icon-facebook"></i> </a> </li>
```
 2. Para cambiar el hover del link del icono de Facebook en el footer nos dirigimos a \upload\assets\shagen\css\theme.css y cambiamos la siguiente línea al color que deseemos. 
<h3 align="center"> FUNCIONALIDADES MODIFICADAS </h3>

 1. Para que aparezcan los help topics en el dropdown de la persona perteneciente a la organización debemos ir *C:\xampp\htdocs\Shagen\upload\include\client\open.inc.php* en donde cambiaremos esta sección de código:
 
<h3 align="center"> MOSTRAR EN EL PERFIL EL FORMULARIO DE CONTACTO </h3>

 1. Para mostrar el formulario de contacto al momento de ingresar a ver el perfil, nos dirigimos a la dirección *C:\xampp\htdocs\Shagen\upload\include\client\profile.inc.php*  y cambiamos estas líneas de código: 
 
 Por estas:
 
<h3 align="center"> AGREGAR CHAT FOOTER EN EL PANEL DE ADMINISTRADOR </h3>

 1. En la dirección \upload\include\staff\header.inc.php agregar el siguiente script
 
 - CAMBIAR FAVICON 
 
  En la dirección para el Staff nos dirigimos a *\upload\include\staff\header.inc.php* luego al área de favicon y colocamos lo siguiente:
  
  En la dirección para el Cliente nos dirigimos a *upload\include\client\header.inc.php* luego al área de favicon y colocamos lo siguiente:
  
 - CAMBIAR TÍTULOS DE POWERED BY
 
 1. En la dirección de \upload\include\staff\login.tpl.php en la siguiente linea de código
 
 al siguiente: 
 
 
 Este mismo procedimiento lo hacemos en la siguientes direcciones, ya que tienen la misma sección de código:
   1. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.login.php
   2. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.php
   3. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.sent.php
   
 - CAMBIAR RECAPTCHA V2 
 
 1. Nos dirigimos a https://www.google.com/recaptcha/about/ y creamos reCaptcha Keys, en donde nos darán 2 claves 
La primera es “SITE KEY” la cual colocaremos en el html en la dirección: \upload\include\client\open.inc.php en donde reemplazamos

A esto, la parte seleccionada de amarillo es donde se colocará la sitekey:

Posteriormente nos dirigiremos a la dirección *\upload\open.php* y reemplazaremos el siguiente código

por este nuevo código, en donde en $secretKey colocaremos la KEY SECRET que nos da el recaptcha de google.

## Manual ThemedOst
 Las modificaciones se harán utilizando un editor de código fuente, en este caso Visual Studio Code.
- MDIFICAR FIRMA EN FOOTER
1. Debemos encontrar la ubicación del archivo footer.inc.php, se encuentra dentro de la carpeta include/client.
2. Dentro de <div id=”footer”> modificaremos los cambios que queremos agregar a nuestra firma.

- Modificación de ubicación Navbar

<h3 align="center"> Animaciones </h3>

- Botones
Básicamente modificamos algunas propiedades de un botón ya existente:
1. El border-radius le da forma de pill al botón, y el hover modifica la propiedad al pasar el cursor sobre este.
2. Las propiedades de css las encontramos en /assets/css/theme.css y lo que colocaremos al botón según su clase será lo siguiente:
<h3 align="center"> Subir cambios a FileZilla </h3>
1. Creamos la conexión con los datos brindados:
2. De lado izquierdo colocaremos la carpeta que contiene el proyecto en local.
3. De lado derecho la carpeta del servidor.
4. En el lado local buscaremos los archivos modificados, por cada archivo debemos buscar la ruta de lado derecho también, con la finalidad de overwrite cada archivo.
5. Para sobre escribir cada archivo debemos darle click en el lado de local y aceptar el mensaje de overwrite.

## Manual Logos del sistema y landingpage
