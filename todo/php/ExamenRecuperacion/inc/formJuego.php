<form  method="get"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">



    <div>
        <label for="respuesta" >Respuesta</label>
        <input id="respuesta"  type="text"  name="respuesta">
    </div>
    
        


    
  	
    <div><input type="submit" name="enviar" value="COMPROBAR"></div>	
    <div><input type="submit" name="enviar" value="PISTA"></div>	
    <div><input type="submit" name="enviar" value="VER SOLUCION"></div>	
     <div><input type="submit" name="enviar" value="SIGUIENTE"></div>	

</form>
