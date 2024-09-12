<?php
    //conexion con DB
    include("db.php");
    // obtengo los datos del formulario y lo asigno a variables

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña


    //insertamos los datos en la DB
    $query = " INSERT  INTO usuarios(
        usuario, 
        email, 
        contraseña
    ) VALUES (
        '$usuario',
        '$email',
        '$contraseña'
    )";

    //comprobamos si se sube o no y lo envio a la pagina propiedades o al formulario para volver a intentar
    $resultado =  $conectar->query($query);
    if($resultado){
        echo "Subido";
        header('Location:../template/login.php');
    } else {
        echo " No se subio";
        header('Location: ../template/registrar_usuario.php');
    }


?>