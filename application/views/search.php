<div class="row">
    <form action="/search"  method="get" target="_top">
    <div class="col-lg-6">
        <div class="input-group ">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href = "#">State</a></li>
                    <li><a href = "#">District</a></li>
                    <li><a href = "#">Place</a></li>
                    <li><a href = "#">Candidate</a></li>
                </ul>
            </div><!-- /btn-group -->
            <input type="text"  name="q" class="form-control">

        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
        <button type="submit" class="btn btn-info">Search</button>

        </form>
    </div><!-- /.row -->

<!--
<div class = "row">

<table>
    <tr>
        <td><div class="btn-group">
                <button type="button" class="btn btn-default">1</button>
                <button type="button" class="btn btn-default">2</button>

                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Dropdown
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Dropdown link</a></li>
                        <li><a href="#">Dropdown link</a></li>
                    </ul>
                </div>
            </div></td>
        <td>
            <div  id="search-box">
                <form action="/search" id="search-form" method="get" target="_top">

                    <input id="search-text" name="q" placeholder="type here" type="text">
                    <button id="search-button" type="submit"><span>Search</span></button>
                </form>
            </div>
        </td>
    </tr>

    </table>
    </div>

<div class="row">
    <div class="span8">

            <h3>Candidate List</h3>
            <?php $comparisons =array( array("price"=>"34"),array("price"=>"34")) ?>
            <?php foreach ( $comparisons as $comparison ) : ?>
                <?php if ( !empty ( $comparison['price'] ) ) : ?>
                    <div class="well well-lg">
                    </div>
                    <br>
                <?php endif; ?>
            <?php endforeach; ?>

    </div>
    <div class="span4">
        <?php include('sidebar.php'); ?>
    </div>
</div>
-->
<?require_once('simple_html_dom.php'); ?>

<div class="bs-example">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item">

               <table style="width:100% ;height =50%">
                <tr>
                    <td style="width:70%">
                        <div >
                            <div class="page-header">
                                <p class="bg-info"><h1>Lucknow <small>7 April </small></h1></p>
                            </div>
                            <div class="container">

                                <?php $comparisons =array( array("price"=>"34"),array("price"=>"34"),array("price"=>"34")) ?>
                                <?php $viewDetails =  "viewdetails" ?>
                                <?php $viewDetailsCounters =  0 ?>
                                <?php $comaprisionTable = "<table>" ?>

                                <?php echo $comaprisionTable ?>

                                <?php foreach ( $comparisons as $comparison ) : ?>


                                    <?php if ( !empty ( $comparison['price'] ) ) : ?>

                                        <?php $viewDetailsCounters =  $viewDetailsCounters+1 ?>
                                        <?php $viewDetails.=$viewDetailsCounters ?>
                                        <?php $viewDetailsCollapse="#".$viewDetails ?>
                                        <?php
                                        //Wikipedia page to parse
                                        $html = file_get_html('https://en.wikipedia.org/wiki/Arvind_Kejriwal');
                                        $infoCard = $html->find ( 'table[class=infobox vcard]' );
                                        $infoCardTable = "";
                                        foreach ( $html->find ( 'table[class=infobox vcard]' ) as $element ){
                                            $infoCardTable.= $element;

                                        }

                                        $row = '';
                                        $count = count($comparisons);
                                        if($viewDetailsCounters%2 != 0 ){
                                            $row = "<tr>";

                                        }

                                        $row.= " <td>
                                <ul class=\"thumbnails\">
                                    <ol class=\"span5 offset2\">
                                    <div class=\"thumbnail\">
                                        <img class=\"img-rounded \" src=\"http://localhost/compare/j_admin/uploads/products/ArvindKejriwal2.jpg\" alt=\"Arvind Kejriwal \">

                                        <div class=\"caption\">
                                            <h4><u>Arvind Kejriwal</u></h4>

                                            <div class=\"bs-example\" style=\"padding-bottom: 10px;\">
                                            <a href=\"#\" class=\"btn btn-success\">Vote</a>
                                            <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=";
                                        $row.=$viewDetailsCollapse;
                                        $row.=">
                                            View Details
                                            </button>
                                        </div>
                                        <strong> Current Votes : 234</strong>
                                        <!-- Modal -->
                                        <div class=\"modal fade\" id=";


                                        $row.=$viewDetails;
                                        $row.=" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                                            <h4 class=\"modal-title\" id=\"myModalLabel\">Arvind Kejriwal</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>  $infoCardTable </p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            </div>
                            </div>
                            </ol>
                        </ul>
                    </td>";



                                        if($count==$viewDetailsCounters && $viewDetailsCounters%2 != 0){
                                            $row .= "<td></td>";
                                            $row .= "</tr>";
                                        }elseif($count==$viewDetailsCounters && $viewDetailsCounters%2 == 0){

                                            $row .= "</tr>";

                                        }
                                        elseif($viewDetailsCounters%2 == 0 ){
                                            //   echo $viewDetailsCounters;
                                            $row .= "</tr>";

                                        }
                                        $comaprisionTable.=$row;



                                        ?>





                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </div> <!-- /container -->
                            <?php

                            $comaprisionTable.="</table>";
                            echo $comaprisionTable;
                            ?>


                        </div> <!-- /comparison -->

                    </td>
                    <td style="width:30%">

                    </td>
                </tr>
                </table>




            </div>
            <div class="item active">
                <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNDQ0O2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
            </div>
            <div class="item">
                <img data-src="holder.js/900x500/auto/#555:#333/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojMzMzO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>




