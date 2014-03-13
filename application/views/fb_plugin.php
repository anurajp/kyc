<?php

class TestFb {

public function getLikePlugin($pageName) {
    $iframeName = "<iframe src=\"//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F";
    $iframeName .= $pageName;
    $iframeName .= "&amp;width&amp;height=558&amp;colorscheme=light&amp;";
    $iframeName .= "show_faces=true&amp;header=false&amp;stream=true&amp;show_border=true&amp;appId=546431202104656\"";
    $iframeName .="scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; height:558px;\" allowTransparency=\"true\"></iframe>";
    return $iframeName;
}
}
?>