<?php

session_start();
if($_SESSION['is_logged']==true){
    
    if($_POST['formSubmit']==1){
        
        $name=trim($_POST['name']);
        $mail=  trim($_POST['mail']);
        $phone=trim($_POST['phone']);
        if ((strlen($name)>3)&&  (strlen($mail)>5)) 
        {
            $tmp='name:'.$name.';email:'.$mail.';mobile:'.$phone;
            file_put_contents('data.txt', $tmp."\n",FILE_APPEND);
            echo 'Data saved';
            
        }else{
            echo 'wrong data';
        }
    }
    ?>
<form method="post" action="add.php">
    <input type="hidden" name="formSubmit" value="1">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="mail">Email</label>
    <input type="text" name="mail" id="mail">
    <label for="phone">Mobile</label>  
    <input type="text" name="phone" id="phone">
    <input type="submit" value="Add">
    
</form>
<a href="index.php">Home</a>
    <?php
    
    
}  else {
    header('Location:index.php');
}