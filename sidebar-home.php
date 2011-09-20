<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>
<div id="bodyRight">
	
	<div class="churchesList">
		<h3><span>Msze Święte na Lazurowym Wybrzeżu</span></h3>
		<?php if (!dynamic_sidebar('homepage-top') ) : ?>
		<a class="place" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-nicea">Nicea</a>
		<div class="info">
			<p>W Nicei Msza Święta odbywa się w każdą niedzielę w dwóch miejscach:</p>
			<ul>
				<li>Cole de Villefranche: <strong>10:00</strong></li>
				<li>Place Garibaldi: <strong>19:30</strong></li>
			</ul>
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-nicea"
				><span>Kościół Polski Nicea, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-cannes">Cannes</a>
		<div class="info">
			<p>W Cannes Polska Masza Święta odbywa się w pierwszą i drugą niedzielę miesiąca:</p>
			<ul>
				<li>Eglise Sacre-Coeur: <strong>15:30</strong></li>
			</ul>	
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-cannes"
				><span>Kościół Polski Cannes, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-monaco">Monaco</a>
		<div class="info last">
			<p>W Monaco Polska Msza Święta odbywa się w trzecią i czwartą niedzielę miesiąca</p>
			<ul>
				<li>Eglise Sainte Devote: <strong>15:30</strong></li>
			</ul>		
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/msze-swiete/kosciol-polski-monaco"
				><span>Kościół Polski Monaco, zdjęcia, mapa dojazdu</span></a>
		</div>
		<?php endif; ?>
	</div><!-- .churchesList -->
		
	<div class="sidebarBlock">
		<div class="left">
			<span class="title">Wszystkie ogłoszenia</span>
			<?php get_calendar( ); ?>
		</div>
		<div class="right">
			<dl>
				<dt>Liturgia słowa na dziś</dt>
				<?php getReadingsForMass(); ?>
			</dl>
		</div>
	</div><!-- .sidebarBlock -->
	
				
	<div class="contact">
		<p class="postTitle">Probosz parafii w Nicei</p>
		<p>
			<img src="<?php esc_attr_e( getHmpgContactImg() ); ?>" 
				alt="Ksiądz Bronisław Rosiek" />
			<?php if (!dynamic_sidebar('homepage-bottom') ) : ?>
				<strong>Ks. Bronisław Rosiek</strong><br/>
				<br/>
				Miejsce zamieszkania Proboszcza:<br/>
				142 Avenue de la Californie<br/>
				06200 Nice, France<br/>
				<br/>
				Tel./Fax: 04 97 07 12 29<br/>
				Tel. kom. PL: 0048 146 907 120<br/>
				Tel. kom. FR: 06 26 80 68 47
			<?php endif; ?>
		</p>
		<p class="actions">
			<a class="action more" href="<?php bloginfo( 'url' ); ?>/kontakt"><span>Więcej</span></a>
		</p>
	</div><!-- .contact -->
	
</div><!-- #bodyRight -->
