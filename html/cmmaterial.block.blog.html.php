{if !empty($aBlogs)}
<div class="section section-blogs">
	<div class="container-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="section-description">
				<h2 class="title">{$sTitle}</h2>
				<a href="{$sViewMoreUrl}" class="btn btn-primary btn-round">{phrase var='cmmaterial.view_more'}</a>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php
				$index = 0;
			?>
			{foreach from=$aBlogs item=aBlog}
			<div class="col-md-4 col-sm-6">
				<div class="card card-plain card-blog">
					<div class="card-image">
						<a href="{$aBlog.link}">
							<span class="img" style="background-image: url({$aBlog.url_photo});"></span>
						</a>
					</div>
					<div class="content">
						<h4 class="card-title">
							<a class="card-title" href="{$aBlog.link}">{$aBlog.title}</a>
						</h4>
						<p class="card-description">
							{$aBlog.parsed_text|stripbb|highlight:'search'|split:500|shorten:150:'...'}
							<a href="{$aBlog.link}">More</a>
						</p>
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
	</div>

</div>
{/if}