<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends MY_Model {

    public $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

}