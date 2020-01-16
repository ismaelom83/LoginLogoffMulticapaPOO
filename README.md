#proyectoLoginLogoffMulticapaPOO

## Introduction

>¿Por qué alguien necesita esto?  
es una aplicacion login logoff que resuelve el problema de dejar ver  
la aplicacion a alguien que esta logeado y alguien que no.

## Code Samples

>aqui tienes una muestra del codigo  de nuestra aplicacion
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["salir"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    //nos dirige al login
    header("location: index.php");
} else { //si no estaremos en el inicio
    $vista = $vistas['inicio']; 
    /**
     * requerimosa el layout de la vista
     */
    require_once $vistas['layout'];
}

## Installation

> Como instalar y usar esta aplicacion  
* Debes de tener instalado un servidor ubuntu 
* En el servidor ubuntu debes tener instalado el modulo de php  

>Ahora le indicaremos como instalar un servidor ubuntu en su ordenador  Primero instalamos el apache  
  
sudo apt update  
   
sudo apt install apache2  
  
* Ajuste del cortafuegos para permitir el tráfico web  
  
sudo ufw app list  
  
Output  

Available applications:  

  Apache  

  Apache Full  

  Apache Secure 

  OpenSSH  
  
  
* Despues instalamos mysql  

sudo apt install mysql-server  
  
* luego instalamos el modelo de seguridad de mysql  

sudo mysql_secure_installation  

* Tambien deberemos instalar el modulo de PHP con el siguiente comando  

sudo apt install php  

* Reiniciamos el sistema y ya tendriamos nuestro servidor listo para funcionar  

sudo systemctl restart apache2  

* podemos comprobar con este comando que el servicio esta activo  

sudo systemctl status apache2  

> Si el servicio esta activo ya tenemos nuestro servidor y ya podemos utilizar nuestra aplicacion de loginLogoff.


 



 
