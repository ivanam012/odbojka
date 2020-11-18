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
                        <label for='igrac_select' name='label1'>Odaberite igraca: </label>
                        <select id='igrac_select' value='M' class='modifiedSelect'>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                        id='dodajUPrviTim'>Sacuvaj</button>
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
                            <div class='alignLeft modifiedSelect'>
                                <label for="godina">Godina</label>
                                <input type="number" id="godina" class='alignRight modifiedSelect' value='2020'>
                            </div>
                            <div class='alignRight modifiedSelect'>
                                <label for="pol">Pol</label>
                                <select value='Z' id="pol" class='alignRight modifiedSelect'>
                                    <option value="M">Muski</option>
                                    <option value="Z">Zenski</option>
                                </select>
                            </div>
                            <div class='alignRight modifiedSelect'>
                                <label for="medalja">Medalja</label>
                                <select id="medalja" class='alignRight modifiedSelect'>

                                </select>
                            </div>

                            <hr>
                        </div>

                        <div class="grid-item field">
                            <!-- first row of players -->
                            <div class='first-player' id='1-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='1'>Dodaj</button>
                                </div>


                            </div>
                            <div class="second-player" id='2-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='2'>Dodaj</button>
                                </div>



                            </div>
                            <div class="third-player" id='3-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='3'>Dodaj</button>
                                </div>


                            </div>
                            <!-- second row of players -->
                            <div class='fourth-player' id='4-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='4'>Dodaj</button>
                                </div>


                            </div>
                            <div class="fifth-player" id='5-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='5'>Dodaj</button>
                                </div>



                            </div>
                            <div class="sixth-player" id='6-player'>
                                <div class="container-div">
                                    <button data-toggle="modal" data-target='#exampleModal' class="btn btn-secondary"
                                        data-pozicija='6'>Dodaj</button>
                                </div>


                            </div>
                        </div>

                        <div class="grid-item secondRow verticalAlign">
                            <hr>
                            <div class='style'>
                                <div class='alignLeft modifiedSelect'>
                                    <label for='treneri_select' name='label1'>Odaberite trenera: </label>
                                    <select id='treneri_select' value='0' class='modifiedSelect'>

                                    </select>
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
                        id='dodajIzmenu'>
                        Dodaj
                    </button>
                    <button type="button" id='sacuvaj' class="btn btn-primary">Sacuvaj reprezentaciju</button>
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
        let treneri = [];
        $(document).ready(function () {




            $('#dodajUPrviTim').click(function (e) {
                const igracId = $('#igrac_select').val();
                const pol = $('#pol').val() == 'M';
                const niz = (pol) ? muskarci : zene;
                const igrac = niz.find(function (element) { return element.id == igracId });

                const pozicija = igrac.pozicija;
                prviTim[pozicija] = igrac;

                $(`#${pozicija}-player`).html(`
                <div class="container-div" >

<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header lowPadding">${igrac.ime + ' ' + igrac.prezime}</div>
    <div class="card-body noPaddingTop">
        <h8 class="card-title">${igrac.pozicija_naziv}</h8>
        <button data-toggle="modal" data-target='#exampleModal'
            class="btn btn-light btn-sm" data-pozicija='${pozicija}'
            class='izmeniDugme'>Izmeni</button>
    </div>
</div>


</div>
                `);
                napuniSelect(niz.filter(function (elem) {
                    return elem.pozicija != 7 && izmene.find(function (e1) { return e1.id == elem.id }) === undefined && prviTim.find(function (e1) { return e1 !== null && e1.id == elem.id }) === undefined;
                }), 'izmenaSelect')
            })


            ucitajMedalje();
            let izabraniPol = $("#pol").val();
            $("#pol").change(function (e) {
                izabraniPol = e.target.value;
                const niz = (izabraniPol == 'M') ? muskarci : zene;
                napuniSelect(niz, 'izmenaSelect');

            })
            $('#sacuvaj').click(function (e) {
                for (let igrac of prviTim) {
                    if (!igrac) {
                        alert('Niste dodali sve igrace u prvi tim');
                        return;
                    }
                }
                const data = {
                    godina: $('#godina').val(),
                    medalja: $('#medalja').val(),
                    pol: $('#pol').val(),
                    prviTim: prviTim.map(function (element) {
                        return element.id
                    }),
                    izmene: izmene.map(function (element) {
                        return element.id;
                    })
                }
                console.log(data);
                $.post('../server/kreirajReprezentaciju.php', data, function (data) {
                    alert(data);
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
                treneri = igraci.filter(function (elem) {
                    return elem.pozicija == 7
                });

                napuniSelect(treneri, 'treneri_select');
                $('#treneri_select').change(function (e) {
                    const trenerId = $('#treneri_select').val();
                    prviTim[0] = igraci.find(function (elem) { return elem.id == trenerId });
                })
                $('#exampleModal').on('show.bs.modal', function (e) {
                    const button = $(e.relatedTarget);
                    const pozicija = button.data('pozicija');

                    $('#igrac_select').html('');
                    const pol = $('#pol').val() == 'M';
                    const niz = (pol) ? muskarci : zene;
                    const opcije = niz.filter(function (element) {
                        return element.pozicija == pozicija && izmene.find(function (el) { return el.id == element.id }) === undefined;
                    });
                    for (let opcija of opcije) {
                        $('#igrac_select').append(`
                            <option value='${opcija.id}'>${opcija.ime + ' ' + opcija.prezime} </option>
                        `)
                    }
                })






                napuniSelect(muskarci, 'izmenaSelect');
                $('#dodajIzmenu').click(function (e) {
                    const pol = $('#pol').val() == 'M';
                    const niz = (pol) ? muskarci : zene;
                    const igrac = niz.find(function (elem) {
                        return elem.id == $('#izmenaSelect').val();

                    });
                    if (!igrac) {
                        return;
                    }
                    izmene.push(igrac);
                    napuniTabelu();
                    napuniSelect(niz.filter(function (elem) {
                        return elem.pozicija != 7 && izmene.find(function (e1) { return e1.id == elem.id }) === undefined && prviTim.find(function (e1) { return e1 !== null && e1.id == elem.id }) === undefined;
                    }), 'izmenaSelect');


                })




            })
        })

        function napuniSelect(niz, element) {
            $('#' + element).val(0);
            $('#' + element).html('<option value="0">Dodaj...</option>');
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
                            <button class='btn btn-danger' id='${elem.id}izmenaObrisi'>&times</button>
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
                    napuniSelect(niz.filter(function (elem) {
                        return elem.pozicija != 7 && izmene.find(function (e1) { return e1.id == elem.id }) === undefined && prviTim.find(function (e1) { return e1 !== null && e1.id == elem.id }) === undefined;
                    }), 'izmenaSelect');
                })
            }
        }
        function ucitajMedalje() {
            $.getJSON('http://localhost:80/odbojka/rest/medalja', function (data) {
                if (!data.status) {
                    alert('Doslo je do greske');
                    return;
                }
                $('#medalja').html('<option value=0 >Nisu osvojili</option>')
                for (let medalja of data.data) {
                    $('#medalja').append(`
                    <option value='${medalja.id}' >${medalja.naziv}</option>
                    `)
                }
            })
        }
    </script>

</body>

</html>