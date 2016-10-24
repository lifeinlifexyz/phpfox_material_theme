<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 4176 2012-05-16 10:49:38Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !defined('PHPFOX_IS_USER_PROFILE') || $aUser.user_id == Phpfox::getUserId() || (Phpfox::getUserParam('profile.can_post_comment_on_profile') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'feed.share_on_wall'))}
<div class="block-shadow">
  <div class="activity_feed_form_share">
    <div class="activity_feed_form_share_process">{img theme='ajax/add.gif' class='v_middle'}</div>
    {if !isset($bSkipShare)}
    <ul class="activity_feed_form_attach">
      <li class="share">
        <a role="button">{phrase var='feed.share'}:</a>
      </li>
      {if isset($aFeedCallback.module)}
      <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div>{phrase var='feed.post'}<span class="activity_feed_link_form_ajax">{$aFeedCallback.ajax_request}</span></div><div class="drop"></div></a></li>
      {elseif !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))}
      <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div>{phrase var='feed.status'}<span class="activity_feed_link_form_ajax">user.updateStatus</span></div><div class="drop"></div></a></li>
      {else}
      <li><a href="#" rel="global_attachment_status" class="global_attachment_status active"><div>{phrase var='feed.post'}<span class="activity_feed_link_form_ajax">feed.addComment</span></div><div class="drop"></div></a></li>
      {/if}
      {foreach from=$aFeedStatusLinks item=aFeedStatusLink name=feedlinks}

      {if $phpfox.iteration.feedlinks == 3 && Profile_Service_Profile::instance()->timeline()}
      <li><a href="#" rel="view_more_link" class="timeline_view_more js_hover_title"><span class="js_hover_info">{phrase var='feed.view_more'}</span></a>
        <ul class="view_more_drop">
          {/if}

          {if isset($aFeedCallback.module) && $aFeedStatusLink.no_profile}
          {else}
          {if ($aFeedStatusLink.no_profile && !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))) || !$aFeedStatusLink.no_profile}
          <li>
            <a href="#" rel="global_attachment_{$aFeedStatusLink.module_id}"{if $aFeedStatusLink.no_input} class="no_text_input"{/if}>
            {$aFeedStatusLink.title|convert}
            <div>
              {if $aFeedStatusLink.is_frame}
              <span class="activity_feed_link_form">{url link=''$aFeedStatusLink.module_id'.frame'}</span>
              {else}
              <span class="activity_feed_link_form_ajax">{$aFeedStatusLink.module_id}.{$aFeedStatusLink.ajax_request}</span>
              {/if}
              <span class="activity_feed_extra_info">{$aFeedStatusLink.description|convert}</span>
            </div>
            <div class="drop"></div>
            </a>
          </li>
          {/if}
          {/if}

          {if $phpfox.iteration.feedlinks == count($aFeedStatusLinks) && Profile_Service_Profile::instance()->timeline()}
        </ul>
      </li>
      {/if}

      {/foreach}
    </ul>
    {/if}
    <div class="clear"></div>
  </div>

  <div class="activity_feed_form">
    <form method="post" action="#" id="js_activity_feed_form" enctype="multipart/form-data">
      <div id="js_custom_privacy_input_holder"></div>
      {if isset($aFeedCallback.module)}
      <div><input type="hidden" name="val[callback_item_id]" value="{$aFeedCallback.item_id}" /></div>
      <div><input type="hidden" name="val[callback_module]" value="{$aFeedCallback.module}" /></div>
      <div><input type="hidden" name="val[parent_user_id]" value="{$aFeedCallback.item_id}" /></div>
      {/if}
      {if isset($bFeedIsParentItem)}
      <div><input type="hidden" name="val[parent_table_change]" value="{$sFeedIsParentItemModule}" /></div>
      {/if}
      {if defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id != Phpfox::getUserId()}
      <div><input type="hidden" name="val[parent_user_id]" value="{$aUser.user_id}" /></div>
      {/if}
      {if isset($bForceFormOnly) && $bForceFormOnly}
      <div><input type="hidden" name="force_form" value="1" /></div>
      {/if}
      <div class="activity_feed_form_holder">

        <div id="activity_feed_upload_error" style="display:none;"><div class="error_message" id="activity_feed_upload_error_message"></div></div>

        <div class="global_attachment_holder_section" id="global_attachment_status" style="display:block;">
          <div id="global_attachment_status_value" style="display:none;"></div>
          <textarea  {if isset($aPage)} id="pageFeedTextarea" {else} {if isset($aEvent)} id="eventFeedTextarea" {else} {if isset($bOwnProfile) && $bOwnProfile == false}id="profileFeedTextarea" {/if}{/if}{/if} cols="60" rows="8" name="val[user_status]" placeholder="{if isset($aFeedCallback.module) || defined('PHPFOX_IS_USER_PROFILE')}{phrase var='feed.write_something'}{else}{phrase var='feed.what_s_on_your_mind'}{/if}"></textarea>
          {if isset($bLoadCheckIn) && $bLoadCheckIn == true}
          <script type="text/javascript">
            oTranslations['feed.at_location'] = "{phrase var='feed.at_location'}";
          </script>
          <div id="js_location_feedback"></div>
          {/if}
        </div>

        {foreach from=$aFeedStatusLinks item=aFeedStatusLink}
        {if !empty($aFeedStatusLink.module_block)}
        {module name=$aFeedStatusLink.module_block}
        {/if}
        {/foreach}
        {if Phpfox::isModule('egift')}
        {module name='egift.display'}
        {/if}
      </div>
      <div class="activity_feed_form_button">
        {if $bLoadCheckIn}
        <div id="js_location_input">
          <a class="btn btn-danger" href="#" onclick="$Core.Feed.cancelCheckIn(); return false;"><i class="fa fa-times"></i></a>
          <input type="text" id="hdn_location_name">
        </div>
        {/if}

        <div class="activity_feed_form_button_status_info">
          <textarea id="activity_feed_textarea_status_info" cols="60" rows="8" name="val[status_info]"></textarea>
        </div>
        <div class="activity_feed_form_button_position">

          {if (defined('PHPFOX_IS_PAGES_VIEW') && $aPage.is_admin)}

          <div id="activity_feed_share_this_one">
            <ul class="">
              {if defined('PHPFOX_IS_PAGES_VIEW') && $aPage.is_admin && $aPage.page_id != Phpfox::getUserBy('profile_page_id') && ($aPage.item_type == 0)}
              <li>
                <input type="hidden" name="custom_pages_post_as_page" value="{$aPage.page_id}">
                <a data-toggle="dropdown" role="button" class="btn btn-lg">
                  <span class="txt-prefix">{phrase var='pages.posting_as'}: </span>
                  <span class="txt-label">{$aPage.full_name|clean|shorten:20:'...'}</span>
                  <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-checkmark">
                  <li>
                    <a class="is_active_image" data-toggle="privacy_item" role="button" rel="{$aPage.page_id}">{$aPage.full_name|clean|shorten:20:'...'}</a>
                  </li>
                  <li>
                    <a data-toggle="privacy_item" role="button" rel="0">{$sGlobalUserFullName|shorten:20:'...'}</a>
                  </li>
                </ul>
              </li>
              {/if}
              {if $bLoadCheckIn}
              {template file='feed.block.checkin'}
              {/if}
            </ul>
            <div class="clear"></div>
          </div>

          {else}
          {if $bLoadCheckIn}
          <div id="activity_feed_share_this_one">
            <ul>
              {template file='feed.block.checkin'}
            </ul>
            <div class="clear"></div>
          </div>
          {/if}
          {/if}

          <div class="activity_feed_form_button_position_button">
            <input type="submit" value="{phrase var='feed.share'}"  id="activity_feed_submit" class="button btn-lg btn-primary" />
          </div>
          {if isset($aFeedCallback.module)}
          {else}
          {if !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))}
          {module name='privacy.form' privacy_name='privacy' privacy_type='mini'}
          {/if}
          {/if}
          <div class="clear"></div>
        </div>

        {if Phpfox::getParam('feed.enable_check_in') && (Phpfox::getParam('core.ip_infodb_api_key') != '' || Phpfox::getParam('core.google_api_key') != '')}
        <div id="js_add_location">
          <div><input type="hidden" id="val_location_latlng" name="val[location][latlng]"></div>
          <div><input type="hidden" id="val_location_name" name="val[location][name]"></div>
          <div id="js_add_location_suggestions" style="overflow-y: auto;"></div>
          <div id="js_feed_check_in_map"></div>
        </div>
        {/if}

      </div>
    </form>
    <div class="activity_feed_form_iframe"></div>
  </div>
</div>
{/if}