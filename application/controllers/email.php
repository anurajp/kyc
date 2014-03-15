<?php
/**
 * Created by PhpStorm.
 * User: anurajp
 * Date: 3/8/14
 * Time: 6:22 PM
 */

class Email extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

    }

    public function send() {
        //$this->load->library('email');

        //$this->load->helper('form');
        //$this->load->library('form_validation');

        $this->form_validation->set_rules('iname', 'Title', 'required');
        $this->form_validation->set_rules('iemail', 'Email', 'required');
        $this->form_validation->set_rules('imsg', 'Message', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            echo '<h4 class="bg-warning">Validation failure, retry</h4>';

        }
        else
        {
            $this->email->from($this->input->post('iemail'), $this->input->post('iname'));
            $this->email->to('anuraj.kool@gmail.com');
            $this->email->cc('aankur.bansal@gmail.com');
            //$this->email->bcc('them@their-example.com');

            $this->email->subject('KYC Feedback');
            $this->email->message($this->input->post('imsg'));

            $this->email->send();
            echo '<h4 class="bg-success">Thank you, we\'ve recieved your message. We will get back to you shortly </h4>';
            echo $this->email->print_debugger();
        }



    }
}