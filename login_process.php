<?php

session_start();

include("db.php");

// create a variable called $pagename
$pagename="Your Login Result";

echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

// call in stylesheet
echo "<title>".$pagename."<title>";

echo "<body>";

// include header layout file
include ("headfile.html");

// display name of the page on the web page
echo "<h4>".$pagename."</h4>";

//capture the 2 values entered by the user in the form using the $_POST superglobal variable
//assign these 2 values to 2 local variables
$email = $_POST['l_email'];
$password = $_POST['l_password'];
//display the content of the local variables to make sure the values are passed properly
// echo "<p>Login email: ".$email."</p>";
// echo "<p>Login pwd: ".$password."</p>";

if (empty($email) or empty($password)) //if either the $email or the $password is empty
{
 echo "<p><b>Login failed!</b>"; //display login error
 echo "<br>login form incomplete";
 echo "<br>Make sure you provide all the required details</p>";
 echo "<br><p> Go back to <a href=login.php>login</a></p>";
}
else{
    $SQL = "SELECT * FROM Users WHERE userEmail = '".$email."'"; //retrieve record if email matches
    $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn)); //execute SQL query
    $nbrecs = mysqli_num_rows($exeSQL); 

    if ($nbrecs ==0) //if nb of records is 0 i.e. if no records were located for which email matches entered email
    {
        echo "<p><b>Login failed!</b>"; //display login error
        echo "<br>Email not recognised</p>";
        echo "<br><p> Go back to <a href=login.php>login</a></p>";

    }
    else{
        $arrayuser = mysqli_fetch_array($exeSQL); //create array of user for this email

        if ($arrayuser['userPassword'] <> $password) //if the pwd in the array matches the pwd entered in the form
        {
            echo "<p><b>Login failed!</b>"; //display login error
            echo "<br>Password not valid</p>";
            echo "<br><p> Go back to <a href=login.php>login</a></p>";
        }
        else{
            echo "<p><b>Login success</b></p>"; //display login success
            $_SESSION['userid'] = $arrayuser['userId']; //create session variable to store the user id
            $_SESSION['fname'] = $arrayuser['userFName']; //create session variable to store the user first name
            $_SESSION['sname'] = $arrayuser['userSName']; //create session variable to store the user surname
            $_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type
            echo "<p>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting

            if ($_SESSION['usertype']=='C') //if user type is C, they are a customer
            {
                echo "<p>User Type: homteq Customer</p>";
            }
            if ($_SESSION['usertype']=='A') //if user type is A, they are an admin
            {
                echo "<p>User type: homteq Administrator</p>";
            }

            echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>";
            echo "<br>View your <a href=basket.php>Smart Basket</a></p>";
        }
    }
}


// include head layout
include ("footer.html");

echo "</body>";
?>