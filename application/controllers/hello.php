<?php
/**
 * Created by PhpStorm.
 * User: anbansal
 * Date: 3/8/14
 * Time: 4:46 PM
 */

class Hello extends CI_Controller{

    public function one(){
        $this->load->view('header');
        $this->load->view('search');
        $this->load->view('footer');


    }

    public function contactUs(){
        $this->load->view('header');
        $this->load->view('contact_form');
        $this->load->view('footer');


    }

    public function mailer(){
        $this->load->view('mailer.php');


    }
}
