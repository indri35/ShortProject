<?php
class UserPage extends CI_Controller {

        

        public function view($page = 'home')
{
        if ( ! file_exists(APPPATH.'views/user/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('user/header', $data);
        $this->load->view('user/'.$page, $data);
        $this->load->view('user/footer', $data);
}
}