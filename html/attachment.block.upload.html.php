<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Attachment
 * @version 		$Id: upload.html.php 6589 2013-09-05 12:27:50Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bIsAllowed}
<div class="js_upload_attachment_parent_holder">
	<script type="text/javascript">$Core.loadStaticFile('{jscript file='share.js' module='attachment'}');</script>
	<div class="js_default_upload_form p_bottom_4" id="js_new_temp_form_0_{$sCategoryId}">
		<div class="js_upload_form_holder_global_temp">
	
		</div>
		<div class="js_upload_form_holder_global">
			<div class="js_upload_form_holder">
				<form method="post" enctype="multipart/form-data" action="{url link='attachment.frame'}?id={$id}" target="js_upload_frame" id="attachment_js_upload_frame_form" class="js_upload_frame_form">
					<div><input type="hidden" name="category_name" value="{$sCategoryId}" class="category_name" /></div>
					<div><input type="hidden" name="input" value="{$sAttachmentInput}" /></div>
					<div><input type="hidden" name="attachment_obj_id" value="{$sAttachmentObjId}" /></div>
					<div><input type="hidden" name="upload_id" value="js_new_temp_form_0_{$sCategoryId}" class="js_temp_upload_id" /></div>
					{if $bIsAttachmentInline}
					<div><input type="hidden" name="attachment_inline" value="true" /></div>
					{/if}
					{if $sCustomAttachment}
					<div><input type="hidden" name="custom_attachment" value="{$sCustomAttachment}" /></div>
					{/if}
					<div class="form-group">
						<div class="input-group input-group-file">
							<input id="upload-file-info-caption" type="text" class="form-control" readonly="" />
							<span class="input-group-btn">
							  <span class="btn btn-success btn-file">
								<i class="fa fa-upload" aria-hidden="true"></i>
								<input id="global_attachment_photo_file_input" {if isset($attachment_custom) && $attachment_custom = 'photo'} accept="image/*"{/if} class="js_file_attachment" type="file" name="file[]" value="" onchange="$('.activity_feed_form_button .button').removeClass('button_not_active'); $('#upload-file-info-caption').val($(this).val().replace(/^.*[\\\/]/, '')); $Core.uploadNewAttachment(this, {if $sCustomAttachment == 'video'}false{else}true{/if}, '{phrase var='attachment.uploading' phpfox_squote=true}');"/>
							  </span>
							</span>
						</div>
					</div>
					<iframe name="js_upload_frame" height="500" width="500" frameborder="1" style="display:none;"></iframe>
					<div class="extra_info">
						<b>{phrase var='attachment.valid_file_extensions'}:</b>
						{if empty($sAttachmentInput) && empty($sCustomAttachment)}
							{foreach from=$aValidExtensions key=iKey item=sValidExtension}
							{if $iKey != 0},{/if} {$sValidExtension}
						{/foreach}
						{else}
							{if $sCustomAttachment == 'photo'}
								{phrase var='attachment.jpg_gif_or_png'}
							{elseif $sCustomAttachment == 'video'}
								{$sVideoFileExt}
							{else}
								{phrase var='attachment.jpg_gif_or_png'}
							{/if}
						{/if}
						{if $iMaxFileSize !== null}
						<br />
						{phrase var='attachment.the_file_size_limit_is_max_file_size' max_file_size=$iMaxFileSize}
						{/if}
					</div>
				</form>
			</div>
			<div class="js_upload_form_image_holder">
				<div class="js_upload_form_image_holder_image">{img theme='ajax/add.gif'}</div>
				<span></span>
			</div>
		</div>
	</div>
	<div class="js_add_new_form"></div>
</div>
{else}
{phrase var='attachment.you_have_reached_your_upload_limit'}
{/if}

{if isset($bFixToken)}
	<script type='text/javascript'>		
		$('#user_design_profile').find('input[name^=core]:first').val($('#attachment_js_upload_frame_form').find('input[name^=core]:first').val());
	</script>
{/if}