<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 5:08 PM
 *
 * Model class having database queries
 */

require_once('Game.php');
require_once('Candidate.php');
class Games_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $criteria
     * @return array
     *
     * Returns Game aggregated data for a game search criteria
     */

    public function get_games($criteria) {
        $game_query = $this->db->get_where('Game', $criteria);
        $game_rows = $game_query->result_array();
        return $this->get_games_by_game_rows($game_rows);
    }

    private function get_games_by_game_rows($game_rows) {
        if(empty($game_rows)) {
            return array();
        }

        $games = array();
        foreach($game_rows as $game_row) {
            array_push($games, new Game($game_row, $this->get_candidates($game_row['gid'])));
        }

        return $games;
    }

    /**
     * @param $g_id
     * @return array
     *
     * Returns Candidate's aggregated data for a game
     */
    private function get_candidates($g_id) {
        $candidates_query = $this->db->query("select C.* FROM Candidates C, GameCandidates GC where GC.gid = ? and GC.cid = C.cid", array($g_id));
        $candidate_rows = $candidates_query->result_array();
        //log_message('debug', sizeof($candidate_rows), false);
        if(empty($candidate_rows)) {
            return array();
        }

        $candidates = array();
        foreach($candidate_rows as $candidate_row) {
            $c_md_query = $this->db->get_where('CandidateMetadata', array('cid' => $candidate_row['cid']));
            $c_md = $c_md_query->result_array();
            if(!empty($c_md)) {
                array_push($candidates, new Candidate($candidate_row, $c_md));
            }
        }

        return $candidates;
    }

    /**
     * @param $g_id
     * @param $c_id
     * @return int
     *
     * Returns votes for a game's candidate
     */
    public function get_votes_count($g_id, $c_id) {
        $count_query = $this->db->query("select count(*) as numVotes FROM VoteTracking where gid = ? and cid = ?", array($g_id, $c_id));
        return $count_query->row_array()['numVotes'];
    }

    /**
     * @param $g_id
     * @param $u_src
     * @param $u_id
     * @return bool
     *
     * Returns candidate whom a user voted for a game
     */
    public function get_vote($g_id, $u_src, $u_id) {
        $this->db->select('cid');
        $voteTracking_query = $this->db->get_where('VoteTracking', array('gid' => $g_id, 'uid' => $u_id, 'usrc' => $u_src));
        $votes_row = $voteTracking_query->row_array();
        return $votes_row['cid'];
    }

    /**
     * @param $g_id
     * @param $u_src
     * @param $u_id
     * @param $c_id
     * @return bool
     *
     * This method check for existing vote by a candidate, if there is a vote change or new vote then it adds a new
     * entry to VoteTracking db
     */
    public function check_and_insert_vote($g_id, $u_src, $u_id, $c_id) {
        $res_c_id = $this->get_vote($g_id, $u_src, $u_id);
        $to_insert = true;
        $to_delete = false;
        if(empty($res_c_id)) { //insert new vote
        } else if($res_c_id == $c_id) { //same vote, ignore
            $to_insert = false;
        } else { //change vote
            $to_delete = true;
        }

        if($to_delete) {
            $this->delete_vote($g_id, $u_src, $u_id);
        }

        if($to_insert) {
            $this->insert_vote($g_id, $u_src, $u_id, $c_id);
            return true;
        }

        return false;

    }

    /*
     * Database vote insert
     */
    private function insert_vote($g_id, $u_src, $u_id, $c_id) {
        $data = array(
            'gid' => $g_id ,
            'usrc' => $u_src ,
            'uid' => $u_id,
            'cid' => $c_id
        );

        $this->db->insert('VoteTracking', $data);
    }

    /*
     * Database vote delete
     */
    private function delete_vote($g_id, $u_src, $u_id) {
        $this->db->delete('VoteTracking', array('gid' => $g_id, 'uid' => $u_id));
    }

    /**
     * @param $g_type
     * @param $c_name_prefix
     * @return array
     *
     * Returns all matching candidate's games where candidate's name matches a prefix
     */
    public function get_games_for_candidate($g_type, $c_name_prefix) {
        $prefix_regex = $c_name_prefix . '%';
        $gids_query = $this->db->query('select DISTINCT(G.gid) from Game G where G.gtype  = ? and G.gid IN (select GC.gid from GameCandidates GC where GC.cid IN (select DISTINCT(C.cid) from Candidates C where C.cfirstname LIKE ? or C.clastname LIKE ?))', array($g_type, $prefix_regex, $prefix_regex));

        if($gids_query->num_rows() > 0) {
            $gids = array();

            foreach($gids_query->result_array() as $gid_row) {
                array_push($gids, $gid_row['gid']);
            }

            $this->db->where_in("gid", $gids);
            $game_query = $this->db->get("Game");
            $game_rows = $game_query->result_array();
            return $this->get_games_by_game_rows($game_rows);
        }

        return array();

    }
} 