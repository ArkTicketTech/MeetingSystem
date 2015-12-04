<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        //$this->load->view('upload_form', array('error' => ' ' ));
    }

    public function do_upload($id)
    {
        $config['upload_path'] = './uploads_meet/';
        $config['max_size'] = 2048;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $id;
        $config['allowed_types'] = 'gif|jpg|png|zip|rar';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            redirect(base_url("meet/closedetail/").'/'.$id);
        }
    }
}
?>