<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Form</title>
    <meta name="description" content="Form">
    <meta name="author" content="Noel Perrotta">
    <link href="style/global.css" rel="stylesheet">
	<link href="style/layout.css" rel="stylesheet">
</head>

<body>
<?php
if (isset($_POST['submit'])) {
    
    $firstname=filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $price=(float)filter_var($_POST['price'], FILTER_SANITIZE_FLOAT);
    $age=(int)filter_var($_POST['age'], FILTER_SANITIZE_INT);
    
    $to='noel_perrotta@emerson.edu';
    $subject='My Form Submission';
    $message="This is my email!!!!\n"
            ."Name:$firstname $lastname\n"
            ."Age: $age\n";
    $result=mail($to, $subject, $message);
    
    // Connect to Database
    $dbhostname='localhost';
    $dbusername='noelperr_abcdef';
    $dbpassword='Chewey01';
    $dbdatabase='noelperr_userform';
    
    $mysqli=new mysqli($dbhostname, $dbusername, $dbpassword, $dbdatabase);
    
    if ($mysqli->connect_errno) {
        echo "<p>MySQL Error" .$mysqli->error."</p>";
    } else {
        echo 'database connection success!!!!!';
    }
    
    $firstname=$mysqli->real_escape_string($firstname);
    $password=password_hash($password, PASSWORD_DEFAULT);
    
    $query="INSERT INTO `account`(accountid, username, password, firstname, lastname, email) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', '$email')";
        
    if ($mysqli->query($query)) {
        echo 'Insert data success!!!!!';
    } else {
        echo "<p>Insert Error" .$mysqli->error;
    }
}
?>

<div id="stuff">   
    <form method="post">
        First name:<br>
        <input type="text" name="firstname"><br>
        Last name:<br>
        <input type="text" name="lastname"><br>
        Username:<br>
        <input type="text" name="username"><br>
        Email:<br>
        <input type="email" name="email"><br>
        Password:<br>
        <input type="password" name="psw"><br>           
        <input type="submit" name="submit" value="Submit">
        </form>
</div>
</body>
</html>