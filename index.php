
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="conntainer">
            <div class="jumbotron  row">
                <?php require 'header.php'; ?><!-- Requires header.php to generate the code for the header !-->
            </div>
            <div class="row col-lg-2 col-lg-offset-5">
                <h2 class="landingheader">Control Panel</h2>
            </div>
            <div class="landnghr row col-lg-2 col-lg-offset-4">
                <hr>
            </div>
            <div class="row"></div>
            <div class="row">


                <div class=" drivers col-lg-3 col-lg-offset-1">
                    <h3>Divers</h3>
                    <p>Here you can view our drivers, depending on your privileges you may also be able to add or delete a
                        driver as well as edit an individual drivers current details. </p>
                    </p>
                </div>
                <div class=" buses col-lg-3 col-lg-offset-1">
                    <h3>Buses</h3>  
                    <p>Here you can view our buses, depending on your privileges you may also be 
                        able to add or delete a bus as well as edit an individual buses details.
                        Please verify service changes before approving an edit. 
                    </p>
                </div>
                <div class=" garages col-lg-3 col-lg-offset-1">
                    <h3>Garages</h3>
                    <p>Here you can view our garages, depending on your privileges you may also be able to
                        add or delete a garage as well as edit an individual garages current details. 
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
