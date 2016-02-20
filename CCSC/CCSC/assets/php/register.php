<?php
/**
 * Created by PhpStorm.
 * User: Kali
 * Date: 19/02/2016
 * Time: 19:32
 */

require_once("dbConfig.php");
if($user->is_loggedin()!=""){
    $user->redirect("memberpage.php");
}

if(isset($_POST['btn-signup'])){
    $username = trim($_POST['text_username']);
    $userpass = trim($_POST['text_password']);

    if($username == ""){
        $error[] = "Please provide an username!";
    }elseif ( strlen($username) > 6 ){
        $error[] = "Please provide an username no bigger than 6 characters!";
    }elseif ($userpass ==""){
        $error[] = "Please provide a password!";
    }elseif(strlen($userpass)<6){
        $error[] = "Password must be at least 6 alpha numerical characters";
    }else{
        try{
            $stmt = $dbConn->prepare("SELECT cc_memberID FROM cc_member WHERE cc_memberID=:username");
            $stmt->execute(array(':username'=>$username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['cc_memberID']==$username){
                $error[] = "Username already taken!";
            }
            else{
                if($user->register($fname, $lname, $username, $userpass)){
                    $user->redirect('register.php?joined');
                }
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans|Poiret+One' rel='stylesheet' type='text/css'>

    <link href="../css/main.css" rel="stylesheet" type="text/css">

    <title>CCSC - Register</title>
</head>
<body>
<!--- Header  --->
<div class="wrapper">

    <header id="header" class="alt reveal">
        <div>
            <h1><a href="../../index.html"></a> CCSC </h1>
            <nav id="nav">
                <ul>
                    <!--- navigation --->
                    <li><a href="../../index.html"> Home</a></li>
                    <li><a href="#"></a> Facilities </li>
                    <li><a href="#"></a> Memberships </li>
                    <li><a href="#"></a> Contact Us </li>
                    <li class="active"><a href="register.php"> Register </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">
        <h2> Members Sign Up </h2>
        <p> Not a member? Register down below. Already have an account? <a href="login.php" class="button special"> Login</a></p>

    </section>

    <section id="main" class="container">
        <section class="box special">
            <header class="major">
                <h2> Welcome to Coast City Sports Centre</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dignissim auctor arcu. Suspendisse ornare sit amet quam eget dictum. Maecenas lacus urna, rutrum vitae feugiat ut, convallis sed justo. Morbi aliquet laoreet ipsum, at volutpat odio molestie eget. Nam id hendrerit nibh</p>
                <!--- Registration form here --->
                <h2> Registration </h2>
                <hr>
                <section class="box">
                    <form method="post">

                        <?php
                        if(isset($error)){
                            foreach($error as $error) {
                                ?>
                                <div class="alert alert-danger">
                                    <i></i>&nbsp; <?php echo $error; ?> !
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <div class="row uniform 50%">
                            <div class="6u 12u(mobilep)">
                                <input type="text" name="txt_fname" id="fname" value placeholder="Firt Name">
                            </div>
                            <div class="6u 12u(mobilep)">
                                <input type="text" name="txt_lname" id="lname" value placeholder="Last Name">
                            </div>
                            <div class="12u">
                                <textarea name="txt_address" id="address" placeholder="Enter Your Address" rows="4"></textarea>
                            </div>
                            <div class="6u 12u(mobilep)">
                                <input type="text" name="txt_username" id="username" value placeholder="Username">
                            </div>
                            <div class="6u 12u(mobilep)">
                                <input type="password" name="txt_password" value placeholder="Password">
                            </div>




                        </div>

                        <div class="row uniform">
                            <div class="12u">
                                <ul class="actions">
                                    <li><input type="submit" value="Sign Up" class="button fit" name="btn-signup"></li>
                                </ul>
                            </div>
                        </div>

                    </form>

                </section>



            </header>
        </section>


        <footer id="footer">
            <ul class="copyright">
                <!--- footer  --->
                <li><a href="#">Credits</a></li>
                <li><a href="#"> About the Student</a></li>
                <li><a href="https://www.northumbria.ac.uk/"> Northumbria University</a> </li>

            </ul>
            <ul class="copyright">
                <li>© Anca Nisirius. All rights reserved.</li>
                <li> This is a prototype for Northumbria University</li>
                <li>Web Design and Development</li>
                <li><div>Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div> </li>
            </ul>
        </footer>
    </div>
</body>
</html>