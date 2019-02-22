
  <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
        <div>

        Nombre de usuario:<input id="first_name" type="text" class="validate" name="nombre" >
        <?php echo"<span>$ErrNombre</span>"; ?>
    </div>
        <div>
        Contraseña: <input type="password" name="contra1" >

    </div>
    <div>
        Repetir contraseña: <input type="password" name="contra2" >

    </div>
    <?php echo"<div>$ErrPwd</div>"; ?>
        <div>
            <img src='img/captcha.php' alt='' width='500' height='500' vspace='1' align='top' ><br>

        Introduzca código de seguridad: 
        <input type='text' name='captcha' size='8' maxlength='10'><br>
        </div>
        <input type='submit' name='submit' value='Enviar'>
    </form>