<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$modId = 'mod-custom' . $module->id;

if ($params->get('backgroundimage'))
{
	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
	$wa->addInlineStyle('
#' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
', ['name' => $modId]);
}
?>
<span class="middleGridLine"></span>
<div class="uk-container">
    <div class="uk-margin-large-bottom">
        <div class="uk-grid-small" data-uk-grid>
            <div class="uk-width-1-1 uk-text-center">
                <span class="uk-display-block font f400 uk-text-muted uk-margin-small-bottom"><?php echo '[ '.JText::_('OUR_SERVICES').' ]' ?></span>
                <h3 class="uk-h2 font f700 uk-text-secondary uk-margin-remove"><?php echo $module->title; ?></h3>
            </div>
        </div>
    </div>
    <div data-uk-slider>
        <div class="uk-position-relative">
            <div class="uk-slider-container">
                <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-grid serviceItem">
	                <?php $i = 1; foreach ($params->get('services') as $item) : ?>
		                <?php if ($item->title != '') { ?>
                            <div>
                                <div class="uk-padding item-<?php echo $i; ?>">
                                    <div class="uk-text-center uk-margin-bottom"><img src="<?php echo (HTMLHelper::cleanImageURL($item->icon))->url; ?>" alt="" height="70"></div>
                                    <div>
                                        <h3 class="font uk-text-center uk-h4 uk-text-secondary f700"><?php echo $item->title; ?></h3>
                                    </div>
                                    <div class="font uk-text-muted uk-margin-bottom uk-text-center"><?php echo $item->text; ?></div>
                                    <div class="uk-text-zero uk-text-center">
                                        <a class="font uk-text-secondary uk-position-relative uk-display-inline-block uk-text-small readmore" href="#">بیشتر بخوانید</a>
                                    </div>
                                </div>
                            </div>
		                <?php } $i++; ?>
	                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin uk-hidden@s"></ul>
    </div>
</div>