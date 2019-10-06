<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (dirname(__FILE__).'/Matrix_model.php');

class Order_model extends Matrix_model {

    protected $db_table = 'order';
    
    function __construct()
    {
        parent::__construct();
    }

}

/* End of file ModelName.php */
