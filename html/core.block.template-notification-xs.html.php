<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author           Raymond_Benc
 * @package          Phpfox
 * @version          $Id: template-notification.html.php 2838 2011-08-16 19:09:21Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
<div id="xs-nav" class="collapse hidden-sm hidden-md hidden-lg">
    {if Phpfox::isUser()}
        <div class="navbar-container container-fluid">
        <ul class="nav navbar-toolbar">
                <li class="pl-5" id="hd-request">
                    <a role="button"
                       data-toggle="dropdown"
                       class="btn-abr"
                       data-panel="#request-panel-body-xs"
                       data-url="{url link='friend.panel'}">
                        <i class="fa fa-user-plus"></i>
                        <span id="js_total_new_friend_requests"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-media" id="request-panel-body-xs">
                    </div>
                </li>
                <li class="pl-5" id="hd-notification">
                    <a role="button"
                       class="btn-abr"
                       data-panel="#notification-panel-body-xs"
                       data-toggle="dropdown"
                       data-url="{url link='notification.panel'}">
                        <i class="fa fa-bell"></i>
                        <span id="js_total_new_notifications"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left dropdown-menu-media" id="notification-panel-body-xs">
                    </ul>
                </li>
                <li class="pl-5" id="hd-message">
                    <a role="button"
                       class="btn-abr"
                       data-toggle="dropdown"
                       data-panel="#message-panel-body-xs"
                       data-url="{url link='mail.panel'}">
                        <i class="fa fa-envelope"></i>
                        <span id="js_total_new_messages"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" id="message-panel-body-xs">
                    </ul>
                </li>
                <li class="pl-0" id="hd-cof">
                    <a href="#"
                       class="btn-abr"
                       data-toggle="dropdown"
                       type="button"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dont-unbind">
                        <li role="presentation">
                            <a href="{url link='user.setting'}" class="no_ajax">
                                <i class="fa fa-cog"></i>
                                {phrase var='user.account_settings'}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{url link='user.profile'}" class="no_ajax">
                                <i class="fa fa-edit"></i>
                                {phrase var='core.edit_profile'}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{url link='friend'}" class="no_ajax">
                                <i class="fa fa-group"></i>
                                {phrase var='core.manage_friends'}
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="{url link='user.privacy'}" class="no_ajax">
                                <i class="fa fa-shield"></i>
                                {phrase var='user.privacy_settings'}
                            </a>
                        </li>
                        {if Phpfox::isAdmin() }
                        <li class="divider"></li>
                        <li role="presentation">
                            <a href="{url link='admincp'}" class="no_ajax">
                                <i class="fa fa-diamond"></i>
                                {phrase var='core.menu_admincp'}
                            </a>
                        </li>
                        {/if}
                        <li class="divider"></li>
                        <li role="presentation">
                            <a href="{url link='user.logout'}" class="no_ajax logout">
                                <i class="fa fa-toggle-off"></i>
                                {phrase var='user.logout'}
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    {else}
        <div>
            <ul class="nav navbar-toolbar">
                <li style="width: 50%">
                    <a class="btn-success text-uppercase popup" rel="hide_box_title" role="link" href="{url link='login'}">
                        <i class="fa fa-sign-in"></i> {phrase var='user.login_singular'}
                    </a>
                </li>
                <li style="width: 50%">
                    {if Phpfox::getParam('user.allow_user_registration')}
                    <a class="btn-warning text-uppercase popup" rel="hide_box_title" role="link"
                       href="{url link='user.register'}">
                        {phrase var='core.register'}
                    </a>
                    {/if}
                </li>
                <?php if (setting('m9_facebook_enabled')):?>
                <li style="width: 50%">
                    <a class="btn-primary text-uppercase" rel="hide_box_title" role="link" style="font-size: smaller;background: #3b5998 !important; border:none !important;"
                       href="{url link='fb.login'}">
                        <i class="fa fa-facebook-official"></i> Facebook
                    </a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    {/if}
</div>
