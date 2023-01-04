<?php

/*********************************************************************
    index.php

    Helpdesk landing page. Please customize it to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
 **********************************************************************/
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';

$section = 'home';
require(CLIENTINC_DIR . 'header.inc.php');
?>
<div id="landing_page">

    <div class="main-content">

        <div class="thread_body welcome_post">
            <?php
            if ($cfg && ($page = $cfg->getLandingPage()))
                echo $page->getBodyWithImages();
            else
                echo  '<h1>' . __('Welcome to the Support Center') . '</h1>';
            ?>
        </div>
        <div>
            <?php
            $BUTTONS = isset($BUTTONS) ? $BUTTONS : true;
            ?>
            <?php if ($BUTTONS) { ?>
                <div class="front-page-buttons">
                    <?php
                    if (
                        $cfg->getClientRegistrationMode() != 'disabled'
                        || !$cfg->isClientLoginRequired()
                    ) { ?>
                        <a href="open.php" style="display:block" class="blue button"><?php echo __('Open a New Ticket'); ?></a>

                    <?php } ?>
                    <a href="view.php" style="display:block" class="green button"><?php echo __('Check Ticket Status'); ?></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    if ($cfg && $cfg->isKnowledgebaseEnabled()) { ?>
        <div class="kb_details">
            <div class="featured-category-cover">
                <?php
                $cats = Category::getFeatured();
                if ($cats->all()) { ?>
                    <h1><?php echo __('Featured Knowledge Base Articles'); ?></h1>
                <?php
                }
                foreach ($cats as $C) { ?>
                    <div class="featured-category front-page">
                        <div class="featured-category-header">
                            <i class="icon-folder-open"></i>
                            <div class="category-name">
                                <?php echo $C->getName(); ?>
                            </div>
                        </div>
                        <?php foreach ($C->getTopArticles() as $F) { ?>
                            <div class="article-headline">
                                <div class="article-title">
                                    <a href="<?php echo ROOT_PATH; ?>kb/faq.php?id=<?php echo $F->getId(); ?>">
                                        <?php echo $F->getQuestion(); ?>
                                    </a>
                                </div>
                                <div class="article-teaser"><?php echo $F->getTeaser(); ?></div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div>
                <div class="search-form">
                    <form method="get" action="kb/faq.php">
                        <input type="hidden" name="a" value="search" />
                        <input type="text" name="q" class="search" placeholder="<?php echo __('Search our knowledge base'); ?>" />
                        <button type="submit" class="button"><?php echo __('Search'); ?></button>
                    </form>
                </div>

                <?php
                if (($faqs = FAQ::getFeatured()->select_related('category')->limit(5))
                    && $faqs->all()
                ) { ?>
                    <section class="side-widget">
                        <div class="header"><?php echo __('Featured Questions'); ?></div>
                        <div class="side-widget-entry">
                            <?php foreach ($faqs as $F) { ?>
                                <div>
                                    <a href="<?php echo ROOT_PATH; ?>kb/faq.php?id=<?php echo urlencode($F->getId()); ?>">
                                        <?php echo $F->getLocalQuestion(); ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
                <?php
                }
                $resources = Page::getActivePages()->filter(array('type' => 'other'));
                if ($resources->all()) { ?>
                    <section class="side-widget">
                        <div class="header"><?php echo __('Other Resources'); ?></div>
                        <div class="side-widget-entry">
                            <?php foreach ($resources as $page) { ?>
                                <div><a href="<?php echo ROOT_PATH; ?>pages/<?php echo $page->getNameAsSlug(); ?>"><?php echo $page->getLocalName(); ?></a></div>
                            <?php } ?>
                        </div>
                    </section>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <svg id="wave" style=" border-radius: 5px 5px 5px 5px; transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 400"><defs>
        <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
            <stop stop-color="rgba(16, 12, 62, 1)" offset="0%"></stop>
            <stop stop-color="rgba(126, 120, 177, 1)" offset="100%">
            </stop></linearGradient></defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,360L48,333.3C96,307,192,253,288,193.3C384,133,480,67,576,86.7C672,107,768,213,864,260C960,307,1056,293,1152,246.7C1248,200,1344,120,1440,133.3C1536,147,1632,253,1728,286.7C1824,320,1920,280,2016,260C2112,240,2208,240,2304,213.3C2400,187,2496,133,2592,140C2688,147,2784,213,2880,260C2976,307,3072,333,3168,333.3C3264,333,3360,307,3456,300C3552,293,3648,307,3744,313.3C3840,320,3936,320,4032,293.3C4128,267,4224,213,4320,200C4416,187,4512,213,4608,233.3C4704,253,4800,267,4896,233.3C4992,200,5088,120,5184,126.7C5280,133,5376,227,5472,280C5568,333,5664,347,5760,333.3C5856,320,5952,280,6048,260C6144,240,6240,240,6336,253.3C6432,267,6528,293,6624,306.7C6720,320,6816,320,6864,320L6912,320L6912,400L6864,400C6816,400,6720,400,6624,400C6528,400,6432,400,6336,400C6240,400,6144,400,6048,400C5952,400,5856,400,5760,400C5664,400,5568,400,5472,400C5376,400,5280,400,5184,400C5088,400,4992,400,4896,400C4800,400,4704,400,4608,400C4512,400,4416,400,4320,400C4224,400,4128,400,4032,400C3936,400,3840,400,3744,400C3648,400,3552,400,3456,400C3360,400,3264,400,3168,400C3072,400,2976,400,2880,400C2784,400,2688,400,2592,400C2496,400,2400,400,2304,400C2208,400,2112,400,2016,400C1920,400,1824,400,1728,400C1632,400,1536,400,1440,400C1344,400,1248,400,1152,400C1056,400,960,400,864,400C768,400,672,400,576,400C480,400,384,400,288,400C192,400,96,400,48,400L0,400Z">
            </path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(28, 21, 99, 1)" offset="0%"></stop>
            <stop stop-color="rgba(165, 163, 194, 1)" offset="100%"></stop></linearGradient></defs>
            <path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,80L48,80C96,80,192,80,288,126.7C384,173,480,267,576,266.7C672,267,768,173,864,166.7C960,160,1056,240,1152,253.3C1248,267,1344,213,1440,193.3C1536,173,1632,187,1728,193.3C1824,200,1920,200,2016,166.7C2112,133,2208,67,2304,60C2400,53,2496,107,2592,120C2688,133,2784,107,2880,120C2976,133,3072,187,3168,186.7C3264,187,3360,133,3456,100C3552,67,3648,53,3744,60C3840,67,3936,93,4032,146.7C4128,200,4224,280,4320,306.7C4416,333,4512,307,4608,286.7C4704,267,4800,253,4896,220C4992,187,5088,133,5184,126.7C5280,120,5376,160,5472,206.7C5568,253,5664,307,5760,300C5856,293,5952,227,6048,180C6144,133,6240,107,6336,140C6432,173,6528,267,6624,273.3C6720,280,6816,200,6864,160L6912,120L6912,400L6864,400C6816,400,6720,400,6624,400C6528,400,6432,400,6336,400C6240,400,6144,400,6048,400C5952,400,5856,400,5760,400C5664,400,5568,400,5472,400C5376,400,5280,400,5184,400C5088,400,4992,400,4896,400C4800,400,4704,400,4608,400C4512,400,4416,400,4320,400C4224,400,4128,400,4032,400C3936,400,3840,400,3744,400C3648,400,3552,400,3456,400C3360,400,3264,400,3168,400C3072,400,2976,400,2880,400C2784,400,2688,400,2592,400C2496,400,2400,400,2304,400C2208,400,2112,400,2016,400C1920,400,1824,400,1728,400C1632,400,1536,400,1440,400C1344,400,1248,400,1152,400C1056,400,960,400,864,400C768,400,672,400,576,400C480,400,384,400,288,400C192,400,96,400,48,400L0,400Z">
            </path>
    </svg>
</div>

<?php require(CLIENTINC_DIR . 'footer.inc.php'); ?>