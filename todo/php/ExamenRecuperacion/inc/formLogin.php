<form  method="get"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



    <div>
        <label for="first_name" >Login</label>
        <input id="first_name"  type="text"  name="$usuario" required="requires" value="kiko">
       
    </div>
 <div>
        <label for="tema" >Tema</label>
        <input id="tema"  type="text"  name="tema" required="requires" value="pais">
       
    </div>
    <h4>Solo puedes poner 'pais' o 'libro' en la caja de TEMA cualquier otra cosa metida será invalida</h4>

    	
    <div><input type="submit" name="aceptar" value="ENVIAR"></div>	

</form>
