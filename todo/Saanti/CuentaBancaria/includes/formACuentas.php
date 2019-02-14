<?php ?>


<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="GET" onsubmit="return ComprobarDNI1()">
    Nº de cuenta    <input type="text" name="nCuenta" ><br>
    DNI cliente 1   <input type="text" name="dni1" id="dni1"><br>
    DNI cliente 2   <input type="text" name="dni2" id="dni2"><br>
    Salario         <input type="number" name="sal" id="salario">
    <input type="submit" name="submit" value="crear">
</form>


 <button type="button" onclik="Mensaje()">Click Me!</button> 

<?php
