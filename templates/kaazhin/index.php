<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
JHtml::_('jquery.framework');

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();
$wa  = $this->getWebAssetManager();

$app  = JFactory::getApplication();
$user = JFactory::getUser();
$params = $app->getTemplate(true)->params;
$menu = $app->getMenu();
$active = $menu->getActive();

$pageparams = $menu->getParams( $active->id );
$pageclass = $pageparams->get( 'pageclass_sfx' );

// Add CSS
if ($this->direction == 'rtl') {
    JHtml::_('stylesheet', 'uikit-rtl.min.css', array('version' => 'auto', 'relative' => true));
} else {
    JHtml::_('stylesheet', 'uikit.min.css', array('version' => 'auto', 'relative' => true));
}
JHtml::_('stylesheet', 'fontawesome.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'brands.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'light.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'regular.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'solid.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'kaazhin.css', array('version' => 'auto', 'relative' => true));

// Add js
JHtml::_('script', 'uikit.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'uikit-icons.min.js', array('version' => 'auto', 'relative' => true));
JHtml::_('script', 'custom.js', array('version' => 'auto', 'relative' => true));

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';
$netparsi = "<a href='https://netparsi.com' class='netparsi' target='_blank' rel='nofollow'>".JTEXT::sprintf('NETPARSI')."</a>";

$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="<?php echo $params->get('presetcolor'); ?>">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#000000">
	<jdoc:include type="metas" />
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
</head>
<body>
    <header class="uk-width-1-1" data-uk-sticky>
        <div class="uk-grid-collapse" data-uk-grid>
            <div class="uk-width-auto">
                <a href="" class="uk-flex uk-padding-small logo" title="">
                    <img src="<?php echo JUri::base().'images/sprite.svg#logo'; ?>" width="75" height="75" alt="<?php echo $sitename; ?>" class="logo" data-uk-svg>
                </a>
            </div>
            <div class="uk-width-expand uk-visible@s"><jdoc:include type="modules" name="nav" style="html5" /></div>
            <div class="uk-width-expand uk-hidden@s"></div>
            <div class="uk-width-auto">
                <a href="#" class="uk-flex uk-flex-center uk-flex-middle offcanvasToggler"><i class="fal fa-fw fa-2x fa-search"></i></a>
            </div>
            <div class="uk-width-auto">
                <a href="#" class="uk-flex uk-flex-center uk-flex-middle offcanvasToggler"><i class="fal fa-fw fa-2x fa-bars-staggered"></i></a>
            </div>
        </div>
    </header>
    <ul class="uk-position-z-index uk-position-center-right uk-margin-remove uk-padding-remove socials uk-visible@s">
	    <?php foreach ($params->get('socials') as $item) : ?>
		    <?php if ($item->icon != '') { ?>
                <li>
                    <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" data-uk-tooltip="pos: left; cls: uk-active uk-text-small" class="uk-flex uk-flex-center uk-flex-middle" target="_blank" id="<?php echo $item->title; ?>">
	                    <?php if ($item->icon == 'aparat') { ?>
                            <img src="<?php echo JUri::base().'images/sprite.svg#'.$item->icon; ?>" width="32" height="32" alt="<?php echo $item->title; ?>" data-uk-svg>
	                    <?php } else { ?>
                            <i class="fab fa-fw fa-2x fa-<?php echo $item->icon; ?>"></i>
	                    <?php } ?>
                    </a>
                </li>
		    <?php } ?>
	    <?php endforeach; ?>
    </ul>

    <?php if ($this->countModules('topout', true)) : ?>
        <jdoc:include type="modules" name="topout" style="html5" />
    <?php endif; ?>
    <main class="<?php if ($pageparams->get('mainpadding')) { echo 'uk-padding-large uk-padding-remove-horizontal';} ?>" data-uk-height-viewport="expand: true">
        <?php if ($this->countModules('topin', true)) : ?>
            <jdoc:include type="modules" name="topin" style="html5" />
        <?php endif; ?>
        <div class="<?php echo $pageparams->get('gridsize', '') ?>">
            <div class="uk-grid-divider" data-uk-grid>
                <?php if ($this->countModules('sidestart', true)) : ?>
                    <aside class="uk-width-1-1 uk-width-1-4@m uk-visible@m">
                        <div data-uk-sticky="offset: 92; bottom: true;">
                            <div class="uk-child-width-1-1" data-uk-grid><jdoc:include type="modules" name="sidestart" style="none" /></div>
                        </div>
                    </aside>
                <?php endif; ?>
                <article class="uk-width-1-1 uk-width-expand@m">
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                </article>
                <?php if ($this->countModules('sideend', true)) : ?>
                    <aside class="uk-width-1-1 uk-width-1-4@s uk-visible@s"><jdoc:include type="modules" name="sideend" style="none" /></aside>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php if ($this->countModules('bottomout', true)) : ?>
        <jdoc:include type="modules" name="bottomout" style="html5" />
    <?php endif; ?>
    <footer class="uk-background-secondary">
        <div class="uk-position-relative uk-padding uk-padding-remove-horizontal modules">
            <div class="uk-container">
                <div class="uk-flex-between uk-child-width-1-1 uk-child-width-expand@s uk-grid-divider" data-uk-grid>
                    <div class="uk-width-1-4 uk-visible@s">
                        <a href="" class="uk-flex logo uk-margin-bottom" title="">
                            <img src="<?php echo JUri::base().'images/sprite.svg#logo'; ?>" width="150" height="150" alt="<?php echo $sitename; ?>" class="" data-uk-svg>
                        </a>
                        <p class="uk-margin-remove-bottom uk-margin-top font uk-text-muted f400 uk-text-small"><?php echo JText::_('FOOTER_TEXT'); ?></p>
                    </div>
                    <div class="uk-width-1-1 uk-width-1-4@s">
                        <h3 class="uk-text-white font uk-h4 uk-text-right"><?php echo JText::_('CONTACT_INFO'); ?></h3>
                        <ul class="uk-grid-small uk-flex-center" data-uk-grid>
                            <li class="uk-text-small uk-flex uk-flex-middle uk-width-auto uk-width-1-1@m"><i class="fas fa-map-signs fa-fw fa-lg uk-margin-left uk-text-primary"></i><span class="uk-text-white font"><?php echo $params->get('address'); ?></span></li>
                            <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fas fa-phone fa-flip-horizontal fa-fw fa-lg uk-margin-left uk-text-primary"></i><a href="tel:<?php echo $params->get('phone'); ?>" class="uk-text-white font ltr"><?php echo $params->get('phone'); ?></a></li>
                            <li class="uk-text-small uk-flex uk-flex-middle uk-width-1-2 uk-width-1-1@m"><i class="fas fa-envelope-open-text fa-fw fa-lg uk-margin-left uk-text-primary"></i><a href="mailto:<?php echo $params->get('email'); ?>" class="uk-text-white font ltr"><?php echo $params->get('email'); ?></a></li>
                        </ul>
                        <ul class="uk-grid-small uk-child-width-auto uk-margin-medium-top uk-flex-center uk-flex-right@m social" data-uk-grid>
		                    <?php foreach ($params->get('socials') as $item) : ?>
			                    <?php if ($item->icon != '') { ?>
                                    <li>
                                        <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" data-uk-tooltip class="uk-flex uk-flex-center uk-flex-middle" target="_blank" id="<?php echo $item->title; ?>">
	                                        <?php if ($item->icon == 'aparat') { ?>
                                                <img src="<?php echo JUri::base().'images/sprite.svg#'.$item->icon; ?>" width="24" height="24" alt="<?php echo $item->title; ?>" data-uk-svg>
	                                        <?php } else { ?>
                                                <i class="fab fa-<?php echo $item->icon; ?>"></i>
	                                        <?php } ?>
                                        </a>
                                    </li>
			                    <?php } ?>
		                    <?php endforeach; ?>
                        </ul>
                    </div>
                    <jdoc:include type="modules" name="footer" style="html5" />
                </div>
            </div>
        </div>
        <div class="uk-text-center uk-text-right@m  uk-position-relative copyright">
            <div class="uk-container">
                <div class="uk-padding-small uk-padding-remove-horizontal wrapper">
                    <div class="uk-grid-row-collapse uk-grid-column-small" data-uk-grid>
                        <div class="uk-width-1-1 uk-width-expand@m">
                            <p class="uk-margin-remove uk-text-small uk-text-muted font f400"><?php echo JText::sprintf('COPYRIGHT', $sitename); ?></p>
                        </div>
                        <div class="uk-width-1-1 uk-width-auto@m">
                            <p class="uk-margin-remove uk-text-small uk-text-muted font f400"><?php echo JText::sprintf('DEVELOPER', $netparsi); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="hamMenu" data-uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar uk-card uk-card-default uk-padding-remove bgWhite">
            <div class="uk-flex uk-flex-column uk-height-1-1">
                <div class="uk-width-expand">
                    <div class="offcanvasTop uk-box-shadow-small uk-position-relative uk-flex-stretch">
                        <div class="uk-grid-collapse uk-height-1-1" data-uk-grid>
                            <div class="uk-flex uk-width-1-4 uk-flex uk-flex-center uk-flex-middle"><a onclick="UIkit.offcanvas('#hamMenu').hide();" class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1 uk-width-1-1 uk-margin-remove uk-text-black"><i class="far fa-chevron-right"></i></a></div>
                            <div class="logo uk-flex uk-flex-center uk-flex-column uk-width-expand">
                                <span class="uk-display-block font uk-text-tiny uk-text-black">حمل و نقل بین المللی</span>
                                <span class="f900 font uk-display-block uk-text-black">مسیر طلایی راسا</span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-padding-small"><jdoc:include type="modules" name="offcanvas" style="xhtml" /></div>
                </div>
            </div>
        </div>
    </div>
	<jdoc:include type="modules" name="debug" style="none" />
    <?php /* ?>
    <?php if ($pageclass == "home") { ?>
    <script type="text/javascript">
        jQuery(document).ready(function (){
            UIkit.modal("#newYear").show();
        });
    </script>
    <?php } ?>
    <div id="newYear" data-uk-modal>
        <div class="uk-modal-dialog uk-box-shadow-medium uk-border-rounded uk-overflow-hidden">
            <div class="uk-modal-header uk-padding-small">
                <h5 class="uk-modal-title uk-text-center font uk-text-bold uk-text-primary">سال نو مبارک</h5>
            </div>
            <div class="uk-modal-body uk-padding-remove">
                <style>.r1_iframe_embed {position: relative; overflow: hidden; width: 100%; height: auto; padding-top: 56.25%; } .r1_iframe_embed iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; }</style><div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://tavanresan.arvanvod.com/EWe2pMbwN0/D7b8MJzVMJ/origin_config.json" style="border:0 #ffffff none;" name="نوروز ۱۴۰۱" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" data-uk-video></iframe></div>
            </div>
        </div>
    </div>
    <?php */ ?>

</body>
</html>










