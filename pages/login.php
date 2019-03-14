<?php
session_start();
$error = ""; //error
if ($_POST['submit'] == "Prisijungti"){
    //tikrinam button"
    if ($_POST['login'] == "admin" && $_POST['password'] == "passwordas"){
        $_SESSION['username']= "admin";

    }
    else{
        $error = "neteisingi duomenys";
    }
    
}
if ($_SESSION['username'] = "admin"){
    echo "sveiki";
    //parodomas meniu
}else{
    echo "<form> ... </form>"; //prisijungimas
    if ($error != "") {echo $error; }
}
?>

<form action="" method="post"><<fieldset>
<input type="text" name="username" placeholder="Enter your username" required>
<input type="password" name="password" placeholder="Enter your password" required>
<input type="submit" value="Submit">
</fieldset>
</form>
