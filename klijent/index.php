<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reprezentacijaCss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Reprezentacija</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="page">
        <div class="container">
            <div class="row align-items-start marginedTop">
                <div class="col-8 leftSide">
                    <div class="grid-container">
                        <div class="grid-item firstRow alignCenter">
                            <h2>National team: Serbia</h2>
                        </div>

                        <div class="grid-item field" >
                            <!-- first row of players -->
                            <div class='first-player'>
                                <?php include 'igrac.php'; ?>                            
                            </div>
                            <div class="second-player" >
                                <?php include 'igrac.php'; ?> 
                            </div>
                            <div class="third-player" >
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

                        <div class="grid-item secondRow" >
                            <h4><p>Coach:</p></h4>
                        </div>
                    </div>
                </div>
                <div class="col-4 rightSide">
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>