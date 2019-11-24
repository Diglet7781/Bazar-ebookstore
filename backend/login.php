
<?php
   // session_start();

    require_once "functions/validate.php";
    require_once "dblogin.php";
    if(isset($_POST['submitSignIn'])){
        $username=test_input($_POST['username']);
        $password=test_input($_POST['password']);
        if($username=="" || $password==""){
        header("Location: ../frontend/error.php");
        }else{

        //creating conncetion to the db
        $connect= createConn();
        $query="SELECT * From user where username='$username';";
        $result= $connect->query($query);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
           if (password_verify($password,$row['password']))
           {
               session_start();
              $_SESSION['username']=$row['username'];
              $type= $_SESSION['type']=$row['accountType'];
              $_SESSION['userId']=$row['userId'];

                    switch ($type)
                                    {
                                        case 'Seller':
                                         header('Location:../frontend/homePage.php');
                                        exit();
                                        case 'Buyer':
                                        header('Location:../frontend/homePage.php');
                                        exit();
                                        default:
                                        header("Location:viewHomepage.php");
                                    }
            }
            else{
              echo "Login Failed";
          header("Location:../frontend/userAccess.php");
                }
            }
            else{
              echo "Login Failed";
          header("Location:../frontend/userAccess.php");
             }
         }

        }
    ?>
