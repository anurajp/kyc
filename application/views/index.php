<!--<div class="slider">

</div>-->

<div class="templatemo-welcome" id="kyc-welcome">
    <div class="container">
        <div class="templatemo-slogan text-center container">
            <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Know your candidates</span>
            <p class="txt_slogan"><i>We let you discover new events like <a href="<?php echo(base_url())?>index.php/games/index/Loksabha">Loksabha elections 2014</a>, <a href="<?php echo(base_url())?>index.php/games/index/IPL">IPL 2014</a> etc and candidates. Vote your candidate to show your support</i></p>
            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.knowyourcandidate.in&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=546431202104656" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
            <!--
            <ul class="list-inline">
                <li>
                    <a href="https://www.facebook.com/pages/Know-Your-Candidate/238982119620030">
                        <span class="social-icon-fb"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="social-icon-rss"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="social-icon-twitter"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="social-icon-linkedin"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="social-icon-dribbble"></span>
                    </a>
                </li>
            </ul>-->

        </div>
    </div>


</div>

<div class="templatemo-service">

    <div class="container">
        <h3 class="templatemo-service-item-header"><?php echo $g_type; ?></h3>


        <ol class="breadcrumb">
            <li><span style="font-size: medium">States</span> </li>
            <?php foreach ($states as $state): ?>
                <li>
                    <a target="_blank" href="<?php echo(base_url())?>index.php/games/events/<?php echo $g_type; ?>/gstate/<?php echo $state['gstate']; ?>">
                        <span style="font-size: medium"><?php echo $state['gstate']; ?></span>
                    </a>
                </li>
            <?php endforeach ?>
        </ol>

        <ol class="breadcrumb">
            <li><span style="font-size: medium">Parties</span></li>
            <?php foreach ($teams as $team): ?>
                <li>
                    <a target="_blank" href="<?php echo(base_url())?>index.php/games/team/<?php echo $g_type; ?>/<?php echo $team['cteam']; ?>">
                        <span style="font-size: medium"><?php echo $team['cteam']; ?></span>
                    </a>
                </li>
            <?php endforeach ?>
        </ol>


        <div id="map_canvas" style="width:1000px;height:500px"></div>
        <img id="marker_result_loading" src="/images/loading.gif" style="width:100px;height:40px;align-self: center;margin-left: 500px;display: none">
        <div id="marker_click_result">

        </div>
    </div>


</div>








