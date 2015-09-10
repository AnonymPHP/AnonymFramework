<!DOCTYPE html>
<html>
<head>
    <title>PHP Exception.</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            color: #000;
            font-size: 64px;
            margin-bottom: 40px;
        }

        .title-little{
            font-size: 25px !important;
        }

        .title-red{
            color: #ff0000; !important;
        }
        hr{
            color:#ccc;
            background: #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">

        <p class="title">AnonymPHP Application Exception</p>

        <p class="title-little title">{{ message }}</p>
        <hr>

        <p class="title-little title title-red">In: {{ file }}, {{ line }}</p>

        <hr>
        <p class="title" style="font-size: 14px">{{ trace }}</p>

    </div>
</div>

</body>
</html>