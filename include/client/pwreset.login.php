<?php
if (!defined('OSTCLIENTINC')) die('Access Denied');

$userid = Format::input($_POST['userid']);
?>
<div style="padding: 15px;">
<h1><?php echo __('Forgot My Password'); ?></h1>
<p><?php echo __(
        'Enter your username or email address again in the form below and press the <strong>Login</strong> to access your account and reset your password.'
    );
    ?>
<form action="pwreset.php" method="post" id="clientLogin">
    <div class="login-cover">
        <div class="login-box">
            <?php csrf_token(); ?>
            <input type="hidden" name="do" value="reset" />
            <input type="hidden" name="token" value="<?php echo Format::htmlchars($_REQUEST['token']); ?>" />
            <strong><?php echo Format::htmlchars($banner); ?></strong>
            <br>
            <div>
                <label for="username"><?php echo __('Username'); ?>:</label>
                <input id="username" type="text" name="userid" size="30" value="<?php echo $userid; ?>">
            </div>
            <p>
                <input class="btn button" type="submit" value="Login">
            </p>
        </div>
    </div>
</form>
</div>