<?php include('ads/flipkart_horizontal.php') ?>

<div class="container" style="padding: 30px">
    <?php echo(get_social_share_plugin()); ?>


    <!--INFOLINKS_OFF-->
    <div class="icon-font" style="font-size: small; font-family: Arial">

            <?php
                echo '<h2>'.$title.' '.get_like_candidate_plugin(current_url()).'</h2>';
                if(!empty($team_details)) {
                    echo $team_details;
                }
            ?>

    </div>
    </br>
    <!--INFOLINKS_ON-->
    <?php echo $events ?>
</div>

<?php include('ads/amazon_horizontal_banner.php') ?>
<?php include('ads/infolinks.php') ?>