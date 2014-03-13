<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
<!--
    Free Responsive Template by templatemo
    http://www.templatemo.com
-->
<html lang="en">
<head>

    <title>Know your candidate</title>
    <meta name="keywords" content="urbanic, responsive, bootstrap, fluid layout, orange, white, free website template, templatemo" />
    <meta name="description" content="Urbanic is free responsive template using Bootstrap which is compatible with mobile devices. This layout is provided by templatemo for free of charge." />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/css/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- Google Web Font Embed -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="/js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
    <link href="/css/templatemo_style.css"  rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="http://bxslider.com/lib/jquery.bxslider.css" type="text/css" />
    <script src="http://bxslider.com/lib/jquery.bxslider.js"></script>


    <meta charset=”utf-8”>
    <title>
        Welcome to KYC
    </title>
    </head>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css"></head>
<style type="text/css">

    #search-box {
        position: relative;
        width: 100%;
        margin: 0;
    }

    #search-form {
        height: 40px;
        border: 1px solid #999;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        background-color: #fff;
        overflow: hidden;
    }

    #search-text {
        font-size: 14px;
        color: #ddd;
        border-width: 0;
        background: transparent;
    }

    #search-box input[type="text"] {
        width: 1000px;
        padding: 11px 0 12px 1em;
        color: #333;
        outline: none;
    }

    #search-button {
        position: absolute;
        top: 0;
        right: 0;
        height: 42px;
        width: 80px;
        font-size: 14px;
        color: #fff;
        text-align: center;
        line-height: 42px;
        border-width: 0;
        background-color: #999;
        -webkit-border-radius: 0px 5px 5px 0px;
        -moz-border-radius: 0px 5px 5px 0px;
        border-radius: 0px 5px 5px 0px;
        cursor: pointer;
    }

    /* Comparision Chart */
    #price-comparison {
        border-collapse: collapse;
        width: 10       0%;
    }

    #comparison-image-cell {
        width: 60px;
    }

    .spacer {
        background: #e4e4e4;
        border: 1px solid #e4e4e4;
        height: 10px;
    }

    #comparison-header {
        background: #e4e4e4;
        border: 1px solid #e4e4e4;
        height: 30px;
    }

    #price-comparison td {
        border: 1px solid #e4e4e4;
        padding: 5px;
        text-align: center;
    }

    .merchant-image {
        height: 50px;
        width: 50px;
        background: #fff;
        padding: 2px;
        border: 1px solid #e4e4e4;
    }

    .merchant-name-td {
        font-size: 18px;
        font-weight: bold;
    }

    /* Sidebar */
    #sidebar {
        margin-top: 0px;
        width: 300px;
        float: right;
    }

    .modal-dialog {
        width: 800px; /* SET THE WIDTH OF THE MODAL */
        margin-right: auto;
        margin-left: auto;
    }









</style>

</head>

<body>

<div class="templatemo-top-bar" id="templatemo-top">
    <div class="container">
        <!--<div class="subheader">

        </div> -->
        <div class="subheader">
            <div id="phone" class="pull-left">
                <img src="/images/phone.png" alt="phone"/>
                +91-8105719832
            </div>
            <div id="email" class="pull-right">
                <img src="/images/email.png" alt="email"/>
                contact@website.com
            </div>
        </div>
    </div>
</div>
<div class="templatemo-top-menu">




    <div class="container">

        <div class="form-group search-form" >
            <form role="form">
                <select id="search_event_type" class="">
                    <option value="cprefix">Candidate</option>
                    <option value="location">Location</option>
                    <option value="city">City</option>
                    <option value="state">State</option>
                    <option value="zipcode">Zipcode</option>
                </select>

                <input id="search_field" class="col-lg-8" type="text" placeholder="Type here" autocomplete="off">
            </form>
            <div id="search_results" hidden="hidden" class="search_results">
            </div>

        </div>

        <!-- Static navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="" rel="nofollow"><img src="/images/kyc-logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 40px;">
                        <li><a href="#templatemo-top">HOME</a></li>
                        <li><a href="#templatemo-about">ABOUT</a></li>
                        <li><a href="#templatemo-portfolio">PORTFOLIO</a></li>
                        <li><a href="#templatemo-blog">BLOG</a></li>
                        <li><a href="#templatemo-contact">CONTACT</a></li>
                    </ul>
                </div><!--/.nav-collapse -->

            </div><!--/.container-fluid -->

        </div><!--/.navbar -->


    </div> <!-- /container -->
</div>


