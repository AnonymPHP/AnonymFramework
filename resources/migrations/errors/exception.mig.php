<!DOCTYPE html>
<html>
<head>
    <title>PHP Exception.s</title>

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
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="content">

        <h1 class="title" style="font-family:Open Sans, sans-serif;">AnonymFramework Uygulama İstinası</h1>
        <hr/>
        <b>{{ file }} Dosyasında Bir İstisna Yakalandı:</b>
        <hr/>
        <pre>Mesaj : {{ message }}</pre>
        <hr/>
        Satır : {{ line }}
        <hr/>
        Hata Kodu : {{ code }}
        <hr/>

        <p><h4>Trace:</h4></p>
        {{ trace }}

    </div>
</div>

</body>
</html>