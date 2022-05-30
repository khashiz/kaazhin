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
<div id="<?php echo $modId; ?>" class="uk-child-width-1-1 uk-child-width-1-3@m uk-grid-collapse" data-uk-grid>
	<?php foreach ($params->get('items') as $item) : ?>
		<?php if ($item->title != '') { ?>
            <div>
                <a href="<?php echo $item->href; ?>" title="<?php echo $item->title; ?>" class="uk-display-block uk-position-relative boxItem" target="_blank" id="<?php echo $item->title; ?>">
	                <?php echo JHtml::image($item->background, 'About', '', false); ?>
                    <span class="uk-position-absolute uk-position-bottom-right uk-position-medium uk-text-white font title"><?php echo $item->title; ?></span>
                    <span class="uk-position-absolute uk-position-bottom-left uk-position-medium uk-text-white font number"><?php echo $item->number; ?></span>
                </a>
            </div>
		<?php } ?>
	<?php endforeach; ?>
</div>
