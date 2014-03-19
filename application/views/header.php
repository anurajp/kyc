<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
<!--
    Free Responsive Template by templatemo
    http://www.templatemo.com
-->

<head>

    <title>Know your candidate</title>
    <meta name="keywords" content="Loksabha election polls 2014, Loksabha vote 2014, Loksabha schedule 2014, Loksabha search candidates, Loksabha candidates, Loksabha head to head,
        Loksabha Constituencies, Loksabha Candidates party wise, Loksabha Candidates state wise,
        Bhartiya Janta Party(BJP), Aam Aadmi Party(AAP), Congress,
        BJP Loksabha Candidates, AAP Loksabha Candidates, Congress Loksabha Candidates, Janta Dal Loksabha candidates, BSP Loksabha candidates,
        know your candidate, compare candidate, IPL, Indian premier leauge"/>
    <meta name="description" content="Know you candidate is a platform which help you discover, compare and vote candidates for different events like Loksabha elections 2014, IPL 2014, General elections. You can view detailed information
        about your candidate, see poll results, search candidates. Currently we have enabled it for Loksabha 2014 where you can browse political parties and see head to head results by constituencies" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/images/kyc-favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/googlemaps.css" rel="stylesheet">

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



     <meta charset=”utf-8”>
    <title>
        Welcome to KYC
    </title>
</head>


<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-49050197-1', 'knowyourcandidate.in');
    ga('send', 'pageview');

</script>
<!-- Facebook JavaScript SDK -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=546431202104656";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Add This Social Share  Plugin https://www.addthis.com/get/sharing -->
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5324a9a41d6def65"></script>
<!-- AddThis Smart Layers BEGIN -->
<script type="text/javascript">
    addthis.layers({
        'theme' : 'transparent',
        'share' : {
            'position' : 'right',
            'numPreferredServices' : 6
        },
        'follow' : {
            'services' : [
                {'service': 'facebook', 'id': 'pages/Know-Your-Candidate/238982119620030'}
            ]
        }
    });
</script>
<!-- AddThis Smart Layers END -->

<div class="templatemo-top-bar" id="templatemo-top">
    <div class="container">
        <div class="subheader">

        </div>
        <div class="subheader">
            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FKnow-Your-Candidate%2F238982119620030&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=546431202104656" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
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
                    <a class="navbar-brand" href="<?php echo(base_url()) ?>" rel="nofollow"><img src="/images/kyc-logo.png" alt="Know Your Candidate"/></a>
                </div>
                <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                    <ul class="nav navbar-right navbar-nav" style="margin-top: 40px;">

                        <li><a href="<?php echo(base_url()) ?>index.php">HOME</a></li>
                        <li><a href="<?php echo(base_url()) ?>index.php#kyc-welcome">ABOUT</a></li>
                        <li><a href="<?php echo(base_url()) ?>index.php#kyc-contact">CONTACT</a></li>

                    </ul>
                </div><!--/.nav-collapse -->

            </div><!--/.container-fluid -->


        </div><!--/.navbar -->
    </div> <!-- /container -->


</div>




