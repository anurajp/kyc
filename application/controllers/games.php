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

    private function get_carousel_divs($candid_divs) {

        $divs = '';
        foreach($candid_divs as $candid_div) {
            $divs .= '<div class="slider">'.$candid_div.'</div>';
        }

        return $divs;
    }

    public function index() {

        //Game query
        $criteria = array('gpriority >= ' => '8');
        $games =  $this->games_model->get_games($criteria, 5);
        //echo var_dump($games);
        $div_containers = $this->generate_div_containers($games);
        $carousel_divs = $this->get_carousel_divs($div_containers);
        //echo var_dump($carousel_divs);

        $data['carousel_divs'] = $carousel_divs;
        $this->load->view("header");
        $this->load->view("index", $data);
        $this->load->view("footer");
    }

    public function view($g_type, $g_name) {
        /*
        $this->load->view("header");
        $this->load->view("index");
        $this->load->view("footer");

        return;*/

        //Input validation
        if(empty($g_type) or empty($g_name)) {
            show_404();
            return;
        }

        $games = $this->get_games($g_type, $g_name);
        //echo(var_dump($games));
        if(empty($games)) {
            show_404();
        }
        //echo(var_dump($games));
        $data['divs'] = $this->generate_div_containers($games);
        //echo(var_dump($data['divs']));
        $this->load->view("header");
        $this->load->view("comparision", $data);
        $this->load->view("footer");
    }

    private function get_td_thumbnail($candidate, $like_plugin, $wiki_info_card) {
        $candidate_name = $candidate->c_firstname.' '.$candidate->c_lastname;
        $candidate_team = $candidate->c_team;
        $img_url = $candidate->c_metadata['img'];
        $modal_id = 'modal_id_'.$candidate->c_id;
        $votes = $candidate->c_votes;
        $td_thumbnail = '<td>
                        <ul class="thumbnails">
                                <ol class="span5 offset2">
                                <div class="thumbnail">
                                        <img class="img-rounded candit_image" src="'.$img_url.'" alt="'.$candidate_name.'">
                                        <div class="caption">
                                            <h4><u>'.$candidate_name.'</u>('.$candidate_team.')</h4>
                                            <div class="bs-example" style="padding-bottom: 10px;">
                                                <a href="#" class="btn btn-success">Vote</a> <!-- todo -->
                                                <button class="btn btn-primary" data-toggle="modal" data-target=#'.$modal_id.'>
                                                    View Details
                                                </button>
                                            </div>
                                            <strong> Current Votes :'.$votes.'</strong>
                                            <!-- Modal -->
                                            <div class="modal fade candid-modal" id="'.$modal_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog candid-modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Candidate Info</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table>
                                                                <tr>
                                                                    <td>'.  $wiki_info_card.'</td>
                                                                    <td>'.  $like_plugin.'</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </ol>
                        </ul>
                    </td>';

        return $td_thumbnail;
    }


    private function get_div_container($table, $game) {
        $div = '<div class="container candid-div">
                    <div class="page-header container">
                        <p class="bg-info">
                            <h3>'.$game->g_type.': '.$game->g_place.' | '. $game->g_city.' | '.$game->g_state.'
                                <small>'.$game->g_date.'</small>
                            </h3>
                        </p>
                    </div>
                    <div>'
                        .$table.'
                    </div>
                </div>';
        return $div;

    }

    private function generate_div_containers($games) {
        $divs = array();

        foreach($games as $game) {
            $table = '<table id='.$game->g_name.'>'; //start of table generated for a game

            $tds = array();
            foreach($game->candidates as $candidate) { //Add  td and modal for every candidate

                $fb_handle = @$candidate->c_metadata['fb'];
                $wiki_handle = @$candidate->c_metadata['wiki'];
                $like_plugin = '';
                $wiki_info_card = '';

                if(!empty($fb_handle)) {
                    $like_plugin = get_like_plugin($fb_handle);
                }
                if(!empty($wiki_handle)) {
                    $wiki_info_card = get_info_card($wiki_handle);
                }
                $td = $this->get_td_thumbnail($candidate, $like_plugin, $wiki_info_card);
                array_push($tds, $td);
            }

            $candid_count = count($tds);
            $trs = '';
            for($i = 0; $i < $candid_count; $i += 4) {

                $trs .= '<tr>';
                $trs .= $tds[$i];
                if($i + 1 < $candid_count) {
                    $trs .= $tds[$i + 1];
                }
                if($i + 2 < $candid_count) {
                    $trs .= $tds[$i + 2];
                }
                if($i + 3 < $candid_count) {
                    $trs .= $tds[$i + 3];
                }
                $trs .= '</tr>';
            }
            $table .= $trs;
            $table .= '</table>';
            $div = $this->get_div_container($table, $game);
            array_push($divs, $div);
        }

        return $divs;

    }




    private function get_games($g_type, $g_name) {
        //Game query
        $criteria = array('gname' => $g_name, 'gtype' => $g_type);
        return $this->games_model->get_games($criteria);
    }



    public function query_votes($g_id, $c_id) {
        //return $this->games_model->get_votes_count($g_id, $c_id);
        echo($this->games_model->get_votes_count($g_id, $c_id));
        //echo('hi');
    }

    private function search_games($g_type, $key , $value) {
        $q_criteria = array();

        if(!empty($key) and !empty($value) and !empty($g_type)) {
            $q_criteria[$key.' LIKE '] = $value.'%';
        } else {
                return;
        }

        $q_criteria['gtype'] = $g_type;
        $games = $this->games_model->get_games($q_criteria);
        return $games;
    }

    public function vote($g_id, $u_id, $u_src, $c_id) {
        $result = $this->games_model->check_and_insert_vote($g_id, $u_src, $u_id, $c_id);
        $data['vote_success'] = $result;
        $this->load->view("show_games", $data);
    }

    public function candidate_game($g_type, $c_prefix) {
        $games = $this->games_model->get_games_for_candidate($g_type, $c_prefix);
        return $games;
        //$data['games'] = $games;
        /*
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

        return $data;//$this->load->view("show_games", $data);*/
    }

    public function ajax_test($g_type, $c_prefix) {
        log_message('debug', $g_type);
        log_message('debug', $c_prefix);
        echo($this->candidate_game($g_type, $c_prefix));

        //$data['ajax_result'] = $this->candidate_game($g_type, $c_prefix);

    }

    public function bootstrap() {
        $this->load->view("bootstrap");
    }

    public function render_drop_down_search($gtype, $key, $value) {

        $games = array();
        switch ($key)
        {
            case "cprefix":
                $games = $this->candidate_game($gtype, $value);
                break;
            case "location":
                $games = $this->search_games($gtype, 'gplace', $value);
                break;
            case "city":
                $games = $this->search_games($gtype, 'gcity', $value);
                break;
            case "state":
                $games = $this->search_games($gtype, 'gstate', $value);
                break;
            case "zipcode":
                $games = $this->search_games($gtype, 'zipcode', $value);
                break;
            default:
                return;
        }




        if(!empty($games)) {
            echo($this->get_games_table($games));
        }

    }



    private function get_games_table($games) {
        //
        // <tr id="searchResults_1">
        //            <td>Loksabha</td>
        //            <td>Lukhnow</td>
        //            <td>Arvind Kejriwal vs Narendra Modi</td>
        //            <td>07-04-2013</td>
        //            <td>...</td>
        //   </tr>


        $table_rows = '<table class="table table-hover search-table">';
        $table_rows .= '<tr>
                        <th>Candidates</th>
                        <th>Event</th>
                        <th>Venue</th>
                        <th>Date</th>
                        </tr>';
        foreach($games as $game) {
            $table_rows .= '<tr class="search_result_row" id="'.$game->g_name.'">';
            $cand_csv = '<td> <a href="http://localhost/kyc/index.php/games/view/Loksabha/'.$game->g_name.'">';
            $i = 0;
            $total = count($game->candidates);
            foreach($game->candidates as $candidate) {
                $i++;
                $cand_csv .= $candidate->c_firstname.' '.$candidate->c_lastname;
                if($i != $total) {
                    $cand_csv .= ' vs ';
                }
            }
            $cand_csv .= '</a></td>';
            $table_rows .= $cand_csv;
            $table_rows .= '<td>'.$game->g_type.'</td>'
                .'<td>'.$game->g_place.' '.$game->g_city.','.$game->g_state.'( '.$game->zipcode.')</td>'
                .'<td>'.$game->g_date.'</td>';
            $table_rows .= '</tr>';
        }
        $table_rows .= '</table>';
        return $table_rows;
    }
} 