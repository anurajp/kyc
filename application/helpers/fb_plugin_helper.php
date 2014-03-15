
<?php
function get_like_plugin($page_name) {
        $iframeName = "<iframe src=\"//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F";
        $iframeName .= $page_name;
        $iframeName .= "&amp;width&amp;height=558&amp;colorscheme=light&amp;";
        $iframeName .= "show_faces=true&amp;header=false&amp;stream=true&amp;show_border=true&amp;appId=546431202104656\"";
        $iframeName .="scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; height:558px;\" allowTransparency=\"true\"></iframe>";
        return $iframeName;

}

// Pass the unique name of game like : 'http://localhost/index.php/games/get_game_div/1' i.e get_baseurl+gamelink
function get_comment_plugin($page_name) {
    $comment_plugin_div = '<div style= "padding: 0px 0px 0px 80px" class="fb-comments" data-href="';
    $comment_plugin_div.= $page_name;
    $comment_plugin_div.= '" data-numposts="4" data-colorscheme="light"></div>';
    return $comment_plugin_div;

}

function get_like_candidate_plugin($page_name){
    $like_candidate_plugin = '<div class="fb-like" data-href=';
    $like_candidate_plugin.= $page_name;
    $like_candidate_plugin.='" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>';
    return $like_candidate_plugin;
}
function get_share_plugin($page_name) {
    $share_plugin_iframe = '<iframe src="//www.facebook.com/plugins/like.php?href=';
    $share_plugin_iframe.=$page_name;
    $share_plugin_iframe.='&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=546431202104656" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>';
    return $share_plugin_iframe;

}

function get_social_share_plugin(){
    return '
        <div class="addthis_toolbox addthis_default_style ">
            <a class="addthis_button_preferred_1"></a>
            <a class="addthis_button_preferred_2"></a>
            <a class="addthis_button_preferred_3"></a>
            <a class="addthis_button_preferred_4"></a>
            <a class="addthis_button_compact"></a>
            <a class="addthis_counter addthis_bubble_style"></a>
        </div>';

}
?>