<form  method="post"  action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


    
    <div>Jugador 1:
        <div>
            <label for="first_name" >Nombre: </label>
            <input id="first_name" type="text" class="validate" name="nombre1" >
            <?php echo"<span>$ErrNombre1</span>"; ?>
        </div>
        Ficha: 
        <label>
            <input name="ficha1" type="radio" value="B" checked="checked"/>
            <span>Batman</span>
        </label>

        <label>
            <input name="ficha1" type="radio"  value="J"/>
            <span>Joker</span>
        </label>
        <?php echo"<span>$ErrFicha1</span>"; ?>
    </div>


    <div>Jugador 2:
        <div>
            <label for="first_name" >Nombre: </label>
            <input id="first_name2" type="text" class="validate" name="nombre2" >
            <?php echo"<span>$ErrNombre2</span>"; ?>
        </div>
        Ficha:
        <label>
            <input name="ficha2" type="radio" value="B" >
            <span>Batman</span>
        </label>

        <label>
            <input name="ficha2" type="radio"  value="J" checked="checked"/>
            <span>Joker</span>
        </label>

    </div>

    <?php echo"<span>$ErrFicha</span>"; ?>
    <?php echo"<span>$ErrNombre</span>"; ?>
    <div><input type="submit" name="aceptar" value="ENVIAR"></div>	

</form>
