<!DOCTYPE html>
<html>
<head>
    <title>AnonymPHP</title>

    <link rel="stylesheet" href="{{ asset('bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body data-spy="scroll" data-target=".navMenuCollapse">

<div id="wrap">

    <!-- NAVIGATION -->
    <!-- SUBSCRIBE HALF LEFT BLOCK --><!-- FOOTER -->
    <!-- NAVIGATION -->
    <nav class="navbar bg-color3">
        <div class="container">
            <a class="navbar-brand goto" href="#"><img height="32" alt="Your logo" src="{{ asset('logo.png') }}"></a>
            <button class="round-toggle navbar-toggle menu-collapse-btn collapsed" data-toggle="collapse"
                    data-target=".navMenuCollapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span></button>
            <div class="collapse navbar-collapse navMenuCollapse">
                <ul class="nav">
                    <li><a href="http://kophack.com/documantation">Documantation</a></li>
                </ul>
            </div>
        </div>
    </nav><!-- TEXT 1COL BLOCK -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <div class="col-lg-12 pull-left">
                            <img src="{{ asset('header.png') }}" alt="AnonymPHP Framework" height="128px" width="128px">
                        </div>

                        <div class="col-lg-12 pull-left" style="margin-top: 20px;">
                            <h2>AnonymPHP Framework</h2>.
                        </div>
                        <h6 class="sub-title">The best PHP Framework</h6>

                        <div class="col-lg-12 pull-left">
                            <a href="http://kophack.com" class="btn btn-default"
                                 style="margin-top:20px; border:1px solid #ABB2B5; color: #000;padding-right: 20px;padding-left: 20px;">
                                See More
                            </a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
