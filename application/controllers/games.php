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
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
    }

    private function get_carousel_divs($candid_divs) {

        $divs = '';
        foreach($candid_divs as $candid_div) {
            $divs .= '<div>'.$candid_div.'</div>';
        }

        return $divs;
    }

    public function index($g_type = 'Loksabha') {

        //Game query
        $criteria = array('gpriority >= ' => '8');
        $games =  $this->games_model->get_games($criteria, 5);

        $gods = $this->generate_div_containers($games);

        $states = $this->games_model->get_game_field_values($g_type, 'gstate', true);
        $teams = $this->games_model->get_distinct_teams($g_type);
        $gids_cord = $this->games_model->get_game_field_values($g_type, 'gcord', false);
        //$gids_cord = $this->games_model->get_cord('Loksabha');
        $data['states'] = $states;
        $data['gids_cord'] = $gids_cord;
        $data['g_type'] = $g_type;
        $data['gods'] = $gods;
        $data['teams'] = $teams;
        $data['title'] = 'Know Your Candidate '. $g_type . ' : Search, Browse and Vote Candidates';
        $this->load->view("header", $data);
        $this->load->view("index", $data);
        $this->load->view("footer");
        $this->load->view("google_map_jquery", $data);
        $this->load->view("app_jquery", $data);

        $this->output->cache(720);
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
        $g_name = urldecode($g_name);

        $games = $this->get_games($g_type, $g_name);

        //echo(var_dump($games));
        if(empty($games)) {
            show_404();
        }
        //echo(var_dump($games));
        $data['divs'] = $this->generate_div_containers($games);
        $data['g_type'] = $g_type;
        $data['title'] = $g_type . ' '. str_replace('_', ' ', $g_name);
        //echo(var_dump($data['divs']));
        $this->load->view("header", $data);
        $this->load->view("comparision", $data);
        $this->load->view("footer");
        $this->load->view("app_jquery", $data);
        $this->output->cache(720);
    }

    public function candidate($g_type, $g_name, $candidate) {
        $this->view($g_type,$g_name);
    }

    public function team($g_type, $team) {
        /*
        $this->load->view("header");
        $this->load->view("index");
        $this->load->view("footer");

        return;*/

        $team = urldecode($team);

        //Input validation
        if(empty($g_type) or empty($team)) {
            show_404();
            return;
        }
        $metadata['team_details'] = $this->games_model->get_value($team);
        $games = $this->games_model->get_games_by_team($g_type, $team);
        $title = $team.' '.$g_type.' Candidates head to head';
        $this->display_events($games, $g_type, $title, $metadata);
    }



    private function display_events($games, $g_type, $title, $metadata) {
        if(!empty($metadata) && !empty($metadata['team_details'])) {
            $data['team_details'] = $metadata['team_details'];
        }
        $games_table = '<h2 class="container"> Sorry! No results found </h2>';
        if(!empty($games)) {
            $games_table = $this->get_games_table($games, $g_type);
        }
        $data['events'] = $games_table;
        $data['g_type'] = $g_type;
        $data['title'] = $title;
        $this->load->view("header", $data);
        $this->load->view("events", $data);
        $this->load->view("footer");
        $this->load->view("app_jquery", $data);
        $this->output->cache(120);
    }

    private function get_td_thumbnail($game,$candidate, $like_plugin, $wiki_info_card, $blurb) {

        $cache_result = $this->cache->file->get('candidate_td_thumbnail_'.$candidate->c_id);
        if ( !empty($cache_result))
        {
            //echo('Cache hit: ' . $candidate->c_id);
            return $cache_result;
        }

        $candidate_vote_url = base_url().'index.php/games/candidate/'.$game->g_type.'/'.$game->g_name.'/'.$candidate->c_id;
        $candidate_name = $candidate->c_firstname.' '.$candidate->c_lastname;
        $candidate_team = $candidate->c_team;
        $img_url = @$candidate->c_metadata['img'];
        if(empty($img_url)) { //TODO remove hardcoding after db entry of images
            //echo($candidate->c_team);
            switch ($candidate->c_team)
            {
                case "Aam Aadmi Party":
                    $img_url = "/images/AAP.jpg";
                    break;
                case "BJP":
                    $img_url = "/images/BJP.jpg";
                    break;
                case "Congress":
                    $img_url = "/images/Congress.jpg";
                    break;
                case "Janta Dal":
                    $img_url = "/images/JDU.jpg";
                    break;
                default:
                    $img_url = "/images/anonymous.png";
            }
        }
        $modal_id = 'modal_id_'.$candidate->c_id;
        $votes = $candidate->c_votes;
        $td_thumbnail = '<td>
                        <ul class="thumbnails">
                                <ol class="span5 offset2">
                                <div class="thumbnail">
                                        <img class="candit_image" src="'.$img_url.'" alt="'.$candidate_name.'">
                                        <div class="caption">
                                            <h4><u>'.$candidate_name.'</u> ('.$candidate_team.')</h4>
                                            <div class="bs-example" style="padding-bottom: 10px;"><h4>'.
                                                get_like_candidate_plugin($candidate_vote_url).
                                                '</h4><button class="btn btn-default btn-success btn-xs" data-toggle="modal" data-target=#'.$modal_id.'>
                                                    <span class="glyphicon glyphicon-user"></span> View Details
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade candid-modal" id="'.$modal_id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog candid-modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Candidate Info</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div>'.  $blurb.'</div>
                                                        <br>
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
        // Save into the cache for 1 day
        $this->cache->file->save('candidate_td_thumbnail_'.$candidate->c_id, $td_thumbnail, 86400);
        return $td_thumbnail;
    }


    private function get_div_container($table, $game) {
        $game_url = base_url().'index.php/games/view/'.$game->g_type.'/'.$game->g_name;
        $div = '<div class="container candid-div">
                    <div class="page-header container">
                        <p class="bg-info">
                            <h3>'.$game->g_type.': '.$game->g_place.' | '. $game->g_city.' | '.$game->g_state.'
                                <small>'.$game->g_date.'</small>
                            </h3>'.get_social_share_plugin().'
                        </p>
                    </div>
                    <div>'
                        .$table.'
                    </div>'.
                    get_comment_plugin($game_url).'
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
                $blurb = @$candidate->c_metadata['blurb'];
                $like_plugin = '';
                $wiki_info_card = '';

                if(!empty($fb_handle)) {
                    $like_plugin = get_like_plugin($fb_handle);
                }
                if(!empty($wiki_handle)) {
                    $wiki_info_card = get_info_card($wiki_handle);
                }
                if(empty($blurb)){
                    $blurb = '';
                }
                $td = $this->get_td_thumbnail($game, $candidate, $like_plugin, $wiki_info_card,$blurb);
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
        $g_name = urldecode($g_name);

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

    private  function candidate_game($g_type, $c_prefix) {
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


    public function render_drop_down_search($g_type, $key, $value) {
        $value = urldecode($value);
        $games = array();
        switch ($key)
        {
            case "cprefix":
                $games = $this->candidate_game($g_type, $value);
                break;
            case "location":
                $games = $this->search_games($g_type, 'gplace', $value);
                break;
            case "city":
                $games = $this->search_games($g_type, 'gcity', $value);
                break;
            case "state":
                $games = $this->search_games($g_type, 'gstate', $value);
                break;
            default:
                return;
        }




        if(!empty($games)) {
            echo($this->get_games_table($games, $g_type));
        }

    }



    private function get_games_table($games, $g_type) {
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
                        <th>City</th>
                        <th>State</th>
                        <th>Date</th>
                        </tr>';
        foreach($games as $game) {
            $table_rows .= '<tr class="search_result_row" id="'.$game->g_name.'">';
            $cand_csv = '<td> <a href="'.base_url().'index.php/games/view/'.$g_type.'/'.$game->g_name.'" target="_blank">';
            $i = 0;
            $total = count($game->candidates);
            foreach($game->candidates as $candidate) {
                $i++;
                $cand_csv .= $candidate->c_firstname.' '.$candidate->c_lastname.'('.$candidate->c_team.')';
                if($i != $total) {
                    $cand_csv .= ' vs ';
                }
            }
            $cand_csv .= '</a></td>';
            $table_rows .= $cand_csv;
            $table_rows .= '<td>'.$game->g_type.'</td>'
                .'<td>'.$game->g_place.'</td><td> '.$game->g_city.'</td><td>'.$game->g_state.'</td>'
                .'<td>'.$game->g_date.'</td>';
            $table_rows .= '</tr>';
        }
        $table_rows .= '</table>';
        return $table_rows;
    }

    public function events($g_type, $key = '', $value = '') {
        $value = urldecode($value);
        if(empty($g_type)) {
            show_404();
        }
        $criteria = '';
        if(!empty($key) && !empty($value)) {
            $criteria = array($key => $value, 'gtype' => $g_type);
        } else {
            $criteria = array('gtype' => $g_type);
        }

        $games = $this->games_model->get_games($criteria);
        $title = $g_type.' '.$value.' Candidates head to head';
        $this->display_events($games, $g_type, $title, null);

    }

    public function get_game_div($g_id) {
        //Game query
        $criteria = array('gid' => $g_id);
        $games =  $this->games_model->get_games($criteria);

        $div_containers = $this->generate_div_containers($games);
        $carousel_divs = $this->get_carousel_divs($div_containers);

        echo($carousel_divs);
    }

} 