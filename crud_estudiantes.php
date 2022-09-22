<?php
     
     if( !empty($_POST) ){
   
        $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_carnet = utf8_decode($_POST["txt_carnet"]);
        $txt_nombres = utf8_decode($_POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $drop_genero = utf8_decode($_POST["drop_genero"]);
        $txt_email = utf8_decode($_POST["txt_email"]);
        $txt_fn = utf8_decode($_POST["txt_fn"]);

      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO estudiantes(id_estudiante,carnet,nombres,apellidos,direccion,telefono,genero,email,fecha_nacimiento) VALUES ('". $txt_carnet ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."',". $txt_telefono .",'". $drop_genero ."','". $txt_email ."','". $txt_fn ."');";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "UPDATE estudiantes set carnet='". $txt_carnet ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',genero='". $drop_genero ."',email='". $txt_email ."',fecha_nacimiento='". $txt_fn ."'  where id_estudiante = ". $txt_id.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "DELETE from estudiantes  where id_estudiante = ". $txt_id.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
           
            header('Location: localhost:8080/crud_estudiantes_php');
           
          }else{
            $db_conexion->close();
          
          }

      }
     
    
      
      ?>