<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 3:57 PM
 */

class Candidate {

    var $c_id;
    var $c_firstname;
    var $c_lastname;
    var $c_team;
    var $c_metadata = array();

    public function __construct($c_row, $c_metadata_rows) {
        $this->c_id = $c_row['cid'];
        $this->c_firstname = $c_row['cfirstname'];
        $this->c_lastname = $c_row['clastname'];
        $this->c_team = $c_row['cteam'];

        foreach($c_metadata_rows as $c_metadata_row) {
            $this->cMetadata[$c_metadata_row['src']] = $c_metadata_row['handle'];
        }

        log_message('debug', var_dump($this));
    }

}