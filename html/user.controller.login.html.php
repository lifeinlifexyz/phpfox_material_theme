<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright        [PHPFOX_COPYRIGHT]
 * @author        Raymond Benc
 * @package        Module_User
 * @version        $Id: login.html.php 3445 2011-11-03 13:11:23Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{$sCreateJs}
<div class="block">
    <div class="content">
        <ul class="signin_signup_tab flat-tab clearfix">
            <li class="active"><a rel="hide_box_title" href="javascript:void(0)">{phrase var='user.sign_in'}</a></li>
            {if Phpfox::getParam('user.allow_user_registration')}
            <li><a class="keepPopup" rel="hide_box_title" href="{url link='user.register'}">{phrase
                    var='user.sign_up'}</a></li>
            {/if}
        </ul>
        {plugin call='user.template_controller_login_block__start'}
        <form class="content" method="post" action="{url link="user.login"}" id="js_login_form" onsubmit="{$sGetJsForm}">
        <div class="form-group">
            <div class="input-group input-group-icon">
                <span class="input-group-addon">
                    {if Phpfox::getParam('user.login_type') == 'user_name'}
                    <i class="fa fa-user"></i>
                    {else}
                    <i class="fa fa-envelope"></i>
                    {/if}
                </span>
                <input class="form-control"
                       placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}Email{else}{phrase var='user.login'}{/if}"
                       type="{if Phpfox::getParam('user.login_type') == 'email'}email{else}text{/if}" name="val[login]"
                       id="login" value="{$sDefaultEmailInfo}" size="40"/>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group input-group-icon">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                </span>
                <input class="form-control" placeholder="{phrase var='user.password'}" type="password"
                       name="val[password]" id="password" value="" size="40" autocomplete="off"/>
            </div>
        </div>

        {if $bEnable2StepVerification}
        <div class="table form-group">
            <div class="table_right">
                <input class="form-control" placeholder="{phrase var='user.passcode'}" type="text" name="val[passcode]"
                       id="passcode" value="" size="40"/>
            </div>
            <div class="extra_info">
                <a class="no_ajax" target="_blank" href="{url link='user.passcode'}">{phrase
                    var='user.dont_receive_passcode_how_to_get_it'}</a>
            </div>
            <div class="clear"></div>
        </div>
        {/if}

        {if Phpfox::isModule('captcha') && Phpfox::getParam('user.captcha_on_login')}
        <div id="js_register_capthca_image">
            {module name='captcha.form'}
        </div>
        {/if}

        {plugin call='user.template_controller_login_end'}

        <div class="table_clear form-group">
            <button type="submit" class="button btn-primary text-uppercase">
                {phrase var='user.login_button'}
            </button>
            <div class="p_top_base checkbox">
                <ul class="clearfix">
                    <li>
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" class="checkbox" name="val[remember_me]" value="" id="remember_me"/>
                            <label for="remember_me">{phrase var='user.remember'}</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-control-static">
                            <a class="no_ajax" href="{url link='user.password.request'}">{phrase
                                var='user.forgot_your_password'}</a>
                        </div>
                    </li>
                </ul>
            </div>

            {plugin call='user.template.login_header_set_var'}
            {if isset($bCustomLogin)}
            <div class="p_top_8 custom_login">
                <span>{phrase var='user.or_login_with'}</span>
                <div class="p_top_4">
                    {plugin call='user.template_controller_login_block__end'}
                </div>
            </div>
            {/if}
        </div>
        <input type="hidden" name="val[parent_refresh]" value="1"/>
        </form>
    </div>
</div>
