<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';  

if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  if ($mysqli->connect_error) {
     // echo "UNable to connect";
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
  }
  echo "{$email}";
  echo "{$pass}";
  $sql= "SELECT * FROM members WHERE email='".$email."' and password='".$pass."'";
     $select=$mysqli->query($sql);
     $flag=0;
    while ($row = $select->fetch(\PDO::FETCH_ASSOC)) {
            echo "in loop";
            $flag=1;
            break;
    }   
    echo "{$flag}";
  if($flag==1)
  {
    // echo "\ntrue";
    ?>
    <form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form>
    <?php
  }
  else{
    echo "No such user exists. Please check your Email Address"; 
  }
}
?>