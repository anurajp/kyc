<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 6:22 PM
 */

class Contents extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('games_model');
    }

    /**
     * Home page for content i.e Loksabha, News etc where we display list of contents. Each content links to content view page
     *
     * @param $g_type
     * @param $content_type
     */
    public function home($g_type, $content_type) {
        $data['g_type'] = $g_type;
        $data['content_type'] = $content_type;
        $data['title'] = 'Know Your Candidate '. $g_type . ', ' . $content_type;
        $data['content_div'] = $this->get_content_div_home($g_type, $content_type);
        $this->load->view("header", $data);
        $this->load->view("content_home", $data);
        $this->load->view("footer");
        $this->load->view("app_jquery", $data);
        //$this->output->cache(720);
    }

    /**
     * Detailed description of content
     *
     * @param $g_type
     * @param $cname
     */
    public function view($g_type, $cname) {
        $data['g_type'] = $g_type;
        $data['cname'] = str_replace('_', ' ', $cname);
        $data['title'] = $g_type . ': ' . $data['cname'];
        $data['content_div'] = $this->get_content_div_view($g_type, $cname);
        $this->load->view("header", $data);
        $this->load->view("content_view", $data);
        $this->load->view("footer");
        $this->load->view("app_jquery", $data);
        //$this->output->cache(720);
    }

    private function get_content_div_home($g_type, $content_type) {
        $contents = $this->games_model->get_contents($g_type, $content_type, 0);
        //generate div html here
        return "Hi";
    }

    private function get_content_div_view($g_type, $cname) {
        $content = $this->games_model->get_content($g_type, $cname);
        if(!empty($content)) {
            switch ($content['cname']) {
                case "news":
                    //generate div html here
                    return "Hi Content";
                    break;
                default:
                    return;
            }
        }

    }

    /*
     * TO be completed
     */
    public function submitBlog() {
        //$this->load->library('email');

        //$this->load->helper('form');
        //$this->load->library('form_validation');
        echo $this->input->post('ititle');
        echo $this->input->post('iemail');
        echo $this->input->post('iblog');
        echo $this->input->post('iname');
        $this->form_validation->set_rules('iname', 'Title', 'required');
        $this->form_validation->set_rules('iemail', 'Email', 'required');
        $this->form_validation->set_rules('ititle', 'Title', 'required');
        $this->form_validation->set_rules('iblog', 'Blog', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            echo '<h4 class="bg-warning">Validation failure, retry</h4>';

        }
        else
        {
            $data = array(
                'btitle' => $this->input->post('ititle'),
                'bauthor' => $this->input->post('iemail'),
                'bcontent' => $this->input->post('iblog'),
                'bapproved' => false
            );

            $saved = $this->db->insert('Blogs', $data);

            if($saved) {
                $this->email->from($this->input->post('iemail'), $this->input->post('iname'));
                $this->email->to('anuraj.kool@gmail.com');
                $this->email->cc('aankur.bansal@gmail.com');
                //$this->email->bcc('them@their-example.com');

                $this->email->subject('Blog submitted: '.$this->input->post('ititle'));
                $this->email->message($this->input->post('iblog'));

                $this->email->send();
                echo '<h4>Thank you, your blog is under review. We will get back to you shortly</h4>';
            } else {
                echo '<h4>Sorry something went wrong! Try again later</h4>';
            }



            // commenting in prod
            // echo $this->email->print_debugger();
        }



    }
}
