<?php
/*********************************************************************
    panel.php
**********************************************************************/

// Don't update the session for inline image fetches
if (!function_exists('noop')) { function noop() {} }
session_set_save_handler('noop','noop','noop','noop','noop','noop');
define('DISABLE_SESSION', true);

require_once('../main.inc.php');

$ttl = 86400; // max-age
if(isset($_GET['backdrop_sys'])) {
    //$site = $nav->getNavs()->isAdminPanel()?'admin':'agent';
    $site = 'admin';
    if($backdrop_sys = $ost->getConfig()->getLoginBackdrop_sys($site)) {
        $backdrop_sys->display(false,$ttl);
    }
    header("Cache-Control: private, max-age=$ttl");
    header('Pragma: private');
    Http::redirect('images/EEEEEE.png');
}
?>