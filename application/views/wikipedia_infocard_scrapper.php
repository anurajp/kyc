

<?php
//The folder where you uploaded simple_html_dom.php
require_once('simple_html_dom.php');

//Wikipedia page to parse
$html = file_get_html('https://en.wikipedia.org/wiki/Arvind_Kejriwal');
$infoCard = $html->find ( 'table[class=infobox vcard]' );
$infoCardRow = "<div><table>";

foreach ( $html->find ( 'table[class=infobox vcard]' ) as $element ) {

   // echo $element;

    $cells = $element->find('td');

    $i = 0;

    foreach($cells as $cell) {


        $left[$i] = $cell->plaintext;

        if (!(empty($left[$i]))) {

            $i = $i + 1;

        }

    }


    $cells = $element->find('th');

    $i = 0;

    foreach($cells as $cell) {

        $right[$i] = $cell->plaintext;

        if (!(empty($right[$i]))) {

            $i = $i + 1;

        }

    }

    $i=0;
    for ($x=0; $x<count($right); $x++){
        $infoCardRow.="<tr><td>";
        echo $right[$x];
        $infoCardRow.=$right[$x];
        $infoCardRow.="</td><td>";
        $infoCardRow.=$left[$x];
        $infoCardRow.="</td></tr>";
    }



    print_r ($right);

    echo "<br><br><br>";

    print_r ($left);


}

$infoCardRow.= "<tr>1<td></td><td>2</td></tr></tr></table>Balle</div>";
echo $infoCardRow;
?>