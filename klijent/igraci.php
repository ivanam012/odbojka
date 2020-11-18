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

    <title>Reprezentacija</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="page">
        <div class="inside">
            <input type="text" hidden='true' id="trenutniId" value="0">
            <!-- left div -->
            <div class='left'>
                <div class="jumbotron jumbotron-fluid alignCenter">
                    <div class="container">
                        <h2 class="display-4">ODBOJKA | IGRACI</h1>
                            <p class="lead">Informacije o svakom igracu</p>
                    </div>
                </div>
                <table class="table table-bordered table-hover alignCenter" id="igraciTabela">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Pozicija</th>
                            <th scope="col">Pol</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <!-- right div -->
            <div class='right'>
                <div class="jumbotron alignCenter smaller">
                    <div class="container">
                        <h2 id='naslov_igrac' class="display-4">KREIRAJ IGRACA</h1>
                            <p class="lead">Unesite informacije o igracu</p>
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
                        <label for="lastName" class="col-sm-2 col-form-label">Prezime:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>
                    <div class='modifiedSelect'>
                        <label for='pozicija_select' name='label1'>Odaberite poziciju: </label>
                        <select id='pozicija_select' class='modifiedSelect'>

                        </select>
                    </div>
                    <div class='modifiedSelect'>
                        <label for='pol_select' name='label1'>Odaberite pol: </label>
                        <select id='pol_select' class='modifiedSelect'>
                            <option value="M">Muski</option>
                            <option value="Z">Zenski</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button id='sacuvajIgraca' class="btn btn-primary">Sacuvaj</button>
                            <button id='obrisiIgraca' hidden='true' class="btn btn-danger">Obrisi</button>
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
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function () {
            let selIgrac = undefined;
            $('#obrisiIgraca').click(function (e) {
                e.preventDefault();
                const id = $('#trenutniId').val();
                if (id == '0') {
                    alert('Igrac nije selektovan');
                    return;
                }
                $.post('../server/obrisiIgraca.php', { id: id }, function (data) {
                    if (data !== 'ok') {
                        alert(data);
                        return;
                    }
                    window.location.reload();
                })

            })
            $('#sacuvajIgraca').click(function (e) {
                e.preventDefault();
                const firstName = $('#firstName').val();
                const lastName = $('#lastName').val();
                const pozicija = $('#pozicija_select').val();
                const pol = $('#pol_select').val();
                const id = $('#trenutniId').val();
                let data = {
                    firstName: firstName,
                    lastName: lastName,
                    pozicija: pozicija,
                    pol: pol
                }
                if (id != '0') {
                    data = { ...data, id: id }
                    $.post('../server/izmeniIgraca.php', data, function (response) {
                        if (response !== 'ok') {
                            alert(response);
                        } else {
                            window.location.reload();
                        }

                    })
                } else {
                    $.post('../server/kreirajIgraca.php', data, function (response) {
                        if (response !== 'ok') {
                            alert(response);
                            return;
                        }
                        window.location.reload();
                    })
                }
            })

            ucitajPozicije();
            ucitajIgrace();


        })
        function ucitajIgrace() {
            $.getJSON('http://localhost:80/odbojka/rest/igrac', function (data) {
                console.log(data);
                if (!data.status) {
                    alert('Desila se greska');
                    return;
                }

                const tabela = $("#igraciTabela").DataTable({

                    "select": {
                        style: 'single'
                    },
                    "lengthMenu": [[3, 5, 10], [3, 5, 10]],
                    "data": data.data.map(function (element) {
                        return [element.id, element.ime, element.prezime, element.pozicija_naziv, element.pol];
                    })
                });
                tabela.on('select', function (e, dt, type, indexes) {
                   

                    const red = tabela.rows(indexes).data()[0];
                    const id = red[0];
                    const igrac = data.data.find(function (element) {
                        return element.id == id;
                    })
                    $('#trenutniId').val(id);
                    selIgrac = igrac;
                    promeniFormu(selIgrac.ime, selIgrac.prezime, selIgrac.pozicija, selIgrac.pol, false)
                    $('#naslov_igrac').html('IZMENI IGRACA');
                });
                tabela.on('deselect', function (e, dt, type, indexes) {
                   
                    selIgrac = undefined;
                    $('#trenutniId').val(0);
                    $('#naslov_igrac').html('KREIRAJ IGRACA');
                    promeniFormu();
                })
            });
        }
        function promeniFormu(ime = '', prezime = '', pozicija = undefined, pol = 'Z', sakrijDelete = true) {
            if (!pozicija) {
                pozicija = 0;
            }

            $('#pol_select').attr('disabled', !sakrijDelete);

            $('#firstName').val(ime);
            $('#lastName').val(prezime);
            $('#pol_select').val(pol);
            $('#obrisiIgraca').attr('hidden', sakrijDelete);


            $('#pozicija_select').val(pozicija);
        }
        function ucitajPozicije() {
            $.getJSON('http://localhost:80/odbojka/rest/pozicija', function (response) {
                if (!response.status) {
                    alert('Doslo je do greske');
                    return;
                }
                $('#pozicija_select').html('<option value=0 >Izaberite poziciju</option>')
                for (let pozicija of response.data) {
                    $('#pozicija_select').append(`
                    <option value='${pozicija.id}' >${pozicija.naziv}</option>
                    `)
                }
            })
        }
    </script>

</body>

</html>