<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'buyyoid@gmail.com',
    'smtp_pass' => base64_decode('aHpub3FxYnV6emhwamh6cw=='),
    'smtp_crypto' => 'ssl',
    'smtp_timeout' => '4', 
    'mailtype'  => 'text', 
    'charset'   => 'utf-8',
    'wordwrap' => TRUE
);
?>
