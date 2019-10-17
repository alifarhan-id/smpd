<?php
require('swift/lib/swift_required.php');

function getVarClean($name, $type = '', $defaultValue = NULL)
{
    $var = getVar($name);
    $var = cleanVar($var);

    if ($var == '' && $defaultValue !== NULL){
        return $defaultValue;
    }

    if (!isset($type)) return $var;

    switch ($type) {
        case 'bool':
            if (is_bool($var)) return $var;
            break;
        case 'str':
        case 'string':
            if (is_string($var)) return $var;
            break;
        case 'object':
            if (is_object($var)) return $var;
            break;
        case 'array':
            if (is_array($var)) return $var;
            break;
        case 'float':
        case 'int':
        case 'numeric':
            if (is_numeric($var)) return $var;
            break;
        default:
            return $var;
    }

    if (isset($defaultValue)) return $defaultValue;

    return '';
}

function cleanVar($var)
{
    $search = array('|</?\s*SCRIPT[^>]*>|si',
                    '|</?\s*FRAME[^>]*>|si',
                    '|</?\s*OBJECT[^>]*>|si',
                    '|</?\s*META[^>]*>|si',
                    '|</?\s*APPLET[^>]*>|si',
                    '|</?\s*LINK[^>]*>|si',
                    '|</?\s*IFRAME[^>]*>|si',
                    '|STYLE\s*=\s*"[^"]*"|si');
    // short open tag <  followed by ? (we do it like this otherwise our qa tests go bonkers)
    $replace = array('');
    // Clean var
    $var = preg_replace($search, $replace, $var);

    return $var;
}

function getVar($name, $allowOnlyMethod = NULL)
{
    if ($allowOnlyMethod == 'GET') {
        if (isset($_GET[$name])) {
            // Then check in $_GET
            $value = $_GET[$name];
        } else {
            // Nothing found, return void
            return;
        }
    } elseif ($allowOnlyMethod == 'POST') {
        if (isset($_POST[$name])) {
            // First check in $_POST
            $value = $_POST[$name];
        } else {
            // Nothing found, return void
            return;
        }
    } else {
        if (isset($_POST[$name])) {
            // Then check in $_POST
            $value = $_POST[$name];
        } elseif (isset($_GET[$name])) {
            // Then check in $_GET
            $value = $_GET[$name];
        } else {
            // Nothing found, return void
            return;
        }
    }

    if (get_magic_quotes_gpc()) {
        $value = __stripslashes($value);
    }
    return $value;
}

function __stripslashes($value)
{
    $value = is_array($value) ? array_map(array('self','__stripslashes'), $value) : stripslashes($value);
    return $value;
}

function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

function startExcel($filename = "laporan.xls") {
    
   header("Content-type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename=$filename");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
   header("Pragma: public");
    
}

function sendEmail($email, $name, $subject, $text){
    $mailConfig = array(
        'host_smtp' => 'smtp.gmail.com',
         'username' => 'mpd.lombok@gmail.com',
         'password' => 'n0p4ssw0rd'
    );

    $transport = Swift_SmtpTransport::newInstance($mailConfig['host_smtp'], 465, "ssl")
      ->setUsername($mailConfig['username'])
      ->setPassword($mailConfig['password']);
    $mailer = Swift_Mailer::newInstance($transport);
    
    try{
        $message = Swift_Message::newInstance('SMPD - Lombok Utara')
          ->setFrom(array($mailConfig['username'] => $subject))
          ->setTo($email, $name)
          ->setBody($text, 'text/html');
        $result = $mailer->send($message);
    }catch(Exception $e){
        $result = 0;
    }
    return $result;
}

?>