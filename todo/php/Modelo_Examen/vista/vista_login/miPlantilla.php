
<?php
session_start();

include_once './login.php';
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    DESCRIPCION DEL PRODUCTO: <input type="text" name="desc" ><br>
   
    <input type="submit" name="submit">
</form>
<?php
if (isset($_POST['submit'])) {
    
}