<script>
    $(document).ready(function(){
        $('#map_canvas').gmap({center:'23.181,80.2514', zoom:5,'scrollwheel':false}).bind('init', function(evt, map) {

            <?php foreach($gids_cord as $gid_cord):?>
            $('#map_canvas').gmap('addMarker', { 'foo': 'bar', 'position': <?php echo "'".$gid_cord['gcord']."'" ?> }).click(function() {
                $( "#marker_click_result" ).empty();
                $('#marker_result_loading').show();
                $.get("<?php echo(base_url())?>index.php/games/get_game_div/<?php echo $gid_cord['gid'] ?>",function(data,status){

                    $( "#marker_click_result" ).empty().append( data).fadeIn("slow");

                    $('html, body').animate({
                        scrollTop: parseInt($("#marker_click_result").offset().top)
                    }, 2000);
                    $('#marker_result_loading').hide();


                });

            });
            <?php endforeach ?>
        });
    });
</script>