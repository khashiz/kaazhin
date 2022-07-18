<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;
?>
<div>
    <div class="uk-grid-small" data-uk-grid>
	    <?php if ($params->get('img_intro_full') !== 'none' && !empty($item->imageSrc)) : ?>
            <div class="uk-width-1-4">
                <figure class="uk-cover-container">
                    <canvas width="200" height="200"></canvas>
		            <?php echo LayoutHelper::render(
			            'joomla.html.image',
			            [
                            'uk-cover' => '',
				            'src' => $item->imageSrc,
				            'alt' => $item->imageAlt,
			            ]
		            ); ?>
		            <?php if (!empty($item->imageCaption)) : ?>
                        <figcaption>
				            <?php echo $item->imageCaption; ?>
                        </figcaption>
		            <?php endif; ?>
                </figure>
            </div>
	    <?php endif; ?>
	    <?php if ($params->get('item_title')) : ?>
        <div class="uk-width-expand uk-flex uk-flex-middle">
	        <?php $item_heading = $params->get('item_heading', 'h4'); ?>
            <<?php echo $item_heading; ?> class="font uk-text-tiny f500 newsflash-title">
                <?php if ($item->link !== '' && $params->get('link_titles')) : ?>
                    <a class="uk-text-secondary uk-display-block" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                <?php else : ?>
                    <?php echo $item->title; ?>
                <?php endif; ?>
            </<?php echo $item_heading; ?>>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php /* if (!$params->get('intro_only')) : ?>
	<?php echo $item->afterDisplayTitle; ?>
<?php endif; */ ?>

<?php /* echo $item->beforeDisplayContent; */ ?>

<?php /* if ($params->get('show_introtext', 1)) : ?>
	<?php echo $item->introtext; ?>
<?php endif; */ ?>

<?php /* echo $item->afterDisplayContent; */ ?>

<?php /* if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
	<?php echo LayoutHelper::render('joomla.content.readmore', array('item' => $item, 'params' => $item->params, 'link' => $item->link)); ?>
<?php endif; */ ?>