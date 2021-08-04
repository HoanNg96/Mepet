<?php
session_start();

$connection = mysqli_connect("localhost","root","","mepet");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $level = $_POST['level'];


           /*  $query1 = "SELECT * FROM admin ORDER BY id DESC limit 1";
             $last_admin_id = mysqli_query($connection,$query1);
             $result = array();
             if($last_admin_id)
             {
                 while($row = mysqli_fetch_assoc($last_admin_id))
                 {
                     $result[] = $row;
                 }
             }
             $new_admin_id = $result[0]['id']+1;
            $query = "INSERT INTO admin (id,username,password,email,level) VALUES ($new_admin_id,'$username','$password','$email',2)";

            $query_run = mysqli_query($connection, $query); */

    $email_query = "SELECT * FROM admin WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query1 = "SELECT * FROM admin ORDER BY id DESC limit 1";
            $last_admin_id = mysqli_query($connection,$query1);
            $result = array();
            if($last_admin_id)
            {
                while($row = mysqli_fetch_assoc($last_admin_id))
                {
                    $result[] = $row;
                }
            }
            $new_admin_id = $result[0]['id']+1;
            $query = "INSERT INTO admin (id,username,password,email,level) VALUES ($new_admin_id,'$username','$password','$email',$level)";

            $query_run = mysqli_query($connection, $query);
            
            if($query_run)  
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";

                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

if(isset($_POST['addproductsbtn']))
{
    
}



if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $level = $_POST['edit_level'];

    $query = "UPDATE admin SET username='$username',email='$email',password='$password',level='$level' WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success'] = "Your data is Updated";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your data is Not Updated";
        header('Location: register.php');
    }
}




if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);
    if($query_run)
    {
        $_SESSION['success'] = "Your data is Deleted";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your data is Not Deleted";
        header('Location: register.php');
    }
}




if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email = '$email_login' AND password = '$password_login'";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else
    {
        if($password_login == null || $email_login == null){
            $_SESSION['status'] = 'Email or Password is empty';
            header('Location: login.php');
        }
        else{
            $_SESSION['status'] = 'Email or Password is incorrect';
            header('Location: login.php');
        }
    }
}


?>