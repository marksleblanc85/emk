<?php

$blockFields = get_fields();
$customBlock = PXUtils::parse_custom_block($block, $blockFields);

if (is_array($blockFields)) {
	extract($blockFields);
}

?>
<div id="<?= $customBlock->id ?>" class=" <?= $customBlock->classesString ?>">
	<div class="container">
		<?php if(!empty(trim($heading))){?>
			<h2 class="columns-title"><?php echo $heading;?></h2>
		<?php }?>	
		

		<?php

			$debates = get_fields();
			if(!empty(trim($debates['top_content']))){
		?>
			<div class="top-content"><?php echo apply_filters('the_content',$debates['top_content']);?></div>
		<?php
			}
			foreach ( $debates['debates'] as $debate ) {
				$debate = $debate['debate'];
				$id = $debate->ID;
				$title = $debate->post_title;
				$fields = get_fields($id);
				$content = $fields['preview_content'];
				$image = $fields['featured_image']['sizes']['large'];
				$url = ( !empty($fields['link']) ) ? $fields['link']['url'] : get_permalink();
				$url_title = ( !empty($fields['link']) ) ? $fields['link']['title'] : get_the_title();
				?>
				<div class="debate-grid">
					<?php if (!empty($url)) { ?>
					<a class="full-link" href="<?php echo $url; ?>">
					<?php } ?>
						<div class="debate-grid-inn">
							<div class="debate preview-content">
								<?php if(isset($fields['preview_content_background_image']['html_large']) && !empty($fields['preview_content_background_image']['html_large'])){?>						
								<div class="debate__image">
									<?php echo $fields['preview_content_background_image']['html_large']; ?>
								</div>
								<?php }?>
								<div class="debate__content">
									<h3><?php echo $title; ?></h3>
									<div class="excerpt"><?php echo $content; ?></div>
								</div>
							</div>
							<div class="debate featured-image">
								<div class="debate__image">
									<?php echo $fields['featured_image']['html_large']; ?>
								</div>
								<div class="debate__content">
									<?php if (!empty($url_title)) { ?>
										<span><?php echo $url_title; ?></span>
									<?php } ?>								
								</div>
							</div>
						</div>
					<?php if (!empty($url)) { ?>
					</a>
					<?php } ?>
				</div>
				<!-- /.debate -->
				<?php
			}
		 ?>

		 </div>
		<!-- /.debate-grid -->


	</div>
</div>
