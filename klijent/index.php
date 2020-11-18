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
                                <select id='pol' class='modifiedSelect' id='select1'>
                                    <option value="M">Muskarci</option>
                                    <option value="Z">Zene</option>
                                </select>

                            </div>
                            <div class='alignLeft modifiedSelect'>
                                <label for='select2' name='label2'>Godina:</label>
                                <select id='godina' class='modifiedSelect' id='select2'>

                                </select>
                            </div>
                            <img hidden='true' src="./img//bronze.png" id='medalja'></img>
                            <hr>
                        </div>

                        <div class="grid-item field">
                            <!-- first row of players -->
                            <div class='first-player' id='1-player'>

                            </div>
                            <div class="second-player" id='2-player'>

                            </div>
                            <div class="third-player" id='3-player'>

                            </div>
                            <!-- second row of players -->
                            <div class='fourth-player' id='4-player'>

                            </div>
                            <div class="fifth-player" id='5-player'>

                            </div>
                            <div class="sixth-player" id='6-player'>

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
            ucitajIgrace($('#godina').val(), $('#pol').val());
        })

        function ucitajIgrace(godina, pol) {
            $.getJSON(`http://localhost:80/odbojka/rest/reprezentacija/${godina}/igraci/${pol}`, function (data) {
                refreshIgrace();
                if (!data.status) {
                    return;
                }

                const medalja = data.data[0]?.medalja;

                if (medalja) {
                    const slika = $('#medalja');
                    if (medalja == 1) {
                        slika.attr('src', './img/gold.png');
                    }
                    if (medalja == 2) {
                        slika.attr('src', './img/silver.png');
                    }
                    if (medalja == 3) {
                        slika.attr('src', './img/bronze.png');
                    }
                    $('#medalja').attr('hidden', false);
                } else {
                    $('#medalja').attr('hidden', true);
                }
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
                    $('#trener').html('Trener: <i>ne postoji</i> ');
                }
                const izmena = igraci.filter(function (elem) {
                    return elem.prvi_tim == 0 && elem.pozicija != 7;
                });

                for (let element of izmena) {

                    $('#izmene').append(`
                        <tr>
                            <td>${element.ime}</td>
                            <td>${element.prezime}</td>
                        </tr>
                    `)
                };

                const niz = [1, 2, 3, 4, 5, 6];
                for (let broj of niz) {
                    const igracPom = prviTim.find(function (element) {
                        return element.pozicija == broj;
                    });
                    if (!igracPom) {
                        continue;
                    }
                    $(`#${broj}-player`).html(`
                    <div class="container-div">

<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header lowPadding">${igracPom.ime + ' ' + igracPom.prezime}</div>
    <div class="card-body noPaddingTop">
        <h8 class="card-title">${igracPom.pozicija_naziv}</h8>
        
    </div>
</div>


</div>
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
                const godina = $('#godina').val();
                const pol = $('#pol').val();



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
        function refreshIgrace() {
            const niz = [1, 2, 3, 4, 5, 6];
            for (let broj of niz) {
                $(`#${broj}-player`).html('');
            }
            $('#izmene').html('');
            $('#trener').html('Trener: <i>nema</i> ');
        }
    </script>

</body>

</html>