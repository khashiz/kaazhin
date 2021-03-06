<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseScript('mod_menu', 'mod_menu/menu.min.js', [], ['type' => 'module']);
$wa->registerAndUseScript('mod_menu', 'mod_menu/menu-es5.min.js', [], ['nomodule' => true, 'defer' => true]);

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use mod-menu instead
?>
<ul<?php echo $id; ?> class="uk-flex uk-flex-center <?php echo $class_sfx; ?>">
<?php foreach ($list as $i => &$item)
{
	$itemParams = $item->getParams();
	$class      = 'nav-item item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $itemParams->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $itemParams->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	echo '<li class="' . $class . '">';

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			require ModuleHelper::getLayoutPath('mod_menu', 'main_' . $item->type);
			break;

		default:
			require ModuleHelper::getLayoutPath('mod_menu', 'main_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
	    if ($item->id == 113) {
            echo '<div data-uk-drop="offset: 0; animation: uk-animation-slide-bottom-small; pos: bottom-justify; boundary: #megaMenuBoundry; boundary-align: true"><div class="uk-background-white uk-box-shadow-small uk-flex uk-flex-column"><div class="uk-switcher megaMenuWrapper">'.JHtml::_('content.prepare', '{loadposition mega}').'</div><ul class="uk-child-width-expand uk-flex-first uk-background-muted uk-padding-small uk-grid-small megaTabs" data-uk-grid data-uk-switcher="connect: .megaMenuWrapper; animation: uk-animation-scale-up, uk-animation-fade;">';
        } else {
            echo '<div data-uk-drop="animation: uk-animation-slide-bottom-small;'.($item->level == 2 ? " pos: left-top; offset: 30;" : " offset: 0;").'"><div class="uk-background-white uk-box-shadow-small subMenuWrapper"><ul class="uk-padding-small">';
        }
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></div></div></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>
