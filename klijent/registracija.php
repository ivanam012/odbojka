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

            <h1>Registracija</h1>
            <hr>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName"><b>Ime</b></label>
                        <input type="text" class="form-control" id="firstName" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName"><b>Prezime</b></label>
                        <input type="text" class="form-control" id="lastName" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username"><b>Korisnicko ime</b></label>
                    <input type="text" class="form-control" id="username" placeholder="Unesite korisnicko ime..."
                        required>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password"><b>Sifra</b></label>
                        <input type="email" class="form-control" id="password" required>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="repeatPassword"><b>Ponovite sifru</b></label>
                        <input type="password" class="form-control" id="repeatPassword" required>

                    </div>
                </div>
                <button type="submit" id='Registracija' class="btn btn-primary btn-lg btn-block">Registracija</button>
            </form>
        </div>
    </div>


    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script>
        $('#Registracija').click(function (e) {
            e.preventDefault();
            const username = $('#username').val();
            const firstName = $('#firstName').val();
            const lastName = $('#lastName').val();
            const password = $('#password').val();
            const repeatPassword = $('#repeatPassword').val();
            if (password !== repeatPassword) {
                alert('niste uneli istu sifru');
                return;
            }
            $.post('../server/registracija.php', { username: username, password: password, firstName: firstName, lastName: lastName }, function (data) {
                
                if (data !== 'ok') {
                    alert(data);
                    return;
                }
                window.location.replace('index.php');
            })
        })

    </script>
</body>

</html>