{$sScript}
{if $aMessages}
	<li class="dropdown-menu-header" role="presentation">
		<h5>{phrase var='mail.messages'}</h5>
		<span class="label label-round label-info">{$aMessages|count}</span>
	</li>
	<li data-plugin="" class="list-group v-scrollable min-height-250">
		{foreach from=$aMessages item=aMail}
		<a role="menuitem" onclick="$(this).removeClass('is_new');" href="{url link='mail.thread' id=$aMail.thread_id}" class="popup {if $aMail.viewer_is_new} is_new{/if} list-group-item" data-custom-class="mail_thread">
			<div class="media">
				<div class="media-left padding-right-10">
					{if $aMail.user_id == Phpfox::getUserId()}
						{img user=$aMail suffix='_50_square' max_width=50 max_height=50 no_link=true}
					{else}
						{if (isset($aMail.user_id) && !empty($aMail.user_id))}
							{img user=$aMail suffix='_50_square' max_width=50 max_height=50 no_link=true}
						{/if}
					{/if}
				</div>
				<div class="media-body">
					<h6 class="media-heading">
						{foreach from=$aMail.users name=mailusers item=aMailUser}
						<span>{$aMailUser.full_name|clean|shorten:35:'...'}</span>
						{/foreach}
					</h6>
					<div class="media-meta">
						{$aMail.time_stamp|convert_time}
					</div>
					<div class="media-detail">{$aMail.preview|clean|shorten:40:'...'|cleanbb}</div>
				</div>
				<div href="#" onclick="$.ajaxCall('mail.delete', 'id={$aMail.thread_id}', 'GET'); $(this).parents('li:first').slideUp();" class="js_hover_title noToggle media-right">
					<i class="fa fa-remove"></i><span class="js_hover_info">{phrase var='mail.archive'}</span>
				</div>
			</div>
		</a>

		{/foreach}
	</li>
{else}
<li class="dropdown-menu-header" role="presentation">
	<h5>{phrase var='mail.no_new_messages'}</h5>
</li>
<li>
	<div class="min-height-250"></div>
</li>
{/if}
<li class="dropdown-menu-footer">
	{if Phpfox::getUserParam('mail.can_compose_message')}
		<a href="{url link='mail.compose'}" class="popup js_hover_title dropdown-menu-footer-btn"><i class="fa fa-pencil-square"></i><span class="js_hover_info">{phrase var='mail.compose'}</span></a>
	{/if}
	<a href="#" class="no_ajax noToggle" onclick="$('body').toggleClass('mail_in_shift_mode'); return false;">{phrase var='mail.archive_message_s'}</a>
</li>