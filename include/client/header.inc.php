<?php
$title = ($cfg && is_object($cfg) && $cfg->getTitle())
    ? $cfg->getTitle() : 'osTicket :: ' . __('Support Ticket System');
$signin_url = ROOT_PATH . "login.php"
    . ($thisclient ? "?e=" . urlencode($thisclient->getEmail()) : "");
$signout_url = ROOT_PATH . "logout.php?auth=" . $ost->getLinkToken();

header("Content-Type: text/html; charset=UTF-8");
header("Content-Security-Policy: frame-ancestors " . $cfg->getAllowIframes() . ";");

if (($lang = Internationalization::getCurrentLanguage())) {
    $langs = array_unique(array($lang, $cfg->getPrimaryLanguage()));
    $langs = Internationalization::rfc1766($langs);
    header("Content-Language: " . implode(', ', $langs));
}
?>
<!DOCTYPE html>
<html<?php
        if (
            $lang
            && ($info = Internationalization::getLanguageInfo($lang))
            && (@$info['direction'] == 'rtl')
        )
            echo ' dir="rtl" class="rtl"';
        if ($lang) {
            echo ' lang="' . $lang . '"';
        }

        // Dropped IE Support Warning
        if (osTicket::is_ie())
            $ost->setWarning(__('osTicket no longer supports Internet Explorer.'));
        ?>>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo Format::htmlchars($title); ?></title>
        <meta name="description" content="customer support platform">
        <meta name="keywords" content="osTicket, Customer support system, support ticket system">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/osticket.css?e148727" media="screen" />
        <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>css/theme.css?e148727" media="screen" />
        <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>css/print.css?e148727" media="print" />
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>scp/css/typeahead.css?e148727" media="screen" />
        <link type="text/css" href="<?php echo ROOT_PATH; ?>css/ui-lightness/jquery-ui-1.13.1.custom.min.css?e148727" rel="stylesheet" media="screen" />
        <link rel="stylesheet" href="<?php echo ROOT_PATH ?>css/jquery-ui-timepicker-addon.css?e148727" media="all" />
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/thread.css?e148727" media="screen" />
        <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/redactor.css?e148727" media="screen" />
        <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/font-awesome.min.css?e148727" />
        <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/flags.css?e148727" />
        <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/rtl.css?e148727" />
        <link type="text/css" rel="stylesheet" href="<?php echo ROOT_PATH; ?>css/select2.min.css?e148727" />
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/logo.php" sizes="32x32">
    <link rel="icon" type="image/png" href="/logo.php" sizes="16x16">
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-3.5.1.min.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-ui-1.13.1.custom.min.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/jquery-ui-timepicker-addon.js?e148727"></script>
        <script src="<?php echo ROOT_PATH; ?>js/osticket.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/filedrop.field.js?e148727"></script>
        <script src="<?php echo ROOT_PATH; ?>scp/js/bootstrap-typeahead.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor.min.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor-plugins.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/redactor-osticket.js?e148727"></script>
        <script type="text/javascript" src="<?php echo ROOT_PATH; ?>js/select2.min.js?e148727"></script>

        <?php
        if ($ost && ($headers = $ost->getExtraHeaders())) {
            echo "\n\t" . implode("\n\t", $headers) . "\n";
        }

        // Offer alternate links for search engines
        // @see https://support.google.com/webmasters/answer/189077?hl=en
        if (($all_langs = Internationalization::getConfiguredSystemLanguages())
            && (count($all_langs) > 1)
        ) {
            $langs = Internationalization::rfc1766(array_keys($all_langs));
            $qs = array();
            parse_str($_SERVER['QUERY_STRING'], $qs);
            foreach ($langs as $L) {
                $qs['lang'] = $L; ?>
                <link rel="alternate" href="//<?php echo $_SERVER['HTTP_HOST'] . htmlspecialchars($_SERVER['REQUEST_URI']); ?>?<?php
                                                                                                                                echo http_build_query($qs); ?>" hreflang="<?php echo $L; ?>" />
            <?php
            } ?>
            <link rel="alternate" href="//<?php echo $_SERVER['HTTP_HOST'] . htmlspecialchars($_SERVER['REQUEST_URI']); ?>" hreflang="x-default" />
        <?php
        }
        ?>
    </head>

    <body>
        <div id="container">
            <?php
            if ($ost->getError())
                echo sprintf('<div class="error_bar">%s</div>', $ost->getError());
            elseif ($ost->getWarning())
                echo sprintf('<div class="warning_bar">%s</div>', $ost->getWarning());
            elseif ($ost->getNotice())
                echo sprintf('<div class="notice_bar">%s</div>', $ost->getNotice());
            ?>
            <div id="header">
                <div class="top-menu">
                    <p>
                        <?php
                        if (
                            $thisclient && is_object($thisclient) && $thisclient->isValid()
                            && !$thisclient->isGuest()
                        ) {

                        ?>
                            <a href="<?php echo ROOT_PATH; ?>profile.php"><?php echo Format::htmlchars($thisclient->getName()); ?></a> |
                            <a href="<?php echo ROOT_PATH; ?>tickets.php"><?php echo sprintf(__('Tickets <b>(%d)</b>'), $thisclient->getNumTickets()); ?></a> -
                            <a href="<?php echo $signout_url; ?>"><?php echo __('Sign Out'); ?></a>
                            <?php
                        } elseif ($nav) {
                            if ($cfg->getClientRegistrationMode() == 'public') { ?>
                                <?php echo __('Guest User'); ?> | <?php
                                                                }
                                                                if ($thisclient && $thisclient->isValid() && $thisclient->isGuest()) { ?>
                                <a href="<?php echo $signout_url; ?>"><?php echo __('Sign Out'); ?></a><?php
                                                                                                    } elseif ($cfg->getClientRegistrationMode() != 'disabled') { ?>
                                <a href="<?php echo $signin_url; ?>"><?php echo __('Sign In'); ?></a>
                        <?php  }
                                                                                                } ?>
                    </p>
                    <p>
                        <?php
                        if (($all_langs = Internationalization::getConfiguredSystemLanguages())
                            && (count($all_langs) > 1)
                        ) {
                            $qs = array();
                            parse_str($_SERVER['QUERY_STRING'], $qs);
                            foreach ($all_langs as $code => $info) {
                                list($lang, $locale) = explode('_', $code);
                                $qs['lang'] = $code;
                        ?>
                                <a class="flag flag-<?php echo strtolower($info['flag'] ?: $locale ?: $lang); ?>" href="?<?php echo http_build_query($qs);
                                                                                                                            ?>" title="<?php echo Internationalization::getLanguageDescription($code); ?>">&nbsp;</a>
                        <?php }
                        } ?>
                    </p>
                </div>
                <div class="head">
                <div class="brand">
                            <a  id="logo" href="<?php echo ROOT_PATH; ?>index.php" title="<?php echo __('Support Center'); ?>">
                            <span class="valign-helper"></span>
                            <img  style="vertical-align: middle;" src="<?php echo ROOT_PATH; ?>logo.php" border=0 alt="<?php
                            echo $ost->getConfig()->getTitle(); ?>">    
                        </a>
                </div>
                <section class="navigation">
                    <div class="nav-container">
                      
                        <nav>
                        <div class="nav-mobile">
                            <a id="nav-toggle" href="#!"><span></span></a>
                        </div>
                        <ul class="nav-list">
                            <?php
                    if ($nav) { ?>
                        <ul id="nav" class="">
                            <?php
                            if ($nav && ($navs = $nav->getNavLinks()) && is_array($navs)) {
                                foreach ($navs as $name => $nav) {
                                    echo sprintf('<li><b><a class="%s %s" href="%s">%s</a></b></li>%s', $nav['active'] ? 'active' : '', $name, (ROOT_PATH . $nav['href']), $nav['desc'], "\n");
                                }
                            } 
                            ?>

                        </ul>
                    <?php
                    } else { ?>
                    <?php
                    } ?>
                        </nav>
                    </div>
                </section>
                </div>
            </div>
            <div id="content">

                <?php if ($errors['err']) { ?>
                    <div id="msg_error"><?php echo $errors['err']; ?></div>
                <?php } elseif ($msg) { ?>
                    <div id="msg_notice"><?php echo $msg; ?></div>
                <?php } elseif ($warn) { ?>
                    <div id="msg_warning"><?php echo $warn; ?></div>
                <?php } ?>


                <style>

                    .buttonlog{
                        border: none;
  color: black;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;  cursor: pointer;
  border-radius: 16px;
                    }
                    nav {
  float: right;
}
nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
nav ul li {
  float: left;
  position: relative;
}
nav ul li a {
  display: block;
  padding: 0 20px;
  line-height: 70px;
  background: #ffffff;
  color: #B6B4CD;
  text-decoration: none;
  /*
  The full path of this code is nav ul li a:not(:only-child):after. This means that the code will apply to any a tag in our nav list that is NOT an only child, aka any dropdown. The :after means it comes after the output of the tag. I’ve decided that to specify any nav item as a dropdown, it will be followed by a unicode arrow – ▾ (#9662).
  */
}
nav ul li a:hover {
  background: #E1DCEB;
  border-radius: 1000px;
  color: #3A3475;
}
nav ul li a:not(:only-child):after {
  padding-left: 4px;
  content: ' ▾';
}
nav ul li ul li {
  min-width: 190px;
}
nav ul li ul li a {
  padding: 15px;
  line-height: 20px;
}

