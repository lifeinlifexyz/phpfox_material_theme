<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{$sScript}
{if $aNotifications}
<li class="dropdown-menu-header" role="presentation">
    <h5>{phrase var='notification.notifications'}</h5>
    <span class="label label-round label-info">{$aNotifications|count}</span>
</li>
<li class="list-group min-height-250 v-scrollable">
    {foreach from=$aNotifications name=notifications item=aNotification}
    <a href="{$aNotification.link}" id="js_notification_{$aNotification.notification_id}"
       class="list-group-item {if !$aNotification.is_seen} is_new{/if}">
        <div class="media">
            <div class="media-left padding-right-10">
                {if isset($aNotification.custom_icon)}
                <i class="fa {$aNotification.custom_icon}"></i>
                {else}
                {img user=$aNotification max_width='50' max_height='50' suffix='_50_square' no_link=true}
                {/if}
            </div>
            <div class="media-body">
                <h6 class="media-heading"><span>{$aNotification.message}</span></h6>
                <div class="media-meta">{$aNotification.time_stamp|convert_time}</div>
                <div class="media-detail">
                    {if isset($aNotification.custom_image)}
                    {$aNotification.custom_image}
                    {/if}
                </div>
            </div>
            <div href="#" class="js_hover_title noToggle notification_delete media-right"
               onclick="$.ajaxCall('notification.delete', 'id={$aNotification.notification_id}'); return false;">
                <span class="fa fa-times"></span>
                <span class="js_hover_info">
                    {phrase var='notification.delete_this_notification'}
                </span>
            </div>
        </div>
    </a>
    {/foreach}
</li>
<li class="dropdown-menu-footer">
    <a>&nbsp;</a>
    <a href="#"
       onclick="$('.js_notification_trash > i').removeClass('fa-trash').addClass('fa-circle-o-notch').addClass('fa-spin'); $(this).ajaxCall('notification.removeAll'); return false;"
       class="js_hover_title js_notification_trash dropdown-menu-footer-btn"><i class="fa fa-trash"></i><span
            class="js_hover_info">{phrase var='notification.remove_all_notifications'}</span></a>
</li>
{else}
<li class="dropdown-menu-header" role="presentation">
    <h5>{phrase var='notification.no_new_notifications'}</h5>
</li>
<li>
    <div class="min-height-250"></div>
</li>
{/if}