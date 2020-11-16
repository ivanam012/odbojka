<?php
    include 'privatnaRuta.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="igraci.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" href="./DataTables-1.10.4/extensions/AutoFill/css/dataTables.autoFill.css" />
    <title>Reprezentacija</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="page">
        <div class="inside">
            <!-- left div -->
            <div class='left'>
                <div class="jumbotron jumbotron-fluid alignCenter">
                    <div class="container">
                        <h2 class="display-4">ODBOJKA | IGRACI</h1>
                            <p class="lead">Informacija i statistika o svakom igracu pojedinacno</p>
                    </div>
                </div>
                <table class="table table-bordered table-hover alignCenter" id="igraciTabela">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Pozicija</th>
                            <th scope="col">Pol</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <hr>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Add new player!</strong> You can add new players using form on right side.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!-- right div -->
            <div class='right'>
                <div class="jumbotron alignCenter smaller">
                    <div class="container">
                        <h2 class="display-4">NOVI IGRAC</h1>
                            <p class="lead">Unesite informacije o novom igracu</p>
                    </div>
                </div>
                <hr>
                <form>
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">Ime:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label" >Prezime:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pozicija
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Sacuvaj</button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script src="./DataTables-1.10.4/extensions/AutoFill/js/dataTables.autoFill.js"></script>
    <script>
        $(document).ready(function () {
            $.getJSON('http://localhost:80/odbojka/rest/igrac', function (data) {
                console.log(data);
                if (!data.status) {
                    alert('Desila se greska');
                    return;
                }
                $("#igraciTabela").dataTable({
                    "data": data.data.map(function (element, index) {
                        return [index + 1, element.ime, element.prezime, element.pozicija, element.pol];
                    })
                })
            })
        })


    </script>

</body>

</html>