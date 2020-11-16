<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reprezentacijaCss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Reprezentacija</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="page">
        <div class="container">
            <div class="row align-items-start marginedTop">
                <div class="col-8 leftSide">
                    <div class="grid-container">

                        <div class="grid-item firstRow verticalAlign">
                            <hr>

                            <div class='alignLeft modifiedSelect'>
                                <label for='select1' name='label1'>Pol: </label>
                                <select id='pol' value='M' class='modifiedSelect' id='select1'>
                                    <option value="M">Muskarci</option>
                                    <option value="Z">Zene</option>
                                </select>

                            </div>
                            <div class='alignRight modifiedSelect'>
                                <label for='select2' name='label2'>Godina:</label>
                                <select id='godina' class='modifiedSelect' id='select2'>

                                </select>
                            </div>
                            <img src="./img//bronze.png" id='medalja'></img>
                            <hr>
                        </div>

                        <div class="grid-item field">
                            <!-- first row of players -->
                            <div class='first-player'>
                                <?php include 'igrac.php'; ?>
                            </div>
                            <div class="second-player">
                                <?php include 'igrac.php'; ?>
                            </div>
                            <div class="third-player">
                                <?php include 'igrac.php'; ?>
                            </div>
                            <!-- second row of players -->
                            <div class='fourth-player'>
                                <?php include 'igrac.php'; ?>
                            </div>
                            <div class="fifth-player">
                                <?php include 'igrac.php'; ?>
                            </div>
                            <div class="sixth-player">
                                <?php include 'igrac.php'; ?>
                            </div>
                        </div>

                        <div class="grid-item secondRow verticalAlign">
                            <hr>
                            <h4>
                                <p id='trener'>Trener:</p>
                            </h4>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-4 rightSide">
                    <h3>Izmene</h3>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                            </tr>
                        </thead>
                        <tbody id='izmene'>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

            $('#godina').change(function (e) {
                promena();
            })
            $('#pol').change(function (e) {
                promena();
            })
            ucitajGodine();

        })

        function ucitajIgrace(godina, pol) {
            $.getJSON(`http://localhost:80/odbojka/rest/reprezentacija/${godina}/igraci/${pol}`, function (data) {
                if (!data.status) {
                    return;
                }
                console.log(data.data)
                const igraci = data.data;
                const prviTim = igraci.filter(function (elem) {
                    return elem.prvi_tim != 0 && elem.pozicija != 7;
                })
                const trener = igraci.find(function (element) {
                    return element.pozicija == 7;
                })
                if (trener) {
                    $('#trener').html(`Trener: ${trener.ime} ${trener.prezime}`)
                } else {
                    $('#trener').html('Trener: <i>nema</i> ');
                }
                const izmena = igraci.filter(function (elem) {
                    return elem.prvi_tim == 0 && elem.pozicija != 7;
                });
                $('#izmene').html('');
                for (let element of izmena) {
                    console.log('izmena')
                    $('#izmene').append(`
                        <tr>
                            <td>${element.ime}</td>
                            <td>${element.prezime}</td>
                        </tr>
                    `)
                }


            })
        }
        function promena() {
            ucitajIgrace($('#godina').val(), $('#pol').val());
        }

        function ucitajGodine() {
            $.getJSON('http://localhost:80/odbojka/rest/reprezentacija', function (data) {
                if (!data.status) {
                    return;
                }
                const godine = data.data.map(function (element) {
                    return element.godina;
                }).sort(function (a, b) {
                    return b - a;
                })

                for (let godina of godine) {
                    $('#godina').append(`
                        <option value='${godina}'>
                        ${godina}
                        </option
                    
                    `)
                }
                promena();
            })
        }
    </script>

</body>

</html>