.nav-dropdown {
  position: absolute;
  z-index: 1;
  /* Guarantees that the dropdown will display on top of any content. */
  box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
  display: none;
}

.nav-mobile {
  display: none;
  position: absolute;
  top: 0;
  right: 0;
  padding-right: 10px;
  background: #fff;
  height: 70px;
  width: 70px;
}

@media only screen and (max-width: 950px) {
  .nav-mobile {
    display: block;
    margin-right: 10px;
    margin-top: 85px;
  }

  .head #logo{
    width:50%;
    height: auto;
  }

  nav {
    width: 100%;
    padding: 70px 0 15px;
  }
  nav ul {
    display: none;
  }
  nav ul li {
    float: none;
  }
  nav ul li a {
    padding: 15px;
    line-height: 20px;
    text-align:center;
  }
  nav ul li ul li a {
    padding-left: 30px;
  }
}
#nav-toggle {
  position: absolute;
  right: 18px;
  top: 22px;
  cursor: pointer;
  padding: 10px 35px 16px 0px;
}
#nav-toggle span,
#nav-toggle span:before,
#nav-toggle span:after {
  cursor: pointer;
  border-radius: 1px;
  height: 5px;
  width: 35px;
  background: #463f3f;
  position: absolute;
  display: block;
  content: '';
  transition: all 300ms ease-in-out;
}
#nav-toggle span:before {
  top: -10px;
}
#nav-toggle span:after {
  bottom: -10px;
}
#nav-toggle.active span {
  background-color: transparent;
}
#nav-toggle.active span:before, #nav-toggle.active span:after {
  top: 0;
}
#nav-toggle.active span:before {
  transform: rotate(45deg);
}
#nav-toggle.active span:after {
  transform: rotate(-45deg);
}
/*Cambios */
.wave{
    /* background: #eee; */
    content: url(../Theme/scp/landing.php?backdrop_landing);
    display:block;max-width:100%;height:auto;
}

