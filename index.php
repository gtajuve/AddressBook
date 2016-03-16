<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><Address_Book</title>
	
</head>
<body >
	<?php
        if($_SESSION['is_logged']==true)
        {
            echo '<a href=logout.php>Logout</a><br><a href=add.php>Add</a><hr>';
            $friends=  file('data.txt');
            echo'<table border=1>'
            . '<tr><td>Name</td><td>Email</td><td>Phone</td></tr>';
            foreach ($friends as $f)
                {
                $temp=  explode(';', $f);
                echo '<tr>';
                foreach ($temp as $v) {
                     $temp1=  explode(':', $v);
                      echo '<td>'.$temp1[1].'</td>';
                }
                echo '</tr>';
               
//                echo '<pre>.'.  print_r($temp1, true).'</pre>';
//                echo '<tr><td>$temp1[1]</td><td>Email</td><td>Phone</td></tr>';
            }
            echo '</table>';
        }else{
            if($_GET['error']==1){
                echo 'wrong username';
            }
            
            
             ?>
        <form method="post" action="login.php">
        username:<input type="text" name="login"><br>
        pass:<input type="password" name="pass"><br>
        <input type="submit" value="Login">
            </form>
            <?php
        }
        ?>
</body>
</html>

