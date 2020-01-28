<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('general_settings');
        $res = $query->result();
        if(!$res) {
            return [];
        }

        $settings = [];
        foreach ($res as $setting) {
            $settings[$setting->name] = $setting->value;
        }
        return $settings;
    }
}