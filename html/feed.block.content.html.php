<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: content.html.php 7160 2014-02-26 17:20:13Z Fern $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !isset($aFeed.feed_mini)}
<div class="activity_feed_header">
	<div class="activity_feed_header_info">
		{$aFeed|user:'':'':50}{if (!empty($aFeed.parent_module_id) || isset($aFeed.parent_is_app))} {phrase var='feed.shared'}{else}{if isset($aFeed.parent_user)} {img theme='layout/arrow.png' class='v_middle'} {$aFeed.parent_user|user:'parent_':'':50} {/if}{if !empty($aFeed.feed_info)}<span class="feed_info"> {$aFeed.feed_info}</span>{/if}{/if}
		<time class="pull-right">
			<a href="{$aFeed.feed_link}" class="feed_permalink">{$aFeed.time_stamp|convert_time:'feed.feed_display_time_stamp'}</a>
            {if (isset($sponsor) && $sponsor) || (isset($aFeed.sponsored_feed) && $aFeed.sponsored_feed)}
            &nbsp;
        <span>
            <b>{phrase var='ad.sponsored'}</b>
        </span>
            {/if}
		</time>
	</div>
</div>
{/if}

<div class="activity_feed_content">
	{if (isset($aFeed.focus))}
	<div data-is-focus="1">
		{$aFeed.focus.html}
	</div>
	{else}
		{template file='feed.block.focus' feed_id=$aFeed.feed_id}
	{/if}

	{if isset($aFeed.feed_view_comment)}
		{module name='feed.comment'}
	{else}
		{template file='feed.block.comment'}
	{/if}

	{if $aFeed.type_id != 'friend'}
		{if isset($aFeed.more_feed_rows) && is_array($aFeed.more_feed_rows) && count($aFeed.more_feed_rows)}
			{if $iTotalExtraFeedsToShow = count($aFeed.more_feed_rows)}{/if}
			<a href="#" class="activity_feed_content_view_more" onclick="$(this).parents('.js_feed_view_more_entry_holder:first').find('.js_feed_view_more_entry').show(); $(this).remove(); return false;">{phrase var='feed.see_total_more_posts_from_full_name' total=$iTotalExtraFeedsToShow full_name=$aFeed.full_name|shorten:40:'...'}</a>
		{/if}
	{/if}
</div>