<table style="width:100%">
    <tr>
        <td style="width:70%">
            <div >
                <div class="page-header">
                  <p class="bg-info"><h1>Lucknow <small>7 April </small></h1></p>
                </div>
                <div class="container">

                <?php $comparisons =array( array("price"=>"34"),array("price"=>"34"),array("price"=>"34")) ?>
                <?php $viewDetails =  "viewdetails" ?>
                <?php $viewDetailsCounters =  0 ?>
                 <?php $comaprisionTable = "<table>" ?>

                <?php echo $comaprisionTable ?>

                <?php foreach ( $comparisons as $comparison ) : ?>


                    <?php if ( !empty ( $comparison['price'] ) ) : ?>
                        <?php $viewDetailsCounters =  $viewDetailsCounters+1 ?>
                        <?php $viewDetails.=$viewDetailsCounters ?>
                        <?php $viewDetailsCollapse="#".$viewDetails ?>
                        <?php
                        $row = '';
                        $count = count($comparisons);
                        if($viewDetailsCounters%2 != 0 ){
                            $row = "<tr>";

                        }

                        $row.= " <td>
                                <ul class=\"thumbnails\">
                                    <ol class=\"span5 offset2\">
                                    <div class=\"thumbnail\">
                                        <img class=\"img-rounded \" src=\"http://localhost/compare/j_admin/uploads/products/ArvindKejriwal2.jpg\" alt=\"Arvind Kejriwal \">

                                        <div class=\"caption\">
                                            <h4><u>Arvind Kejriwal</u></h4>

                                            <div class=\"bs-example\" style=\"padding-bottom: 10px;\">
                                            <a href=\"#\" class=\"btn btn-success\">Vote</a>
                                            <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=";
                        $row.=$viewDetailsCollapse;
                        $row.=">
                                            View Details
                                            </button>
                                        </div>
                                        <strong> Current Votes : 234</strong>
                                        <!-- Modal -->
                                        <div class=\"modal fade\" id=";


                        $row.=$viewDetails;
                        $row.=" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                                <div class=\"modal-dialog\">
                                    <div class=\"modal-content\">
                                        <div class=\"modal-header\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
                                            <h4 class=\"modal-title\" id=\"myModalLabel\">Arvind Kejriwal</h4>
                                        </div>
                                        <div class=\"modal-body\">
                                            <p>   Arvind Kejriwal is an Indian politician and former bureaucrat who served as the 7th Chief Minister of Delhi from 28 December 2013 to 14 February 2014. He is the leader of the Aam Aadmi Party.</p>
                                        </div>
                                        <div class=\"modal-footer\">
                                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            </div>
                            </div>
                            </ol>
                        </ul>
                    </td>";



                        if($count==$viewDetailsCounters && $viewDetailsCounters%2 != 0){
                            $row .= "<td></td>";
                            $row .= "</tr>";
                        }elseif($count==$viewDetailsCounters && $viewDetailsCounters%2 == 0){

                            $row .= "</tr>";

                        }
                        elseif($viewDetailsCounters%2 == 0 ){
                         //   echo $viewDetailsCounters;
                            $row .= "</tr>";

                        }
                        $comaprisionTable.=$row;



                        ?>





                    <?php endif; ?>

                <?php endforeach; ?>
    </div> <!-- /container -->
                <?php

                $comaprisionTable.="</table>";
               echo $comaprisionTable;
                ?>


            </div> <!-- /comparison -->

        </td>
        <td style="width:30%">
            <?php include('sidebar.php'); ?>
        </td>
    </tr>
</table>
