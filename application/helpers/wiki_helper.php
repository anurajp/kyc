<?php

function get_info_card($wiki_handle) {
    $html = file_get_html('https://en.wikipedia.org/wiki/'.urlencode($wiki_handle));
    //echo($html);
    $info_card = $html->find ( 'table[class=vcard]' );
    $info_card_table = "";
    foreach ($info_card as $element ){
        //$element = strip_tags($element,'<a>');
        $info_card_table.= $element;

    }
    return $info_card_table;
}


?>