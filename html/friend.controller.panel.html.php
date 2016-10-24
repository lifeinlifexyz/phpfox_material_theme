<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{$sScript}
{if $aFriends}
<li class="dropdown-menu-header" role="presentation">
    <h5>{phrase var='friend.menu_friend_friends'}</h5>
    <span class="label label-round label-info">{$aFriends|count}</span>
</li>
<li class="list-group min-height-250 v-scrollable">
    {foreach from=$aFriends name=notifications item=aNotification}
    <div id="drop_down_{$aNotification.request_id}" href="{url link=$aNotification.user_name}"
         class="panel_row {if !$aNotification.is_seen} is_new{/if}">
        <div class="media">
            <div class="media-left padding-right-10">
                {img user=$aNotification max_width='50' max_height='50' suffix='_50_square'}
            </div>
            <div class="media-body">
                <h6 class="media-heading">{$aNotification|user}</h6>
                <div class="media-meta">
                    {if $aNotification.relation_data_id > 0}
                    <div class="extra_info_link">
                        <i class="fa fa-heart"></i> {phrase var='mail.relationship_request_for'}
                        "{$aNotification.relation_name}"
                    </div>
                    {else}
                    {$aNotification.mutual_friends.total} <span class="to-lower">{phrase var='friend.mutual_friends'}</span>
                    {/if}
                </div>
                <div class="panel_action">
                    {if $aNotification.relation_data_id > 0}
                        <span
                            onclick="$(this).parents('.drop_data_action').find('.js_drop_data_add').show(); {if $aNotification.relation_data_id > 0} $.ajaxCall('custom.processRelationship', 'relation_data_id={$aNotification.relation_data_id}&amp;type=accept&amp;request_id={$aNotification.request_id}'); {else} $.ajaxCall('friend.processRequest', 'type=yes&amp;user_id={$aNotification.user_id}&amp;request_id={$aNotification.request_id}&amp;inline=true'); {/if}">{phrase var='friend.accept'}</span>
                        <span class="deny"
                              onclick="$(this).parents('.drop_data_action').find('.js_drop_data_add').show(); {if $aNotification.relation_data_id > 0} $.ajaxCall('custom.processRelationship', 'relation_data_id={$aNotification.relation_data_id}&amp;type=deny&amp;request_id={$aNotification.request_id}'); {else} $.ajaxCall('friend.processRequest', 'type=no&amp;user_id={$aNotification.user_id}&amp;request_id={$aNotification.request_id}&amp;inline=true'); {/if}">{phrase var='friend.deny'}</span>
                                    {else}
                        <span
                            onclick="$.ajaxCall('friend.processRequest', 'type=yes&amp;user_id={$aNotification.user_id}&amp;request_id={$aNotification.request_id}&amp;inline=true'); return false;">{phrase var='friend.accept'}</span>
                        <span
                            onclick="$.ajaxCall('friend.processRequest', 'type=no&amp;user_id={$aNotification.user_id}&amp;request_id={$aNotification.request_id}&amp;inline=true');"
                            class="deny">{phrase var='friend.deny'}</span>
                    {/if}
                </div>
            </div>
        </div>
    </div>
    {/foreach}
</li>
<li class="dropdown-menu-footer">

</li>
{else}
<li class="dropdown-menu-header" role="presentation">
    <h5>{phrase var='friend.no_new_friend_requests'}</h5>
</li>
<li>
    <div class="min-height-250"></div>
</li>
{/if}