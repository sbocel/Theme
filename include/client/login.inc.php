<?php
if (!defined('OSTCLIENTINC')) die('Access Denied');

$email = Format::input($_POST['luser'] ?: $_GET['e']);
$passwd = Format::input($_POST['lpasswd'] ?: $_GET['t']);

$content = Page::lookupByType('banner-client');

if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getLocalName(), $content->getLocalBody())
    );
} else {
    $title = __('Sign In');
    $body = __('To better serve you, we encourage our clients to register for an account and verify the email address we have on record.');
}

?>
<h1 style="margin-top: 20px; margin-left:20px; margin-right:20px;"><?php echo Format::display($title); ?></h1>
<p style="margin-left: 20px; margin-right: 20px;"><?php echo Format::display($body); ?></p>
<form style="margin-left: 20px; margin-right: 20px;" action="login.php" method="post" id="clientLogin">
    <?php csrf_token(); ?>
    <div class="login-cover">
        <div class="login-box">
            <strong><?php echo Format::htmlchars($errors['login']); ?></strong>
            <div>
                <label for="username"><?php echo __('Email'); ?></label>
                <input id="username" placeholder="<?php echo __('Email or Username'); ?>" type="text" name="luser" size="30" value="<?php echo $email; ?>" class="nowarn">
            </div>
            <div>
                <label for="passwd"><?php echo __('Password'); ?></label>
                <input id="passwd" placeholder="<?php echo __('Password'); ?>" type="password" name="lpasswd" size="30" value="<?php echo $passwd; ?>" class="nowarn"></td>
            </div>
            <p>
                <input class="button mail" type="submit" value="<?php echo __('Sign In'); ?>">
                <?php if ($suggest_pwreset) { ?>
                    <a style="padding-top:4px;display:inline-block;" href="pwreset.php"><?php echo __('Forgot My Password'); ?></a>
                <?php } ?>
            </p>
        </div>
        <div class="login-meta" style="margin-bottom:20px; text-align:center;">
            <?php

            $ext_bks = array();
            foreach (UserAuthenticationBackend::allRegistered() as $bk)
                if ($bk instanceof ExternalAuthentication)
                    $ext_bks[] = $bk;

            if (count($ext_bks)) {
                foreach ($ext_bks as $bk) { ?>
                    <div class="external-auth"><?php $bk->renderExternalLink(); ?></div><?php
                                                                                    }
                                                                                }
                                                                                if ($cfg && $cfg->isClientRegistrationEnabled()) {
                                                                                    if (count($ext_bks)) echo '<hr style="width:70%"/>'; ?>
                <div style="margin-bottom: 5px">
                    <?php echo __('Not yet registered?'); ?> <a href="account.php?do=create"><?php echo __('Create an account'); ?></a>
                </div>
            <?php } ?>
            <div>
                <b><?php echo __("I'm an agent"); ?></b> —
                <a href="<?php echo ROOT_PATH; ?>scp/"><?php echo __('Sign In'); ?></a>
            </div>
        </div>
    </div>
</form>
