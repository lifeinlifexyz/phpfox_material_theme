<div class="section dark section-user">
	<div class="container-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="section-description">
				<h2 class="title">{phrase var='cmmaterial.popular_users'}</h2>
			</div>
		</div>
		{if !empty($aPopularUsers)}
		<div class="row">
			<?php
				$index = 0;
			?>
			{foreach from=$aPopularUsers item=aUser}
			<div class="col-md-4 col-sm-6 col-xs-12 item">
				<div class="card card-profile card-plain">
					<div class="col-xs-6">
						<a href="{url link = $aUser.user_name}" class="avatar card-image">
							{$aUser.profile_image}
						</a>
					</div>
					<div class="col-xs-6">
						<div class="content">
							<h4 class="card-title">{$aUser.full_name}</h4>
							<h6 class="category text-muted">{$aUser.total_friend} {phrase var='friend.menu_friend_friends_532c28d5412dd75bf975fb951c740a30'}</h6>
						</div>
					</div>
				</div>
			</div>
			<?php
				$index++;
				if ($index % 3 == 0):
			?>
			<div class="clearfix visible-md visible-lg"></div>
			<?php endif;
				if ($index % 2 == 0):
			?>
					<div class="clearfix visible-sm"></div>
			<?php endif;?>
			{/foreach}
		</div>
		{else}
		<span class="not_content">{phrase var='cmmaterial.no_users_found'}</span>
		{/if}
		<div class="clear"></div>
	</div>
</div>