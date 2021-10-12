<?php 
function cek_login() 
{     
    $ci = get_instance();
    if ($ci->session->userdata('user_name')) {
    }else{
        redirect('logout');     

    }
}
 ?>