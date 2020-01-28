<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index()
    {
        $this->load->view('contact');
    }

    public function send_email()
    {
        $to_email = $this->input->post('to_email');
        $subject = $this->input->post('subject');
        $body = $this->input->post('body');

        $this->load->model('settings_model');
        $settings = $this->settings_model->get_all();

        $email_config = [
            'protocol' => 'smtp',
            'smtp_host' => $settings['smtp_host'],
            'smtp_user' => $settings['smtp_username'],
            'smtp_pass' => $settings['smtp_password'],
            'smtp_port' => $settings['smtp_port'],
            'send_multipart' => false,
        ];
        if($settings['smtp_ssl'] === 'yes') {
            $email_config['smtp_crypto'] = 'ssl';
        }
        if($settings['smtp_tls'] === 'yes') {
            $email_config['smtp_crypto'] = 'tls';
        }
        $this->email->initialize($email_config);

        $this->email->from('test@gmail.com', 'Site admin');
        $this->email->to($to_email);

        $this->email->subject($subject);
        $this->email->message($body);

        if(!$this->email->send()) {
            show_error('Error occured when sending email', 400);
        }

        $this->load->model('emails_model');
        if(!$this->emails_model->save_sent($to_email, $subject, $body)) {
            show_error('Error occured while saving sent email', 400);
        }

        echo 'Email was successfully sent!';
    }
}
