<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>
<div id="bodyRight">
	<div class="churchesList">
		<h2><span>Msze Święte na Lazurowym Wybrzeżu</span></h2>
		<a class="place" href="/">Nicea</a>
		<div class="info">
			<p>W Nicei Msza Święta odbywa się w każdą niedzielę w dwóch miejscach:</p>
			<ul>
				<li> Cole de Villefranche:  <a href="#" class="more time"><span>10:00</span></a></li>
				<li> Place Garibaldi: <a href="#" class="more time"><span>19:30</span></a></li>
			</ul>
			<a class="action more" href="/"><span>Kościół Polski Cannes, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="/">Cannes</a>
		<div class="info">
			<p>W Cannes Polska Masza Święta odbywa się w pierwszą i drugą niedzielę miesiąca:</p>
			<ul>
				<li> Eglise Sacre-Coeur: <a href="#" class="more time"><span>15:30</span></a></li>
			</ul>
			<a class="action more" href="/"><span>Kościół Polski Monaco, zdjęcia, mapa dojazdu</span></a>
		</div>
		
		<a class="place" href="/">Monaco</a>
		<div class="info last">
			<p>W Monako Polska Msza Święta odbywa się w trzecią i czwartą niedzielę miesiąca</p>
			<ul>
				 <li> Eglise Sainte Devote: <a href="#" class="more time"><span>15:30</span></a></li>
			</ul>
			<a class="action more" href="/"><span>Kościół Polski Nicea, zdjęcia, mapa dojazdu</span></a>
		</div>
	</div><!-- .churchesList -->
	
	<div class="sidebarBlock">
		<div class="left">
			<h3>Wszystkie ogłoszenia</h3>
			<?php get_calendar( ); ?>
		</div>
		<div class="right">
			<dl>
				<dt>Liturgia słowa</dt>
				<dd>Czytanie pierwsze: Kpł&nbsp;19,1-2.11-18</dd>
				<dd>Czytanie drugie: Ps 19,8.9.10.15</dd>
				<dd>Czytanie trzecie: Rz 5,12.17-19</dd>
				<dd>Ewangelia: Mt 25,31-46</dd>
			</dl>
		</div>
	</div><!-- .sidebarBlock -->
			
	<div class="contact">
		<p class="postTitle">Probosz parafii w Nicei</p>
		<p>
			<img src="<?php bloginfo( 'template_directory' ); ?>/img/homepage/bronislaw-rosiek-01.jpg" 
				alt="Ksiądz Bronisław Rosiek" />
			<strong>Ks. Bronisław Rosiek</strong><br/>
			<br/>
			Miejsce zamieszkania Proboszcza:<br/>
			142 Avenue de la Californie<br/>
			06200 Nice, France<br/>
			<br/>
			Tel./Fax: 04 97 07 12 29<br/>
			Tel. kom. PL: 0048 146 907 120<br/>
			Tel. kom. FR: 06 26 80 68 47
		</p>
		<p class="actions">
			<a class="action more" href="/"><span>Więcej</span></a>
		</p>
	</div><!-- .contact -->
</div><!-- #bodyRight -->