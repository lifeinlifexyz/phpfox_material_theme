<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menu.html.php 6937 2013-11-24 18:11:09Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>

{if $bOnlyMobileLogin}
	<ul class="nav navbar-nav visible-xs visible-sm site_menu">
		<li>
			<div class="login-menu-btns-xs clearfix">
				<div class="div01">
					<a class="btn btn01 btn-success text-uppercase popup" rel="hide_box_title" role="link" href="{url link='login'}">
						<i class="fa fa-sign-in"></i> {phrase var='user.login_singular'}
					</a>
				</div>
				{if Phpfox::getParam('user.allow_user_registration')}
				<div class="div02">
					<a class="btn btn02 btn-warning text-uppercase popup" rel="hide_box_title" role="link" href="{url link='user.register'}">
						{phrase var='core.register'}
					</a>
				</div>
				{/if}
			</div>
		</li>
	</ul>
{else}
	{plugin call='core.template_block_template_menu_1'}
	{if Phpfox::isUser()}
		<div class="site-menubar-header">
			{module name='cmmaterial.user-cover'}
		</div>
	{/if}
	<div class="site-menubar-body v-scrollable">
		<ul class="site_menu">
			{if Phpfox::getUserBy('profile_page_id') <= 0 && isset($aMainMenus)}
			{plugin call='theme_template_core_menu_list'}
			{if ($iMenuCnt = 0)}{/if}

			{foreach from=$aMainMenus key=iKey item=aMainMenu name=menu}
				{if !isset($aMainMenu.is_force_hidden)}
					{iterate int=$iMenuCnt}
				{/if}

				<li class="site-menu-item{if isset($aMainMenu.is_selected) && $aMainMenu.is_selected} active {/if}" rel="menu{$aMainMenu.menu_id}" {if (isset($iTotalHide) && isset($iMenuCnt) && $iMenuCnt > $iTotalHide)} style="display:none;" {/if} {if (($aMainMenu.url == 'apps' && count($aInstalledApps)) || (isset($aMainMenu.children) && count($aMainMenu.children))) || (isset($aMainMenu.is_force_hidden))}class="{if isset($aMainMenu.is_force_hidden) && isset($iTotalHide)}is_force_hidden{else}explore{/if}{if ($aMainMenu.url == 'apps' && count($aInstalledApps))} explore_apps{/if}"{/if}>
					<a class="waves-effect waves-classic {if isset($aMainMenu.external) && $aMainMenu.external == true}no_ajax_link {/if}ajax_link" {if !isset($aMainMenu.no_link) || $aMainMenu.no_link != true}href="{url link=$aMainMenu.url}" {else} href="#" onclick="return false;" {/if}>
					<span class="site-menu-title">
						{phrase var=$aMainMenu.module'.'$aMainMenu.var_name}{if isset($aMainMenu.suffix)}{$aMainMenu.suffix}{/if}
					</span>
					</a>
				</li>
			{/foreach}
			{/if}
		</ul>
	</div>

{/if}