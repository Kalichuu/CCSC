

<?php
/**
 * Created by PhpStorm.
 * User: Kali
 * Date: 19/02/2016
 * Time: 14:30
 */

require_once("dbConfig.php");

    if($user->is_loggedin()!="") {
        $user->redirect("memberpage.php");
    }

    if(isset($_POST['btn-login'])){
        $username = $_POST['text_username'];
        $userpass = $_POST['text_password'];

        if($user->login($username, $userpass)){
            $user->redirect('memberpage.php');
        }
        else{
            $error = "Incorrect username or password";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans|Poiret+One' rel='stylesheet' type='text/css'>

    <link href="../css/main.css" rel="stylesheet" type="text/css">

    <title>CCSC - Login</title>
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
                    <li><a href="../../index.html"> Home</a> </li>
                    <li><a href="#"></a> Facilities </li>
                    <li><a href="#"></a> Memberships </li>
                    <li><a href="#"></a> Contact Us </li>
                    <li><a href="login.php" class="active"> Login </a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="banner">
        <h2>Coast City Sports Centre - Login </h2>
        <p>Do not have an account? <a href="assets/php/register.php" class="button"> Register Here</a></p>

    </section>

    <section id="main" class="container">
        <section class="box special">
            <header class="major">
                <h2> Welcome to Coast City Sports Centre</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dignissim auctor arcu. Suspendisse ornare sit amet quam eget dictum. Maecenas lacus urna, rutrum vitae feugiat ut, convallis sed justo. Morbi aliquet laoreet ipsum, at volutpat odio molestie eget. Nam id hendrerit nibh</p>
                <!--- Registration form here --->
                <h2> Sign In </h2>
                <hr>
                <section class="box">
                    <form method="post">

                        <?php
                        if(isset($error)){
                            ?>
                            <div class="alert alert-danger">
                                <i></i>&nbsp; <?php echo $error; ?> !
                            </div>
                            <?php
                        }
                        ?>

                        <div class="row uniform 50%">
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
                                    <li><input type="button" value="Login"></li>
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




