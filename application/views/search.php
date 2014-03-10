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
<table>
    <tr>
        <td>
            <div class="comparison">
                <h3>Candidate List</h3>
                <?php $comparisons =array( array("price"=>"34"),array("price"=>"34"),array("price"=>"34")) ?>
                <?php $viewDetails =  "viewdetails" ?>
                <?php $viewDetailsCounters =  0 ?>
                <?php foreach ( $comparisons as $comparison ) : ?>
                    <?php if ( !empty ( $comparison['price'] ) ) : ?>
                        <?php $viewDetailsCounters =  $viewDetailsCounters+1 ?>
                        <?php $viewDetails.=$viewDetailsCounters ?>
                        <?php $viewDetailsCollapse="#".$viewDetails ?>
                <div class="container">
                    <ul class="thumbnails">
                        <ol class="span5 offset2">
                            <div class="thumbnail">
                                <div class = "col-md-4"
                                <img class="img-rounded pull-left" src="http://localhost/compare/j_admin/uploads/products/ArvindKejriwal2.jpg" alt="Arvind Kejriwal ">
</div>  
                                <div class=" col4 caption">
                                    <h5>Arvind Kejriwal</h5>
                                    <p>Arvind Kejriwal is an Indian politician and former bureaucrat who served as the 7th Chief Minister of Delhi from 28 December 2013 to 14 February 2014. He is the leader of the Aam Aadmi Party.</p>
                                    <p class="collapse" id="<?php echo  $viewDetails ?>">Kejriwal is a graduate of the Indian Institute of Technology Kharagpur. He worked for the Indian Revenue Service (IRS) as a Joint Commissioner in the Income Tax Department. He is known for his efforts to enact and implement the Right to Information Act (RTI) at the grassroots level and his role in drafting a proposed Jan Lokpal Bill. </p>
                                    <p><a class="btn btn-primary" data-toggle="collapse" data-target="<?php echo  $viewDetailsCollapse ?>">View details &raquo;</a></p>
                                    <p><a href="#" class="btn btn-success">Vote</a></p>
                                </div>
                            </div>
                        </ol>
                    </ul>
                </div> <!-- /container -->

                    <?php endif; ?>
                <?php endforeach; ?>

            </div> <!-- /comparison -->

        </td>
        <td valign = "top" >
            <?php include('sidebar.php'); ?>
        </td>
    </tr>
</table>



<!--
<div class="comparison">
    <h3>Candidate List</h3>
    <?php $comparisons =array( array("price"=>"34"),array("price"=>"34")) ?>
    <table>
     <tr>
         <td valign="top">
             <div class="well well-lg">
             <?php foreach ( $comparisons as $comparison ) : ?>

     <table  class="table   ">


          <?php if ( !empty ( $comparison['price'] ) ) : ?>
                <tr>
                    <td><img class="merchant-image"  src="http://localhost/compare/j_admin/uploads/products/ArvindKejriwal2.jpg" alt="Arvind Kejriw" /></td>

                    <td rowspan =2><?php echo "Profile" ?></td>
                    <td rowspan =2 ><p><?php echo "123" ?></p></td>
                </tr>
                <tr>
                <td class="merchant-name-td"><?php echo "Arvind Kejriwal" ?></td>
                </tr>
              <tr class="spacer"><td></td><td></td><td></td></tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
   </div></td>


     </tr>
    </table>

</div>



-->