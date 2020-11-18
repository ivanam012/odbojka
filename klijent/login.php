<?php 
 if(session_status()!==PHP_SESSION_ACTIVE)
    session_start();
    if(isset($_SESSION["korisnik_id"])){

        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Volleyball APP - Login</title>
</head>

<body>
    <div id="centralDiv">
        <div class="centerDiv">

            <h1>Sign In</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button class="btn btn-primary" id='signInButton'>Sign in</button>
                <button class="btn btn-secondary" id="signUpButton">Sign up</button>
            </form>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#signUpButton").click(function (e) {
                e.preventDefault();
                window.location.replace('registracija.php');
            });
            $('#signInButton').click(function (e) {
                e.preventDefault();
                $.post('../server/login.php', { username: $('#username').val(), password: $('#password').val() }, function (data) {
                    
                    if (data !== 'ok') {
                        alert(data);
                        return;
                    }
                    window.location.replace('index.php');
                })
            })
        })
    </script>
</body>

</html>