<?php

function is_logged() {
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
}