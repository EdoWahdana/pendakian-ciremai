<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    }

    public function index() {
        $this->load->view('main/template/header');
        $this->load->view('main/template/navbar');
        $this->load->view('main/V_katalog');
        $this->load->view('main/template/footer');
    }

}