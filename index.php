<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

            <div class="tab" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a>Тест на знання</a>
                    </li>
                </ul>

                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active">
                        <form action="">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-main">Почати тест</button>
                        </div>
                            <input type="hidden" name="start" value="1">
                        </form>
                        <form class="form-horizontal" id="form" style="display: none;">

                            <div class="form-group">
                                <div class="form-control" id="question">aaaa?</div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-form1">Так</button>
                                <button type="submit" class="btn btn-default btn-form2">Ні</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<h3 class="hi" style="text-align: center"></h3>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>