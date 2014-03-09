<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 6:22 PM
 */

class Games extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('games_model');
    }

    public function view($g_type, $g_name) {

        //Input validation
        if(empty($g_type) or empty($g_name)) {
            show_404();
            return;
        }

        //Game query
        $criteria = array('gname' => $g_name, 'gtype' => $g_type);
        $games = $this->games_model->get_games($criteria);
        $data['games'] = $games;

        //Votes query
        foreach($games as $game) {
            foreach($game->candidates as $candidate) {
                $votes[$candidate->c_id] = $this->query_votes($game->g_id, $candidate->c_id);
            }
            $data['votes'][$game->g_id] = $votes;
        }

        if(empty($data['games'])) {
            show_404();
        }

        $this->load->view("show_games", $data);
    }

    private function query_votes($g_id, $c_id) {
        return $this->games_model->get_votes_count($g_id, $c_id);
    }

    public function search($g_type, $key , $value) {
        $q_criteria = array();

        if(!empty($key) and !empty($value) and !empty($g_type)) {
            $q_criteria[$key.' LIKE '] = $value.'%';
        } else {
                return;
        }

        $q_criteria['gtype'] = $g_type;
        $games = $this->games_model->get_games($q_criteria);
        $data['games'] = $games;

        if(empty($data['games'])) {
            show_404();
        }

        $this->load->view("show_games", $data);
    }

    public function vote($g_id, $u_id, $u_src, $c_id) {
        $result = $this->games_model->check_and_insert_vote($g_id, $u_src, $u_id, $c_id);
        $data['vote_success'] = $result;
        $this->load->view("show_games", $data);
    }

    public function candidate_game($g_type, $c_prefix) {
        $games = $this->games_model->get_games_for_candidate($g_type, $c_prefix);
        $data['games'] = $games;

        //Votes query
        foreach($games as $game) {
            foreach($game->candidates as $candidate) {
                $votes[$candidate->c_id] = $this->query_votes($game->g_id, $candidate->c_id);
            }
            $data['votes'][$game->g_id] = $votes;
        }

        if(empty($data['games'])) {
            show_404();
        }

        $this->load->view("show_games", $data);
    }


} 