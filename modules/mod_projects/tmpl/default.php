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
<div class="uk-child-width-1-1 uk-grid-collapse" data-uk-grid>
	<?php $i = 1; foreach ($params->get('projects') as $item) : ?>
		<?php if ($item->title != '') { ?>
            <?php if ($i == 1 || $i ==6) { ?>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <div class="item-<?php echo $i; ?>">
                        <div class="uk-text-center">
                            <div class="uk-inline-clip uk-transition-toggle">
                                <div class="uk-cover-container">
                                    <canvas width="1000" height="500" class="uk-visible@s"></canvas>
                                    <canvas width="500" height="500" class="uk-hidden@s"></canvas>
                                    <img src="<?php echo (HTMLHelper::cleanImageURL($item->bg))->url; ?>" class=" uk-transition-scale-up uk-transition-opaque" alt="" data-uk-cover>
                                </div>
                                <div class="uk-transition-slide-bottom uk-position-bottom-right uk-overlay uk-overlay-primary">
                                    <h4 class="uk-margin-remove font uk-text-white f600"><?php echo $item->title; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="uk-width-1-1 uk-width-1-4@s">
                    <div class="item-<?php echo $i; ?>">
                        <div class="uk-text-center">
                            <div class="uk-inline-clip uk-transition-toggle">
                                <div class="uk-cover-container">
                                    <canvas width="500" height="500"></canvas>
                                    <img src="<?php echo (HTMLHelper::cleanImageURL($item->bg))->url; ?>" class=" uk-transition-scale-up uk-transition-opaque" alt="" data-uk-cover>
                                </div>
                                <div class="uk-transition-slide-bottom uk-position-bottom-right uk-overlay uk-overlay-primary">
                                    <h4 class="uk-margin-remove font uk-text-white f600"><?php echo $item->title; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
		<?php } $i++; ?>
	<?php endforeach; ?>
</div>