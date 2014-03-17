<?php

function get_info_card($wiki_handle) {
    $html = file_get_html('https://en.wikipedia.org/wiki/'.$wiki_handle);
    $info_card = $html->find ( 'table[class=infobox vcard]' );
    $info_card_table = "";
    foreach ($info_card as $element ){
        $info_card_table.= $element;

    }
    return $info_card_table;
}


?>