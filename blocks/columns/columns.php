<?php

$blockFields = get_fields();
$customBlock = PXUtils::parse_custom_block($block, $blockFields);

if (is_array($blockFields)) {
	extract($blockFields);
}
?>
<div id="<?= $customBlock->id ?>" class=" <?= $customBlock->classesString ?>">
	<?= $is_preview ? '<span class="block-badge">' . $customBlock->title . '</span>' : '' ?>

	<div class="container">
		<?php if(!empty(trim($heading))){?>
			<h1 class="columns-title"><?php echo $heading;?></h1>
		<?php }?>
		<div class="<?php if($grid_type == 'list'){echo 'list';}elseif($grid_type == 'testimonial-grid'){ echo 'testimonial-grid';}else{echo 'lg:grid lg:grid-cols-3 grid-list';}?>">
			<?php foreach ($items as $column) : ?>
			<div class="<?php if($column['type'] == 'icon-link'){echo 'p-0';} else{echo 'p-10';}?> border border-base-blue group hover:cursor-pointer relative <?= $column['type'] === 'testimonial' ? 'flex flex-col justify-between' : ''; if($column['type'] != 'icon-link' && $column['type'] != 'testimonial'){ echo 'link-wrap';} ?>" <?= !empty($column['link']) && strlen($column['link']['url']) > 1 ? 'data-card-link' : '' ?>>
				
				<?php if ($column['type'] === 'icon-link') :?>

							
							<?php if (isset($column['image'])) : ?>
								<div class="relative aspect-square">
									<img class="object-cover object-center absolute w-full h-full top-0 opacity-100  <?= isset($column['hover_content']) && !empty($column['hover_content']) ? 'group-hover:opacity-0' : '' ?> transition"
										src="<?= $column['image']['sizes']['large'] ?? $column['image']['url'] ?>"
										alt="<?= $column['image']['caption'] ?? $column['image']['description'] ?>">
								</div>
							<?php endif; ?>

							<div class="column__content bg-base-blue/90 w-full h-full flex flex-wrap justify-center content-center items-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-100 group-hover:opacity-0 transition">
								<?php if (!empty($column['icon'])) : ?>
									
									<div class="relative w-24 h-24 mb-4">
										<img class="object-contain object-center absolute w-full h-full top-0 opacity-100 transition"
										src="<?= $column['icon']['sizes']['thumbnail'] ?? $column['icon']['url'] ?>"
										alt="<?= $column['icon']['caption'] ?? $column['icon']['description'] ?>">
									</div>
								<?php endif; ?>
								<h5 class="text-white w-full text-center"><?= $column['title'] ?></h5>
							</div>

							<div class="column__link bg-base-gray absolute bottom-0 w-full text-center p-1 left-1/2 transform -translate-x-1/2 translate-y-1/2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition">
							<?php if (!empty($column['link'])) : ?>
								<a href="<?= $column['link']['url'] ?>"
								class="arrow-link"><?= $column['link']['title'] ?></a>
								<?php endif; ?>
							</div>
						
					

				<?php elseif ($column['type'] === 'testimonial') :?>

				<p class="text-lg"><?= $column['quote'] ?></p>
				<p class="font-sans uppercase mt-10 text-sm">
					<b><?= $column['name'] ?></b> <br>
					<?= $column['position'] ?>
				</p>

				<?php else: ?>
				<?php if (isset($column['link']['url']) && !empty(trim($column['link']['url']))) : ?>
					<a class="group-wrap" href="<?= $column['link']['url'] ?>">
					<?php else: ?>
					<div class="group-wrap">
					<?php endif;?>
						<?php if (isset($column['image'])) : ?>
						<div class="image-wrap">
							<img src="<?= $column['image']['sizes']['large'] ?? $column['image']['url'] ?>"
								alt="<?= $column['image']['caption'] ?? $column['image']['description'] ?>">
						</div>
						<?php endif; ?>
						<div class="content-wrap">
							<h3 class="text-base-blue"><?= $column['title'] ?></h3>
							<?php if (isset($column['hover_content']) && !empty($column['hover_content'])) :?>
							<div class="wysiwyg">
								<?= $column['hover_content'] ?>
							</div>
							<?php endif; ?>
						</div>
					<?php if (isset($column['link']['url']) && !empty(trim($column['link']['url']))) : ?>
					</a>
					<?php else: ?>
					</div>				
				<?php endif;?>
				
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>