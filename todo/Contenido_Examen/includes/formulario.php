<!-- enctype="multipart/form-data" para enviar ficheros -->
<form  method="get"   action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


    <!-- Input tipo texo se coge la info con el name -->
    <div>
        <label for="first_name" >Login</label>
        <input id="first_name"  type="text"  name="usuario" required="required" placeholder="kiko" maxlength="7" size="50">

    </div>

    <!-- Input tipo number se coge la info con el name -->
    <div>
        <label for="f_num" >Numero entre 0 y 20</label>
        <input id="f_num"  type="number"  name="num" required="required" value="10" min="5" max="20">

    </div>

    <!-- Input checkbox se coge la info con el name -->
    <div>
        <label for="check" >Checkbox</label>
        <input id="check" type="checkbox" name="vehicle2" value="Bike">I have a bike

    </div>

    <!-- Input radio se coge la info con el name, la info devuelta es el value -->
    <div>
        <input type="radio" name="gender" value="male" checked="checked"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other<br><br>

    </div>


    <!-- Input radio se coge la info con el name, la info devuelta es el value -->
    <div>
        <label for="f_date" >    Birthday:        </label>
        <input type="date" name="bday" id="f_date" min="2000-01-02">

    </div>
    
    
    
    <!-- Input radio se coge la info con el name, la info devuelta es el value -->
    <div>
        <label for="f_archivo" >Selecciona un archivo:</label>
         <input type="file" name="myFile" id="f_archivo">


    </div>

    <div><input type="reset"></div> 
    <div><input type="submit" name="aceptar" value="ENVIAR"></div>	

</form>

<?php

if(isset($_GET)){
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
}