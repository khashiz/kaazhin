<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

if (!$list)
{
	return;
}

?>
<span class="middleGridLine"></span>
<div class="uk-container">
    <div class="uk-margin-large-bottom">
        <div data-uk-grid>
            <div class="uk-width-1-1 uk-width-expand@s uk-text-center uk-text-right@s">
                <span class="uk-display-block font f500 uk-text-muted uk-margin-small-bottom"><?php echo '[ '.JText::_('OUR_MAG').' ]' ?></span>
                <h3 class="uk-h2 font f900 uk-text-secondary uk-margin-remove"><?php echo $module->title; ?></h3>
            </div>
            <div class="uk-width-1-1 uk-width-auto@s uk-flex uk-flex-middle uk-flex-center">
                <a href="#" class="uk-button uk-button-large uk-button-secondary uk-button-styled uk-button-outline"><?php echo JText::_('SEE_ALL'); ?></a>
            </div>
        </div>
    </div>
    <div class="uk-position-relative uk-position-z-index-2" data-uk-slider>
        <div class="uk-position-relative">
            <div class="uk-slider-container">
                <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-grid mod-articlesnews newsflash">
	                <?php foreach ($list as $item) : ?>
                        <div class="mod-articlesnews__item" itemscope itemtype="https://schema.org/Article">
                            <div class="magItem"><?php require ModuleHelper::getLayoutPath('mod_articles_news', '_magitem'); ?></div>
                        </div>
	                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin uk-hidden@s"></ul>
    </div>
</div>