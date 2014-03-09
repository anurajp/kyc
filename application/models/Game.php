<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 3:57 PM
 */


class Game {

    var $g_id;
    var $g_name;
    var $g_type;
    var $g_date;
    var $g_country;
    var $g_state;
    var $g_city;
    var $g_place;
    var $zipcode;
    var $winner_cid = null;
    var $candidates = array();

    public function __construct($g_row, $candidates) {
        $this->g_id = $g_row['gid'];
        $this->g_name = $g_row['gname'];
        $this->g_type = $g_row['gtype'];
        $this->g_date = $g_row['gdate'];
        $this->g_country = $g_row['gcountry'];
        $this->g_state = $g_row['gstate'];
        $this->g_city = $g_row['gcity'];
        $this->g_place = $g_row['gplace'];
        $this->zipcode = $g_row['zipcode'];
        $this->winner_cid = $g_row['winnercid'];
        $this->candidates = $candidates;

        log_message('debug', var_dump($this));
    }

}
?>