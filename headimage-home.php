<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>	
<div id="headImage">
	<div id="headSlogan">
		<div class="place">
			<div class="placeName">
				Cole de Villefranche<br/>Nicea
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
			<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices consequat arcu, ac vehicula justo ultrices dapibus.</div>
			<div class="msgSource">Lipsum.com</div>
		</div>
	</div>
	<form id="headSearch" method="GET" action="/">
		<input type="text" name="q" value="" class="text" />
		<input type="submit" value="Szukaj" class="button" />
	</form>
</div><!-- #headImage -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/NPCarousel.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/homepage.js"></script>
<script type="text/javascript">
	var carouselSettings = [
		{
			src: '<?php bloginfo( 'template_directory' ); ?>/img/homepage/main-carousel/cole-de-villefranche.jpg',
			place: 'Cole de Villefranche<br/>Nicea',
			msg: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices consequat arcu, ac vehicula justo ultrices dapibus.',
			msgSource: 'Lipsum.com'
		},
		{
			src: '<?php bloginfo( 'template_directory' ); ?>/img/homepage/main-carousel/chemin-de-l-energie.jpg',
			place: 'Chemin de l\'Energie<br/>Alpy Nadmorskie',
			msg: 'A potem Bóg rzekł &laquo;Niech zbiorą się wody spod nieba w jedno miejsce i niech się ukaże powierzchnia sucha!&raquo;',
			msgSource: 'Rdz 1'
		},
		{
			src: '<?php bloginfo( 'template_directory' ); ?>/img/homepage/main-carousel/promenade-des-anglais.jpg',
			place: 'Promenade des Anglais<br/>Nicea',
			msg: 'Vestibulum a lorem in mi cursus vehicula. Mauris non lectus nunc, sed congue magna. Sed turpis sem, pretium non ultricies sed, pretium at odio. Nam in justo at lorem laoreet pharetra.',
			msgSource: 'Lorem Ipsum'
		},
		{
			src: '<?php bloginfo( 'template_directory' ); ?>/img/homepage/main-carousel/st-pierre.jpg',
			place: 'Chapelle Saint Pierre<br/>Saint Paul de Vence',
			msg: 'Phasellus eu dui massa, ut sollicitudin metus. Donec ac risus mauris. Nullam dui est, tempus at volutpat at, accumsan venenatis neque.',
			msgSource: 'Neque porro'
		},
		{
			src: '<?php bloginfo( 'template_directory' ); ?>/img/homepage/main-carousel/val-d-allos.jpg',
			place: 'Val d\'Allos<br/>Alpy Prowansalskie',
			msg: 'Donec mi est, euismod at ultricies quis, pretium eget mi. Etiam vitae lorem quam. Donec fermentum, nisi ut vehicula sodales, ante nisi dapibus elit, nec rhoncus erat dolor a massa.',
			msgSource: 'Praesent leo'
		}
	];
</script>