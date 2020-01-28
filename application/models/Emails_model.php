<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emails_model extends CI_Model {

    public function save_sent($to_email, $subject, $body)
    {
        $this->load->helper('date');

        $data = [];
        $data['to_email'] = $to_email;
        $data['subject'] = $subject;
        $data['body'] = $body;
        $data['created'] = date('Y-m-d H:i:s',now());
        $data['modified'] = date('Y-m-d H:i:s',now());

        return $this->db->insert('sent_emails', $data);
    }
}