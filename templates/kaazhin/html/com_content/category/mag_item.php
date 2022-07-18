<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Create a shortcut for params.
$params = $this->item->params;
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (Associations::isEnabled() && $params->get('show_associations'));

$currentDate   = Factory::getDate()->format('Y-m-d H:i:s');
$isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $this->item->publish_up > $currentDate)
	|| ($this->item->publish_down < $currentDate && $this->item->publish_down !== null);

?>
<?php if ($isUnpublished) : ?><div class="system-unpublished"><?php endif; ?>

<?php if ($canEdit) : ?>
    <?php echo LayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item)); ?>
<?php endif; ?>

<?php // @todo Not that elegant would be nice to group the params ?>
<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date') || $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>
    <div class="magItem">
		<?php echo LayoutHelper::render('joomla.content.intro_image_mag', $this->item); ?>
	    <?php echo LayoutHelper::render('joomla.content.info_block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
		<?php echo LayoutHelper::render('joomla.content.intro_title_mag', $this->item); ?>
        <div class="uk-text-justify uk-text-secondary uk-text-small f500"><?php echo $this->item->introtext; ?></div>
		<?php if ($params->get('show_readmore') && $this->item->readmore) :
			if ($params->get('access-view')) :
				$link = Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
			else :
				$menu = Factory::getApplication()->getMenu();
				$active = $menu->getActive();
				$itemId = $active->id;
				$link = new Uri(Route::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
				$link->setVar('return', base64_encode(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
			endif; ?>
			<?php echo LayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); ?>
		<?php endif; ?>
    </div>
<?php if ($isUnpublished) : ?></div><?php endif; ?>
<?php /* echo $this->item->event->afterDisplayTitle; ?>
<?php echo $this->item->event->beforeDisplayContent; ?>
<?php echo $this->item->event->afterDisplayContent; */ ?>