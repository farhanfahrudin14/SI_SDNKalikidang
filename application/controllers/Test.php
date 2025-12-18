<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function check_admin($user_id)
    {
        $this->load->library('ion_auth');
        
        if ($this->ion_auth->is_admin($user_id)) {
            echo "User $user_id adalah admin.";
        } else {
            echo "User $user_id BUKAN admin!";
        }
    }
}
