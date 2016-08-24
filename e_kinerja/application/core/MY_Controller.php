<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Description of MY_Controller
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */
class MY_Controller extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
        
        /*
        $this->load->library(array('ion_auth','form_validation'));

        $this->form_validation->set_message('required', 'Field %s harus terisi');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        */
    }

}

?>
