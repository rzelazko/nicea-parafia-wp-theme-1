<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>
        </div><!-- #body -->
    </div><!-- .main -->
    
    <div id="footer">
        <div class="main">        	
		    <div class="pageLogo">
		        <a href="<?php bloginfo( 'url' ); ?>/">
		        	<img src="<?php bloginfo( 'template_directory' ); ?>/img/nicea-parafia-small.png" alt="Parafia Nicea" />
		        	<span class="logoLine1">Polska Parafia</span>
		        	<span class="logoLine2">Nicea Cannes Monaco</span>
		        </a>
		    </div><!-- .pageLogo -->
			
			<div class="nav">
				<ul>
					<li><a href="<?php bloginfo( 'url' ); ?>/">Strona główna</a></li>					
					
            		<?php wp_nav_menu( array( 
            			'theme_location' => 'footer-menu', 
            			'container' => '', 
            			'items_wrap' => '%3$s', 
            			'before' => ' | ',
            			'depth' => 0
            		) ); ?>
				</ul>
			</div><!-- .nav -->
			
		    <a href="http://www.webperfekt.pl/" class="webpLogo">
		    	<img src="<?php bloginfo( 'template_directory' ); ?>/img/webperfekt.png" alt="Projektowanie stron internetowych WebPerfekt" />
		    </a><!-- .webpLogo -->			
        </div><!-- .main -->
    </div><!-- #footer -->
</div><!-- #content -->

<div id="header">
    <div class="nav">
        <ul>
            <li class="first <?php if ( my_is_home() ) : ?> current-menu-item <?php endif; ?>"><a href="<?php bloginfo( 'url' ); ?>/"><img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-hmpg.png" /></a></li>
            
			<?php if ( my_is_home() ) : ?>
				<li><span id="searchIco"><img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-search.png" /></span></li>
			<?php endif; ?>
					
            <?php wp_nav_menu( array( 
            	'theme_location' => 'header-menu', 
            	'container' => '', 
            	'items_wrap' => '%3$s', 
            	'depth' => 0
            ) ); ?>

        </ul>
    </div><!-- .nav -->

    <?php get_template_part( 'headimage', my_is_home() ? 'home' : 'subpage' ); ?>
    
    <div class="pageLogo">
        <a href="<?php bloginfo( 'url' ); ?>/">
        	<img src="<?php bloginfo( 'template_directory' ); ?>/img/nicea-parafia.png" alt="Parafia Nicea" />
        	<span class="logoLine1">Polska Parafia</span>
        	<span class="logoLine2">Nicea Cannes Monaco</span>
        </a>
    </div><!-- .pageLogo -->
</div><!-- #header -->

<?php wp_footer(); ?>

</body>
</html>