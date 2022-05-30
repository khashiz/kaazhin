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
<div id="<?php echo $modId; ?>" class="uk-container uk-container-large">
    <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-column-large uk-grid-row-small" data-uk-grid>
        <div>
	        <?php echo JHtml::image('images/image2-home1-4.png', 'About', '', false); ?>
        </div>
        <div class="uk-flex uk-flex-middle">
            <div>
                <div>
                    <span class="uk-display-block font f400 uk-text-muted uk-margin-small-bottom"><?php echo $params->get('smalltitle', ''); ?></span>
                    <h3 class="uk-h2 font f700 uk-text-secondary uk-margin-remove-top"><?php echo $params->get('maintitle', ''); ?></h3>
                </div>
                <?php echo $module->content; ?>
                <div>
                    <a href="<?php echo JRoute::_("index.php?Itemid=".$params->get('btnhref', '')); ?>" class="uk-button uk-button-large uk-button-secondary uk-button-styled uk-button-outline" title=""><?php echo $params->get('btnlabel', ''); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>