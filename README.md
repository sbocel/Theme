# Documentaci贸n OsTicket 馃殌

## Manual de instalaci贸n Shagen
 - CAMBIO DE LOGO
  1. Cambiar el margen para que el logo se centre para ello nos dirigimos en *\upload\assets\shagen\css\theme.css* y buscamos la l铆nea:
  Para que la imagen se coloque en el tama帽o correspondiente le colocaremos margenes fijos en los cuales nos dirigiremos a la direcci贸n:  *\upload\assets\shagen\css\bootstrap.css* y buscamos la propiedad img y colocamos lo siguiente:
   
  2. Para que una imagen se agregue automaticamente en el area de cliente nos dirigimos a la direcci贸n: *\Shagen\upload\logo.php* y cambiamos la linea subrayada de   amarillo:
   
  3. Para alinear la lista de opciones del header en *\upload\assets\shagen\css\theme.css* en la secci贸n:
   
 - MODIFICACIONES DE COLOR EN HEADER
 1. Para cambiar el color del header en *\upload\assets\shagen\css\theme.css* en la secci贸n:
 2. Para cambiar el topbar en donde el usuario inicia sesi贸n en la direcci贸n *upload\assets\shagen\css\theme.css*
 3. Para cambiar el color de la lista de t铆tulos, en la siguiente imagen se muestra el color de un link desactivado, en donde dice color: #aaa, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 4. Para cambiar el color de la lista de t铆tulos, en la siguiente imagen se muestra el color del link del t铆tulo cuando se coloca el mouse en 茅l, en donde dice color: #fff, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 5. Para cambiar el color de la lista de t铆tulos, en la siguiente imagen se muestra el color del link del t铆tulo se esta en esa p谩gina, es la que se encuentra activada o bien estamos en ella, en donde dice color: #7ec01e, podemos cambiarlo. En *upload\assets\shagen\css\theme.css*
 
 - RESPONSIVE
 1. Para cambiar el color de la barra de opciones en vista tel茅fono es decir nos dirigimos a la carpeta *upload\assets\shagen\css\theme.css* en donde en la l铆nea a continuaci贸n agregamos lo subrayado en verde para ponerle un color diferente.
 - CAMBIOS EN EL BODY
 1. Para cambiar los iconos para las acciones a realizar con el ticket, es decir: 鉃? y 鈩癸笍 nos dirigimos a *\upload\assets\shagen\css\theme.css* y cambiamos la propiedad subrayada de background para el fondo del icono. Y para cambiar dentro del icono colocamos el color que deseemos en color.
 2. Para cambiar los colores de los links nos dirigimos a *\upload\assets\shagen\css\theme.css* y en la secci贸n colocamos el color que desemos para los hiperv铆nculos.
 3. Para cambiar el color de los botones para abrir un nuevo ticket nos dirigimos a *\upload\assets\shagen\css\theme.css* nos dirigimos en estas 2 secciones y colocamos el color que deseamos.
Si se desea agregar que al momento de colocar el mouse en el bot贸n cambie de color se colocar谩n las siguientes propiedades en donde si nos fijamos es la misma etiqueta de los botones con la diferencia que tienen ::hover y el color.
Para cambiar el color de estos 3 botones 
Nos dirigimos a *upload\assets\shagen\css\bootstrap.css* en donde cambiaremos las siguientes l铆neas de c贸digo. 
       1. Para el primero que es crear Ticket:
       Luego para ponerle hover a ese bot贸n colocamos en la parte subrayada el color que deseemos
       2. Para el Restablecer buscamos con la propiedad warning, se proceden a cambiar las mismas l铆neas de c贸digo con la diferencia que el nombre de su clase es otra        (btn-warning).
       3. Para Cancelar procedemos a buscar la propiedad warning y hacemos el mismo cambio
 
- CAMBIO DE FOOTER

  TITULOS
  
     Para cambiar los t铆tulos de pie de pagina, se debe dirigir a la direcci贸n de upload/include/client/footer.inc.php  y cambiamos donde se encuentra subrayado de gris el php echo__(鈥榯itulo que quisieramos鈥?) y en href =鈥?<direcci贸n a donde quisi茅ramos que se dirigiera al seleccionar el titulo>鈥?
  
  REDES SOCIALES
 1. Para agregar o quitar redes sociales en el footer, se debe dirigir a la direcci贸n de upload/include/client/footer.inc.php Adentro del archivo se puede colocar el link que redirigir谩 a la red social. En la parte de href = 鈥?<colocar link>鈥? y target="_blank" y dependiendo de la red social se quitar谩 la opci贸n que sea como comentario, es decir se quitara 鈥?<!--" y 鈥溾??->鈥?.  
