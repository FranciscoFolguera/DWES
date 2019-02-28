
<?php
session_start();

//include_once './login.php';
include_once './modelo/querys.php';
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    Desc. del producto: <input type="text" name="desc" required="required"><br>


    <input type="submit" name="submit">
</form>
<?php
if (isset($_POST['submit'])) {
    include_once './modelo/querys.php';
}
