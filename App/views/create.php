<!DOCTYPE HTML>

<html>

<head>
    <title>Тестовое</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css"
          rel="stylesheet"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>


</head>

<body>


<div class="container">

    <?php if ($error) { ?>

        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>

    <?php } ?>


    <?php if ($short_link) { ?>

        <h2>Ссылка <?php echo $short_link; ?></h2>

    <?php } ?>


    <div class="row">
        <div class="col-md-8">

            <form method="POST">

                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input class="form-control" id="link" type="text" name="link" value="<?php echo $link; ?>">
                </div>


                <div class="form-group">
                    <label for="date_die">Дата жизни короткой ссылки</label>
                    <input class="form-control" id="date_die" type="text" name="date_die" value="">
                </div>


                <button type="submit" class="btn btn-default">Уменьшить</button>


            </form>


        </div>
        <div class="col-md-4">Sidebare</div>
    </div>


    <script>
        $(function () {
            $("#date_die").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                minDate: 0

            });
        });
    </script>


    <footer>
        <p>Copyright <?php echo date('Y', time()); ?> Ваш сайт</p>
    </footer>

</div>

</body>

</html>