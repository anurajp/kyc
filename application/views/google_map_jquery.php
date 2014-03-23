<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type='text/javascript' src='/js/jquery.ui.map.min.js'></script>
<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $('#map_canvas').gmap({center:'23.181,80.2514', zoom:5,'scrollwheel':false}).bind('init', function(evt, map) {
            //this.set('MarkerClusterer', new MarkerClusterer(this.get('map'), this.get('markers')));

            <?php foreach($gids_cord as $gid_cord):?>
                var gmap = $('#map_canvas').gmap('addMarker', {
                    html: '<h1><?php echo(base_url())?>index.php/games/get_game_div/<?php echo $gid_cord['gid'] ?></h1>',
                    title: "Click here to know more",
                    popup: true, 'position': <?php echo "'".$gid_cord['gcord']."'" ?> });
                gmap.click(function() {

                    $( "#marker_click_result" ).empty();
                    $('#marker_result_loading').show();
                    $.get("<?php echo(base_url())?>index.php/games/get_game_div/<?php echo $gid_cord['gid'] ?>",function(data,status){


                        $( "#marker_click_result" ).empty().append(data).fadeIn("slow");
                        FB.XFBML.parse();

                        $('html, body').animate({
                            scrollTop: parseInt($("#marker_click_result").offset().top)
                        }, 2000);
                        $('#marker_result_loading').hide();


                    });

                });

            <?php endforeach ?>
            //this.set('MarkerClusterer', new MarkerClusterer(this.get('map'), this.get('markers')));
            //$(this).gmap('set', 'MarkerClusterer', new MarkerClusterer(map, $(this).gmap('get', 'markers')));
            $(this).gmap('set', 'MarkerClusterer', new MarkerClusterer(map, $(this).gmap('get', 'markers')));
        });
        //var markerCluster = new MarkerClusterer($('#map_canvas').gmap('getMap'), $('#map_canvas').gmap('getMarkers'));
    });
</script>