@media screen and (min-width: 950px) {
  .wave {
    height: 400px;
    width: 1140px;
  }
}

@media screen and (min-width: 950px) {
  .nav-list {
    display: block !important;
  }
}
/* 
.navigation – the outer wrapper for the navbar. Specifies the height and color, and will stretch the full width of the viewport.
*/
.navigation {
  height: 70px;
  margin-top:21px;
  background: #ffffff;
}

/*
.nav-container – the inner wrapper for the navbar. Defines how far the actual content should stretch.
*/
.nav-container {
  max-width: 1000px;
  margin: 0 auto;
}

.brand {
  position: absolute;
  padding-left: 20px;
  float: left;
  line-height: 70px;
  text-transform: uppercase;
  font-size: 1.4em;
}
.brand a,
.brand a:visited {
  color: #463f3f;
  text-decoration: none;
}

                    </style>
                    <script>
                        (function($) { // Begin jQuery
  $(function() { // DOM ready
    // If a link has a dropdown, add sub menu toggle.
    $('nav ul li a:not(:only-child)').click(function(e) {
      $(this).siblings('.nav-dropdown').toggle();
      // Close one dropdown when selecting another
      $('.nav-dropdown').not($(this).siblings()).hide();
      e.stopPropagation();
    });
    // Clicking away from dropdown will remove the dropdown class
    $('html').click(function() {
      $('.nav-dropdown').hide();
    });
    // Toggle open and close nav styles on click
    $('#nav-toggle').click(function() {
      $('nav ul').slideToggle();
    });
    // Hamburger to X toggle
    $('#nav-toggle').on('click', function() {
      this.classList.toggle('active');
    });
  }); // end DOM ready
})(jQuery); // end jQuery
                    </script>