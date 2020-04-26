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

<?php if (getOnHolidays()): ?>
	<div id="webpHolidayNote">
		<p>Witryna Parafialna jest &quot;na&nbsp;wakacjach&quot;. Następna aktualizacja po zakończeniu sezonu urlopowego.</p>
		<p>W czasie wakacji nie&nbsp;ma Mszy&nbsp;Świętej w&nbsp;Cannes ani w&nbsp;Monako</p>
		<p><span id="webpHolidayNoteBtn">Zamknij</span></p>
	</div>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/holidays.js"></script>
<?php endif; ?>

<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/footer.js"></script>
<?php wp_footer(); ?>

<?php if ( function_exists( 'yoast_analytics' ) ) yoast_analytics(); ?>

</body>
</html>
