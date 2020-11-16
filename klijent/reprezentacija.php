<?php
    include 'privatnaRuta.php';
?>

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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="100" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodaj igraca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body centered">
                    <div class='alignLeft modifiedSelect'>
                        <label for='select1' name='label1'>Odaberite igraca: </label>
                        <select id='igrac_select' value='M' class='modifiedSelect' id='select1'>
                            <option value="M">Muskarci</option>
                            <option value="Z">Zene</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary">Sacuvaj</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'header.php'; ?>
    <div class="page">
        <div class="container">
            <div class="row align-items-start marginedTop">
                <div class="col-8 leftSide">
                    <div class="grid-container">

                        <div class="grid-item firstRow verticalAlign">
                            <hr>
                            <div class='alignRight modifiedSelect'>
                                <label for="godina">Godina</label>
                                <input type="number" id="godina" class='alignRight modifiedSelect'>
                            </div>
                            <div class='alignRight modifiedSelect'>
                                <label for="pol">Pol</label>
                                <select value='Z' id="pol" class='alignRight modifiedSelect'>
                                    <option value="Z">Z</option>
                                    <option value="M">M</option>
                                </select>
                            </div>
                            <hr>
                        </div>

                        <div class="grid-item field">
                            <!-- first row of players -->
                            <div class='first-player'>
                                <button class="btn btn-secondary" type="submit" data-toggle="modal"
                                    data-target="#exampleModal">Dodaj</button>



                                <div hidden='true' class="container-div">
                                    <button>X</button>
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <p class="card-text">
                                                20<br>

                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="second-player">
                                <div hidden='true' class="container-div">
                                    <button class="btn btn-secondary" type="submit">Dodaj</button>
                                </div>

                                <div class="container-div">

                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <button class="btn btn-light btn-sm" type="submit"
                                                class='izmeniDugme'>Izmeni</button>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="third-player">
                                <button class="btn btn-secondary" type="submit">Dodaj</button>

                                <div hidden='true' class="container-div">
                                    <button>X</button>
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <p class="card-text">
                                                20<br>

                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- second row of players -->
                            <div class='fourth-player'>
                                <button class="btn btn-secondary" type="submit">Dodaj</button>

                                <div hidden='true' class="container-div">
                                    <button>X</button>
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <p class="card-text">
                                                20<br>

                                            </p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="fifth-player">
                                <button class="btn btn-secondary" type="submit">Dodaj</button>

                                <div hidden='true' class="container-div">
                                    <button>X</button>
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <p class="card-text">
                                                20<br>

                                            </p>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="sixth-player">
                                <button class="btn btn-secondary" type="submit" id='dugme'>Dodaj</button>

                                <div hidden='true' class="container-div">
                                    <button>X</button>
                                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                        <div class="card-header lowPadding">Ognjen Simic</div>
                                        <div class="card-body noPaddingTop">
                                            <h8 class="card-title">Libero</h8>
                                            <p class="card-text">
                                                20<br>

                                            </p>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="grid-item secondRow verticalAlign">
                            <hr>
                            <div class='style'>
                                <div class="dropdown">
                                    <label>Trener:</label>
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Trener neki
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                    <button type="button" id='sacuvaj' class="btn btn-primary">Sacuvaj</button>
                                </div>

                            </div>
                            <hr>
                        </div>

                    </div>
                </div>
                <div class="col-4 rightSide">
                    <h3>Izmene</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ime</th>
                                <th>Prezime</th>
                            </tr>
                        </thead>
                        <tbody id='izmeneTabela'>

                        </tbody>
                    </table>
                    <br>
                    <select id="izmenaSelect"></select>

                    <hr>
                    <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false"
                        id='dodajZamenu'>
                        Dodaj
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script>
        let izmene = [];
        const prviTim = [];
        for (let i of [0, 1, 2, 3, 4, 5, 6]) {
            prviTim[i] = null;
        }
        let muskarci = [];
        let zene = [];
        $(document).ready(function () {
            let izabraniPol = $("#pol").val();
            $("#pol").change(function (e) {
                izabraniPol = e.target.value;
            })
            $('#sacuvaj').click(function (e) {
                for (let igrac of prviTim) {
                    if (!igrac) {
                        alert('Niste dodali sve igrace u prvi tim');
                        return;
                    }
                }
                $.post('', {
                    godina: $('#godina').val(),
                    prviTim: prviTim.map(function (element) {
                        return element.id
                    }),
                    izmene: izmene.map(function (element) {
                        return element.id;
                    })
                })
            })

            $.getJSON('http://localhost:80/odbojka/rest/igrac', function (data) {
                if (!data.status) {
                    alert('Doslo je do greske');
                    return;
                }


                const igraci = data.data;
                muskarci = igraci.filter(function (elem) {
                    return elem.pol === 'M' && elem.poz != 7
                })
                zene = igraci.filter(function (elem) {
                    return elem.pol === 'Z' && elem.poz != 7
                });
                const treneri = igraci.filter(function (elem) {
                    return elem.poz == 7
                });
                napuniSelect(zene, 'izmenaSelect');
                $('#dodajIzmenu').click(function (e) {
                    const pol = $('#pol').val() == 'M';
                    const niz = (pol) ? muskarci : zene;
                    const igrac = niz.find(function (elem) {
                        return elem.id == $('#izmenaSelect').val();

                    });
                    izmene.push(igrac);
                    napuniTabelu();
                    napuniSelect(niz.filter(function (elem1) {
                        return !izmene.find(function (elem2) {
                            return elem1.id == elem2.id;
                        })
                    }), 'izmenaSelect');
                })
            })
        })

        function napuniSelect(niz, element) {

            $('#' + element).html('');
            for (let elem of niz) {
                $('#' + element).append(`
                    <option value='${elem.id}'>${elem.ime + ' ' + elem.prezime}</option>
                `)
            }
        }
        function napuniTabelu() {
            $('#izmeneTabela').html('');
            for (let elem of izmene) {
                $('#izmeneTabela').append(`
                    <tr>    
                        <td>${elem.ime}</td>
                        <td>${elem.prezime}</td>
                        <td>
                            <button id='${elem.id}izmenaObrisi'>X</button>
                        </td>
                    </tr>
                `);
                $(`#${elem.id}izmenaObrisi`).click(function () {
                    izmene = izmene.filter(function (element) {
                        return element.id != elem.id;
                    });
                    napuniTabelu();
                    const pol = $('#pol').val() == 'M';
                    const niz = (pol) ? muskarci : zene;
                    napuniSelect(niz.filter(function (elem1) {
                        return !izmene.find(function (elem2) {
                            return elem1.id == elem2.id;
                        })
                    }), 'izmenaSelect');
                })
            }
        }
    </script>

</body>

</html>