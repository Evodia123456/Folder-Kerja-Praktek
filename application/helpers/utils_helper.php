<?php
function dd($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    die();
}

function isLogin()
{
    $ci = &get_instance();
    if (!$ci->session->userdata('is_login_kip')) {
        redirect("login");
    }
}

function check_admin()
{
    $ci = &get_instance();
	if ($ci->session->userdata('is_mhs') === true) {
        redirect("dashboard/block");
    }
}

function sendEmail($subject, $data, $view)
{
    $CI = &get_instance();
    $config = array(
        'useragent' => 'CodeIgniter',
        'protocol' => 'smtp',
        'mailpath' => '/usr/sbin/sendmail',
        'smtp_host' => 'smtp.gmail.com',
        'smpt_user' => 'evodiasusantinus@gmail.com',
        'smpt_pass' => "Evodiahondro",
        'smtp_port' => 465,
        'smtp_keepalive' => true,
        'smtp_crypto' => 'ssl',
        'wordwrap' => true,
        'wrapchars' => 76,
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'validate' => true,
        'crlf' => "\r\n",
        'newline' => "\r\n",
    );
    $body = $CI->load->view("mail/" . $view, $data, true);
    $CI->email->initialize($config);
    $CI->email->from('evodiasusantinus@gmail.com', 'KIP Kuliah UKRIM');
    $CI->email->to($data["email_user"]);
    $CI->email->subject($subject);
    $CI->email->message($body);
    if ($CI->email->send()) {
        return "1";
    } else {
        echo $CI->email->print_debugger();
        return "0";
    }
}
