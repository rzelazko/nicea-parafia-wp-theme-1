<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>	
<?php $carouselSettings = getCarouselSettings(); ?>
<div id="headImage" style="background: url(<?php echo $carouselSettings[0]['src']; ?>) no-repeat;">
	<div id="headSlogan">
		<div class="place">
			<div class="placeName">
				<?php echo $carouselSettings[0]['place']; ?>
			</div>
			<ul class="scroller">
				<li><img src="<?php bloginfo( 'template_directory' ); ?>/img/homepage/arr-left.png" alt="Previous image" /></li>
				<li class="carouselElem selected">&middot;</li>
				<li class="carouselElem">&middot;</li>
				<li class="carouselElem">&middot;</li>
				<li class="carouselElem">&middot;</li>
				<li class="carouselElem">&middot;</li>
				<li><img src="<?php bloginfo( 'template_directory' ); ?>/img/homepage/arr-right.png" alt="Next image" /></li>
			</ul>
		</div>
		<div class="msg">
			<div><?php echo $carouselSettings[0]['msg']; ?></div>
			<div class="msgSource"><?php echo $carouselSettings[0]['msgSource']; ?></div>
		</div>
	</div>	
	<?php get_search_form(); ?>
</div><!-- #headImage -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/NPCarousel.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/homepage.js"></script>
<script type="text/javascript">
	var carouselSettings = <?php echo json_encode($carouselSettings); ?>;
</script>