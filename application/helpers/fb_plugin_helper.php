
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

function get_share_plugin($page_name) {
    $share_plugin_iframe = '<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2F';
    $share_plugin_iframe.=$page_name;
    $share_plugin_iframe.='&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=546431202104656" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>';
    return $share_plugin_iframe;

}
?>