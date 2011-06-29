<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>
<div class="right">
	<?php get_search_form(); ?>
	<?php if (!is_page()) : ?>
		<div class="rightBlock contentMargin">
			<p class="underline">Archiwum ogłoszeń</p>
			<?php get_calendar( ); ?>
		</div>
	<?php endif; ?>
	
	<div class="rightBlock contentMargin insideMargins">
		<p class="underline">Proboszcz Parafii w Nicei</p>
		
		<?php if (!dynamic_sidebar('non-homepage-top') ) : ?>
			<h4>Ks. Bronisław Rosiek</h4>
			<p>
				Miejsce zamieszkania Proboszcza:<br/>
				142 Avenue de la Californie<br/>
				06200 Nice, France<br/>
			</p>
			<p>
				Tel./Fax: 04 97 07 12 29<br/>
				Tel. kom. PL: 0048 146 907 120<br/>
				Tel. kom. FR: 06 26 80 68 47
			</p>
		<?php endif; ?>
		<p>
			<a class="more action" href="<?php bloginfo( 'url' ); ?>/kontakt"><span>Więcej</span></a>
		</p>
	</div>

	<div class="rightBlock contentMargin dotted">
		<?php $subpGall = getSubpAdv(); ?>
		<div class="rightGallery <?php echo $subpGall['cls']; ?>">
			<a class="place" href="<?php bloginfo( 'url' ); ?><?php echo $subpGall['url']; ?>">
				<span class="title"><?php echo $subpGall['title']; ?></span>
				<span>
					<?php echo $subpGall['msg']; ?>
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-more.gif" alt="Więcej" />
				</span>
			</a>
		</div>
	</div>

	<div class="rightBlock contentMargin">
		<h2 class="underline">Niedzielne Msze Święte</h2>
		
		<?php if (!dynamic_sidebar('non-homepage-bottom') ) : ?>
		<a class="place" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-nicea">Nicea</a>
		<div class="info">
			<p>W Nicei Msza Święta odbywa się w każdą niedzielę w dwóch miejscach:</p>
			<ul>
				<li>Cole de Villefranche: <strong>10:00</strong></li>
				<li>Place Garibaldi: <strong>19:30</strong></li>
			</ul>
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-nicea"
				><span>Kościół Polski Nicea, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-cannes">Cannes</a>
		<div class="info">
			<p>W Cannes Polska Masza Święta odbywa się w pierwszą i drugą niedzielę miesiąca:</p>
			<ul>
				<li>Eglise Sainte Devote: <strong>15:30</strong></li>
			</ul>	
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-cannes"
				><span>Kościół Polski Cannes, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-monako">Monako</a>
		<div class="info last">
			<p>W Monako Polska Msza Święta odbywa się w trzecią i czwartą niedzielę miesiąca</p>
			<ul>
				<li>Eglise Sacre-Coeur: <strong>15:30</strong></li>
			</ul>		
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/kosciol-polski-monako"
				><span>Kościół Polski Monaco, zdjęcia, mapa dojazdu</span></a>
		</div>
		<?php endif; ?>
	</div>

	<div class="rightBlock contentMargin">
		<a class="rss action" href="<?php bloginfo('rss_url'); ?>"><span>Ogłoszenia parafialne RSS</span></a>
	</div>
</div><!-- .right -->