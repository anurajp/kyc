<?php

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        log_message('debug', 'debug');
        if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
            $this->load->view('index.html');
            return;
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}