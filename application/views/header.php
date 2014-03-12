<!DOCTYPE html>
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
    <link href="../../kyc/application/views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../../kyc/application/views/css/bootstrap-theme.min.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="../../kyc/application/views/css/app.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../css/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- Google Web Font Embed -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="../../kyc/application/views/js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
    <link href="../../kyc/application/views/css/templatemo_style.css"  rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../kyc/application/views/js/bootstrap.min.js"  type="text/javascript"></script>


    <script>
        $(document).ready(function(){
            $("#search_field").keyup(function(){ <!-- On type, call server. If output not empty add content to search table and unhide-->

                $("#search_results").html();

                var key = $("#search_event_type").val();
                var val = $("#search_field").val();

                if(val.length == 0) {
                    $("#search_results").hide();
                    return;
                }

                var url = "http://localhost/kyc/index.php/games/render_drop_down_search/Loksabha/" + key + "/" + val;

                $.get(url, function(data,status){

                    if(status == "success" && data.length != 0) {
                        $("#search_results").html(data);
                        $("#search_results").show();
                    } else {
                        $("#search_results").hide();
                    }
                });
            });
        });

    </script>


</head>

<body>

<div class="templatemo-top-bar" id="templatemo-top">
    <div class="container">
        <!--<div class="subheader">

        </div> -->
        <div class="subheader">
            <div id="phone" class="pull-left">
                <img src="images/phone.png" alt="phone"/>
                +91-8105719832
            </div>
            <div id="email" class="pull-right">
                <img src="images/email.png" alt="email"/>
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
                    <a class="navbar-brand" href="" rel="nofollow"><img src="images/kyc-logo.png" alt="logo"/></a>
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




