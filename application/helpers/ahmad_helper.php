<?php

function check_login()
{
    $CI =& get_instance();

    if (!$CI->session->userdata('login')) {
        redirect('auth');
    }
}

function check_admin()
{
    $CI =& get_instance();

    check_login();

    if ($CI->session->userdata('role') != 'admin') {
        redirect('customer');
    }
}

function check_customer()
{
    $CI =& get_instance();

    check_login();

    if ($CI->session->userdata('role') != 'customer') {
        redirect('admin');
    }
}