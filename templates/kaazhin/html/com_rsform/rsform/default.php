<?php
/**
* @package RSForm! Pro
* @copyright (C) 2007-2019 www.rsjoomla.com
* @license GPL, http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');

$app  = JFactory::getApplication();
$user = JFactory::getUser();
$params = $app->getTemplate(true)->params;
$menu = $app->getMenu();
$active = $menu->getActive();

?>
<div class="uk-container">
	<div class="uk-grid-column-large" data-uk-grid>
		<div class="uk-width-1-1 uk-width-expand@s">
            <div class="uk-padding-large uk-padding-remove-horizontal"><?php echo RSFormProHelper::displayForm($this->formId); ?></div>
        </div>
		<div class="uk-width-1-1 uk-width-2-5@s">
			<div class="uk-background-primary uk-height-1-1 uk-flex uk-flex-middle uk-padding uk-padding-remove-vertical uk-position-relative contactSide">
                <div class="uk-position-relative">
                    <span class="uk-display-block font f400 uk-text-muted uk-margin-small-bottom uk-text-small"><?php echo '[ '.JText::_('OUR_CONTACT_INFO').' ]'; ?></span>
                    <h3 class="font f900 uk-text-white uk-margin-top uk-margin-small-bottom"><?php echo JText::_('LETS_START_A_PROJECT'); ?></h3>
                    <p class="font f500 uk-text-muted uk-text-small uk-margin-remove-top"><?php echo JText::_('CONTACT_SLOGAN'); ?></p>
                    <ul class="uk-child-width-1-1 uk-grid-medium" data-uk-grid>
                        <li class="uk-text-small uk-flex uk-flex-middle">
                            <div class="uk-grid-small" data-uk-grid>
                                <div class="uk-width-auto uk-flex uk-flex-middle"><i class="fal fa-2x fa-map-signs fa-fw uk-margin-left uk-text-white"></i></div>
                                <div class="uk-width-expand">
                                    <span class="uk-text-muted uk-text-small font f500 uk-display-block uk-margin-small-bottom"><?php echo JText::_('ADDRESS'); ?></span>
                                    <span class="uk-text-white font"><?php echo $params->get('address'); ?></span>
                                </div>
                            </div>
                        </li>
                        <li class="uk-text-small uk-flex uk-flex-middle">
                            <div class="uk-grid-small" data-uk-grid>
                                <div class="uk-width-auto uk-flex uk-flex-middle"><i class="fal fa-2x fa-phone fa-flip-horizontal fa-fw uk-margin-left uk-text-white"></i></div>
                                <div class="uk-width-expand">
                                    <span class="uk-text-muted uk-text-small font f500 uk-display-block uk-margin-small-bottom"><?php echo JText::_('PHONE'); ?></span>
                                    <a href="tel:<?php echo $params->get('phone'); ?>" class="uk-text-white font ltr ss02"><?php echo $params->get('phone'); ?></a>
                                </div>
                            </div>
                        </li>
                        <li class="uk-text-small uk-flex uk-flex-middle">
                            <div class="uk-grid-small" data-uk-grid>
                                <div class="uk-width-auto uk-flex uk-flex-middle"><i class="fal fa-2x fa-envelope-open-text fa-fw uk-margin-left uk-text-white"></i></div>
                                <div class="uk-width-expand">
                                    <span class="uk-text-muted uk-text-small font f500 uk-display-block uk-margin-small-bottom"><?php echo JText::_('EMAIL'); ?></span>
                                    <a href="mailto:<?php echo $params->get('email'); ?>" class="uk-text-white font ltr"><?php echo $params->get('email'); ?></a>
                                </div>
                            </div>
                        </li>
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
            </div>
		</div>
	</div>
</div>
<div class="uk-box-shadow-small uk-position-z-index-negative uk-position-relative mapWrapper">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.907415051164!2d51.31695831555239!3d35.753080333634955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdb94176040531946!2zMzXCsDQ1JzExLjEiTiA1McKwMTknMDguOSJF!5e0!3m2!1sen!2sus!4v1658159186534!5m2!1sen!2sus" width="1600" height="500" class="uk-width-1-1" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>