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
<div class="uk-position-relative slideshow">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" data-uk-slideshow="ratio: false; animation: slide; autoplay: true; autoplay-interval: 4000;" id="<?php echo $modId; ?>">
        <ul class="uk-slideshow-items" data-uk-height-viewport="min-height: 300">
            <?php foreach ($params->get('slideshow') as $item) : ?>
                <?php if ($item->background != '') { ?>
                    <li>
                        <img src="<?php echo (HTMLHelper::cleanImageURL($item->background))->url; ?>" alt="<?php echo $item->title; ?>" class="uk-width-1-1" data-uk-cover>
                        <div class="coverWrapper uk-position-cover">
                            <span class="cover"></span>
                            <?php if (!empty($item->title) || !empty($item->subtitle)) { ?>
                                <div class="uk-position-center-right uk-width-1-1 uk-text-center">
                                    <div class="uk-container">
                                        <?php if (!empty($item->title)) { ?>
                                            <h2 class="uk-margin-remove font f200 uk-text-white" data-uk-slideshow-parallax="opacity: 0,1,0; x: 300,-300;"><?php echo nl2br($item->title); ?></h2>
                                        <?php } ?>
                                        <?php if (!empty($item->subtitle)) { ?>
                                            <p class="uk-margin-remove-bottom uk-margin-small-top uk-text-white font f400" data-uk-slideshow-parallax="opacity: 0,1,0; x: 600,-600;"><?php echo nl2br($item->subtitle); ?></p>
                                        <?php } ?>
                                        <div class="uk-margin-top">
                                            <a href="" class="uk-button uk-button-secondary uk-button-large" data-uk-slideshow-parallax="opacity: 0,1,0; x: 450,-450;">اطلاعات بیشتر</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
            <?php endforeach; ?>
        </ul>
        <div class="uk-width-1-1 uk-light slideshowButtons uk-visible@s">
            <div class="uk-grid-collapse" data-uk-grid>
                <div class="uk-width-auto uk-flex uk-flex-middle uk-flex-center bullets">
                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center"></ul>
                </div>
                <div class="uk-width-expand"></div>
                <div class="uk-width-auto arrows">
                    <span class="uk-flex uk-flex-center uk-flex-middle slideshowArrow cursorPointer uk-visible@s" data-uk-slideshow-item="next"><i class="fal fa-fw fa-2x fa-chevron-right"></i></span>
                </div>
                <div class="uk-width-auto arrows">
                    <span class="uk-flex uk-flex-center uk-flex-middle slideshowArrow cursorPointer uk-visible@s" data-uk-slideshow-item="previous"><i class="fal fa-fw fa-2x fa-chevron-left"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>