<form  method="post"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



    <div>
        <label for="first_name" >Nombre de usuario</label>
        <input id="first_name"  type="text" class="validate" name="nombre">

    </div>


    <div>
        Contraseña: <input type="text" name="contra" >

    </div>



    <div><input type="submit" name="aceptar" value="ENVIAR"></div>	

</form>
