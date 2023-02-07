<?php if ($content) {
    list($title, $body) = $ost->replaceTemplateVariables(
        array($content->getName(), $content->getBody())); ?>
        <div style="padding: 15px;">
<h1><?php echo Format::display($title); ?></h1>
<p><?php
echo Format::display($body); ?>
</p>
    </div>
<?php } else { ?>
    <div style="padding: 15px;">
<h1><?php echo __('Account Registration'); ?></h1>
<p>
<strong><?php echo __('Thanks for registering for an account.'); ?></strong>
</p>
<p><?php echo __(
"We've just sent you an email to the address you entered. Please follow the link in the email to confirm your account and gain access to your tickets."
); ?>
</p>
</div>
<?php } ?>
