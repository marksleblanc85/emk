<?php

$blockFields = get_fields();
$customBlock = PXUtils::parse_custom_block($block, $blockFields);

if (is_array($blockFields)) {
	extract($blockFields);
}
if(!empty($primary_image) || !empty($secondary_image) || !empty($tertiary_image)){
?>
<div id="<?= $customBlock->id ?>" class=" <?= $customBlock->classesString ?>">
	<?= $is_preview ? '<span class="block-badge">' . $customBlock->title . '</span>' : '' ?>
	<div class="container">
		<div class="overlap-img-inn">
			<?php if(!empty($primary_image)){?>
				<div class="primary-image overlap-img-area">
					<?php echo $primary_image['html']; ?>
				</div>
			<!-- /.primary-image -->
			<?php }
			if(!empty($secondary_image)){?>
			<div class="secondary-image overlap-img-area">
				<?php echo $secondary_image['html']; ?>
			</div>
			<!-- /.secondary-image -->
			<?php }
			if(!empty($tertiary_image)){?>
			<div class="tertiary-image overlap-img-area">
				<?php echo $tertiary_image['html']; ?>
			</div>
			<?php }?>
		</div>
	</div>
	<!-- /.container -->
</div>
<?php }?>
