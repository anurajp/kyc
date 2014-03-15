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

            var url = "http://localhost/kyc/index.php/games/render_drop_down_search/<?php echo $g_type; ?>/" + key + "/" + val;

            $.get(url, function(data,status){

                if(status == "success" && data.length != 0) {
                    $("#search_results").html(data);
                    $("#search_results").show();
                } else {
                    $("#search_results").hide();
                }
            });
        });




        // Attach a submit handler to the form
        $("#feedback-form").submit(function( event ) {

            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $form = $(this),
                pname = $form.find( "input[name='iname']" ).val(),
                pemail = $form.find( "input[name='iemail']" ).val(),
                pmsg = $form.find( "textarea[name='imsg']" ).val(),
                url = $form.attr( "action" );

            // Send the data using post
            var posting = $.post( url, { iname: pname, iemail: pemail, imsg: pmsg } );

            // Put the results in a div
            posting.done(function( data ) {
                $( "#feedback-form-result" ).empty().append( data );
            });
        });



    });

</script>