Ejemplo: 
``` html
<li> <a target="_blank" href="https://www.facebook.com/bluedevssoftware/?ti=as"> <i class="icon-facebook"></i> </a> </li>
```
 2. Para cambiar el hover del link del icono de Facebook en el footer nos dirigimos a \upload\assets\shagen\css\theme.css y cambiamos la siguiente l铆nea al color que deseemos. 
<h3 align="center"> FUNCIONALIDADES MODIFICADAS </h3>

 1. Para que aparezcan los help topics en el dropdown de la persona perteneciente a la organizaci贸n debemos ir *C:\xampp\htdocs\Shagen\upload\include\client\open.inc.php* en donde cambiaremos esta secci贸n de c贸digo:
 
<h3 align="center"> MOSTRAR EN EL PERFIL EL FORMULARIO DE CONTACTO </h3>

 1. Para mostrar el formulario de contacto al momento de ingresar a ver el perfil, nos dirigimos a la direcci贸n *C:\xampp\htdocs\Shagen\upload\include\client\profile.inc.php*  y cambiamos estas l铆neas de c贸digo: 
 
 Por estas:
 
<h3 align="center"> AGREGAR CHAT FOOTER EN EL PANEL DE ADMINISTRADOR </h3>

 1. En la direcci贸n \upload\include\staff\header.inc.php agregar el siguiente script
 
 - CAMBIAR FAVICON 
 
  En la direcci贸n para el Staff nos dirigimos a *\upload\include\staff\header.inc.php* luego al 谩rea de favicon y colocamos lo siguiente:
  
  En la direcci贸n para el Cliente nos dirigimos a *upload\include\client\header.inc.php* luego al 谩rea de favicon y colocamos lo siguiente:
  
 - CAMBIAR T脥TULOS DE POWERED BY
 
 1. En la direcci贸n de \upload\include\staff\login.tpl.php en la siguiente linea de c贸digo
 
 al siguiente: 
 
 
 Este mismo procedimiento lo hacemos en la siguientes direcciones, ya que tienen la misma secci贸n de c贸digo:
   1. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.login.php
   2. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.php
   3. C:\xampp\htdocs\Shagen\upload\include\staff\pwreset.sent.php
   
 - CAMBIAR RECAPTCHA V2 
 
 1. Nos dirigimos a https://www.google.com/recaptcha/about/ y creamos reCaptcha Keys, en donde nos dar谩n 2 claves 
La primera es 鈥淪ITE KEY鈥? la cual colocaremos en el html en la direcci贸n: \upload\include\client\open.inc.php en donde reemplazamos

A esto, la parte seleccionada de amarillo es donde se colocar谩 la sitekey:

Posteriormente nos dirigiremos a la direcci贸n *\upload\open.php* y reemplazaremos el siguiente c贸digo

por este nuevo c贸digo, en donde en $secretKey colocaremos la KEY SECRET que nos da el recaptcha de google.

## Manual ThemedOst
 Las modificaciones se har谩n utilizando un editor de c贸digo fuente, en este caso Visual Studio Code.
- MDIFICAR FIRMA EN FOOTER
1. Debemos encontrar la ubicaci贸n del archivo footer.inc.php, se encuentra dentro de la carpeta include/client.
2. Dentro de <div id=鈥漟ooter鈥?> modificaremos los cambios que queremos agregar a nuestra firma.

- Modificaci贸n de ubicaci贸n Navbar

<h3 align="center"> Animaciones </h3>

- Botones
B谩sicamente modificamos algunas propiedades de un bot贸n ya existente:
1. El border-radius le da forma de pill al bot贸n, y el hover modifica la propiedad al pasar el cursor sobre este.
2. Las propiedades de css las encontramos en /assets/css/theme.css y lo que colocaremos al bot贸n seg煤n su clase ser谩 lo siguiente:
<h3 align="center"> Subir cambios a FileZilla </h3>
1. Creamos la conexi贸n con los datos brindados:
2. De lado izquierdo colocaremos la carpeta que contiene el proyecto en local.
3. De lado derecho la carpeta del servidor.
4. En el lado local buscaremos los archivos modificados, por cada archivo debemos buscar la ruta de lado derecho tambi茅n, con la finalidad de overwrite cada archivo.
5. Para sobre escribir cada archivo debemos darle click en el lado de local y aceptar el mensaje de overwrite.

## Manual Logos del sistema y landingpage
