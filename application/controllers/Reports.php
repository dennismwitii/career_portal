<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->page_data['page']->title = 'Reports Management';
        $this->page_data['page']->menu = 'reports';
    }

    public function index()
    {

        ifPermissions('report_list');

        $this->page_data['polls'] = $this->reports_model->get();
        $this->load->view('reports/list', $this->page_data);
    }

    
}

/* End of file Permissions.php */
/* Location: ./application/controllers/Permissions.php */