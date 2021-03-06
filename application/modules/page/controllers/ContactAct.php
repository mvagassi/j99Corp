<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactAct extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        error_reporting(0);
        $this->load->model('model');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('download');
    }
    public  function Date2String($dTgl)
    {
        //return 2012-11-22
        list($cDate, $cMount, $cYear)    = explode("-", $dTgl);
        if (strlen($cDate) == 2) {
            $dTgl    = $cYear . "-" . $cMount . "-" . $cDate;
        }
        return $dTgl;
    }

    public  function String2Date($dTgl)
    {
        //return 22-11-2012  
        list($cYear, $cMount, $cDate)    = explode("-", $dTgl);
        if (strlen($cYear) == 4) {
            $dTgl    = $cDate . "-" . $cMount . "-" . $cYear;
        }
        return $dTgl;
    }

    public function TimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("H:i:s");
        return $Data;
    }

    public function DateStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("d-m-Y");
        return $Data;
    }

    public function DateTimeStamp()
    {
        date_default_timezone_set("Asia/Jakarta");
        $Data = date("Y-m-d h:i:s");
        return $Data;
    }

    public function DateStamp_card()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date("Y-m-d");
        $Data = date('m / y', strtotime('+1 year', strtotime($tanggal)));
        return $Data;
    }

    public function FormContact()
    {
        // Configure your Subject Prefix and Recipient here
        $subjectPrefix = '[Contact via website]';
        $emailTo       = 'imron.0697@gmail.com';

        $errors = array(); // array to hold validation errors
        $data   = array(); // array to pass back data

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name    = stripslashes(trim($_POST['name']));
            $email   = stripslashes(trim($_POST['email']));
            $subject = stripslashes(trim($_POST['subject']));
            $message = stripslashes(trim($_POST['message']));


            if (empty($name)) {
                $errors['name'] = 'Name is required.';
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email is invalid.';
            }

            if (empty($subject)) {
                $errors['subject'] = 'Subject is required.';
            }

            if (empty($message)) {
                $errors['message'] = 'Message is required.';
            }

            // if there are any errors in our errors array, return a success boolean or false
            if (!empty($errors)) {
                $data['success'] = false;
                $data['errors']  = $errors;
            } else {
                $subject = "$subjectPrefix $subject";
                $body    = '
            <strong>Name: </strong>' . $name . '<br />
            <strong>Email: </strong>' . $email . '<br />
            <strong>Message: </strong>' . nl2br($message) . '<br />
        ';

                $headers  = "MIME-Version: 1.1" . PHP_EOL;
                $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
                $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
                $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
                $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
                $headers .= "From: " . "=?UTF-8?B?" . base64_encode($name) . "?=" . "<$email>" . PHP_EOL;
                $headers .= "Return-Path: $emailTo" . PHP_EOL;
                $headers .= "Reply-To: $email" . PHP_EOL;
                $headers .= "X-Mailer: PHP/" . phpversion() . PHP_EOL;
                $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;

                mail($emailTo, "=?utf-8?B?" . base64_encode($subject) . "?=", $body, $headers);

                $data['success'] = true;
                $data['message'] = 'Congratulations. Your message has been sent successfully';
            }

            // return all our data to an AJAX call
            echo json_encode($data);
        }
        redirect(site_url('page/Master'));
    }
}
