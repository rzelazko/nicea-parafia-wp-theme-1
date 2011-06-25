<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */

function getDefaultOptions($type) {
	if ($type == 'carousel') {
		$np_def_carousel_opts = array(
			'homeimg0_src' => 'cole-de-villefranche.jpg',
			'homeimg0_place' => 'Cole de Villefranche<br/>Nicea',
			'homeimg0_msg' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices consequat arcu, ac vehicula justo ultrices dapibus.',
			'homeimg0_msgSource' => 'Lipsum.com',
		
			'homeimg1_src' => 'val-d-allos.jpg',
			'homeimg1_place' => 'Val d\'Allos<br/>Alpy Prowansalskie',
			'homeimg1_msg' => 'Donec mi est, euismod at ultricies quis, pretium eget mi. Etiam vitae lorem quam. Donec fermentum, nisi ut vehicula sodales, ante nisi dapibus elit, nec rhoncus erat dolor a massa.',
			'homeimg1_msgSource' => 'Praesent leo',
		
			'homeimg2_src' => 'chemin-de-l-energie.jpg',
			'homeimg2_place' => 'Chemin de l\'Energie<br/>Alpy Nadmorskie',
			'homeimg2_msg' => 'A potem Bóg rzekł &laquo;Niech zbiorą się wody spod nieba w jedno miejsce i niech się ukaże powierzchnia sucha!&raquo;',
			'homeimg2_msgSource' => 'Rdz 1',
		
			'homeimg3_src' => 'promenade-des-anglais.jpg',
			'homeimg3_place' => 'Promenade des Anglais<br/>Nicea',
			'homeimg3_msg' => 'Vestibulum a lorem in mi cursus vehicula. Mauris non lectus nunc, sed congue magna. Sed turpis sem, pretium non ultricies sed, pretium at odio. Nam in justo at lorem laoreet pharetra.',
			'homeimg3_msgSource' => 'Lorem Ipsum',
		
			'homeimg4_src' => 'st-pierre.jpg',
			'homeimg4_place' => 'Chapelle Saint Pierre<br/>Saint Paul de Vence',
			'homeimg4_msg' => 'Phasellus eu dui massa, ut sollicitudin metus. Donec ac risus mauris. Nullam dui est, tempus at volutpat at, accumsan venenatis neque.',
			'homeimg4_msgSource' => 'Neque porro'
		);
		
		return $np_def_carousel_opts;
	}
	else if ($type == 'homepage-adverts') {
		$np_def_homepage_adv = array(		
			'adv0_enabled' => '1',
			'adv0_src' => 'garibaldi.jpg',
			'adv0_cls' => 'garibaldi',
			'adv0_url' => '/kosciol-polski-nicea',
			'adv0_place' => 'Nicea, Plac Garibaldi',
			'adv0_msg' => 'Niedzielna Msza Święta o godzinie 19:30',

			'adv1_enabled' => '1',
			'adv1_src' => 'garibaldi.jpg',
			'adv1_cls' => 'garibaldi',
			'adv1_url' => '/kosciol-polski-cannes',
			'adv1_place' => 'Cannes',
			'adv1_msg' => 'Pierwsza i druga niedziela miesiąca, godzina 15:30',

			'adv2_enabled' => '1',
			'adv2_src' => 'monaco.jpg',
			'adv2_cls' => 'monaco',
			'adv2_url' => '/kosciol-polski-monako',
			'adv2_place' => 'Monako',
			'adv2_msg' => 'Trzecia i czwarta niedziela miesiąca, godzina 15:30',

			'adv3_enabled' => '1',
			'adv3_src' => 'villefranche.jpg',
			'adv3_cls' => 'villefranche',
			'adv3_url' => '/kosciol-polski-nicea',
			'adv3_place' => 'Nicea, Cole de Villefranche',
			'adv3_msg' => 'Niedzielna Msza Święta o godzinie 10:00'
		);
		
		return $np_def_homepage_adv;
	}
	
	$np_def_subpage_opts = array(
		'subpimg0_cls' => 'cross',
		'subpimg0_src' => 'church-cross.jpg',
		'subpimg0_place' => 'Miasto - opis miejsca',
	
		'subpimg1_cls' => 'monaco',
		'subpimg1_src' => 'monaco.jpg',
		'subpimg1_place' => 'Monako - kaplica OO.Karmelitów',
	);
	
	return $np_def_subpage_opts;
}

/*---------------------------------------------*/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'niceaparafia_options', 'niceaparafia_theme_carousel' );
	register_setting( 'niceaparafia_options', 'niceaparafia_theme_subpimg' );
	register_setting( 'niceaparafia_options', 'niceaparafia_theme_hmpgadv' );
} 

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( 
		__( 'Ustawienia wyglądu', 'niceaparafia' ), 
		__( 'Ustawienia wyglądu', 'niceaparafia' ), 
		'edit_theme_options', 
		'theme_options', 
		'theme_options_do_page' );
} 

/**
 * Create the options page
 */
function theme_options_do_page() {
	$np_def_carousel_opts = getDefaultOptions('carousel');
	$np_def_subpage_opts = getDefaultOptions('subpage-img');
	$np_def_homepage_adv = getDefaultOptions('homepage-adverts');

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Ustawienia wyglądu', 'niceaparafia' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated"><p><strong><?php _e( 'Zapisano ustawienia', 'niceaparafia' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'niceaparafia_options' ); ?>
			
			<h3>Karuzela</h3>
			<table class="form-table">
			
				<?php $carousel_options = get_option( 'niceaparafia_theme_carousel', $np_def_carousel_opts ); ?>
				<?php $carousel_keys = array_keys($carousel_options); ?>
				<?php arsort($carousel_keys); ?>
				<?php $total_opts = preg_replace('/[^0-9]*/', '', current($carousel_keys)); ?>
				<?php for ($i = 0; $i <= $total_opts; $i++) : ?>
					<?php $opt_key = 'homeimg' . $i; ?>
					<tr valign="top">
						<th scope="row"><img 
							src="<?php bloginfo( 'template_directory' ) ?>/img/homepage/main-carousel-admin/<?php echo $carousel_options[$opt_key . '_src']; ?>" 
							alt="" /></th>
						<td>
							<fieldset>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_carousel[<?php echo $opt_key ?>_place]"
										name="niceaparafia_theme_carousel[<?php echo $opt_key ?>_place]" 
										value="<?php esc_attr_e( $carousel_options[$opt_key . '_place'] ); ?>" />
								</label>Nazwa miejsca</p>
								<p><label>
									<textarea class="regular-text" cols="40" rows="3" 
										id="niceaparafia_theme_carousel[<?php echo $opt_key ?>_msg]"
										name="niceaparafia_theme_carousel[<?php echo $opt_key ?>_msg]"
										><?php esc_attr_e( $carousel_options[$opt_key . '_msg'] ); ?></textarea>
								</label>Cytat</p>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_carousel[<?php echo $opt_key ?>_msgSource]"
										name="niceaparafia_theme_carousel[<?php echo $opt_key ?>_msgSource]" 
										value="<?php esc_attr_e( $carousel_options[$opt_key . '_msgSource'] ); ?>" />
								</label>Źródło</p>
							</fieldset>
							<input type="hidden" 
								name="niceaparafia_theme_carousel[<?php echo $opt_key ?>_src]" 
								value="<?php esc_attr_e( $carousel_options[$opt_key . '_src'] ); ?>" />
						</td>
					</tr>
				<?php endfor; ?>
			</table>
			
			<h3>Podstrony</h3>			
			<table class="form-table">

				<?php $subp_options = get_option( 'niceaparafia_theme_subpimg', $np_def_subpage_opts ); ?>
				<?php $subp_keys = array_keys($subp_options); ?>
				<?php arsort($subp_keys); ?>
				<?php $total_opts = preg_replace('/[^0-9]*/', '', current($subp_keys)); ?>
				<?php for ($i = 0; $i <= $total_opts; $i++) : ?>
					<?php $opt_key = 'subpimg' . $i; ?>
					<tr valign="top">
						<th scope="row"><img 
							src="<?php bloginfo( 'template_directory' ) ?>/img/subpage/top-admin/<?php echo $subp_options[$opt_key . '_src']; ?>" 
							alt="" /></th>
						<td>
							<fieldset>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_subpimg[<?php echo $opt_key ?>_place]"
										name="niceaparafia_theme_subpimg[<?php echo $opt_key ?>_place]" 
										value="<?php esc_attr_e( $subp_options[$opt_key . '_place'] ); ?>" />
								</label>Nazwa miejsca</p>
							<input type="hidden" 
								name="niceaparafia_theme_subpimg[<?php echo $opt_key ?>_src]" 
								value="<?php esc_attr_e( $subp_options[$opt_key . '_src'] ); ?>" />
							<input type="hidden" 
								name="niceaparafia_theme_subpimg[<?php echo $opt_key ?>_cls]" 
								value="<?php esc_attr_e( $subp_options[$opt_key . '_cls'] ); ?>" />
						</td>
					</tr>
				<?php endfor; ?>
			</table>

			<h3>Reklamy - strona główna</h3>
			<table class="form-table">

				<?php $hadv_options = get_option( 'niceaparafia_theme_hmpgadv', $np_def_homepage_adv ); ?>
				<?php $hadv_keys = array_keys($hadv_options); ?>
				<?php arsort($hadv_keys); ?>
				<?php $total_opts = preg_replace('/[^0-9]*/', '', current($hadv_keys)); ?>
				<?php for ($i = 0; $i <= $total_opts; $i++) : ?>
					<?php $opt_key = 'adv' . $i; ?>
					<tr valign="top">
						<th scope="row"><img 
							src="<?php bloginfo( 'template_directory' ) ?>/img/homepage/small-info-admin/<?php echo $hadv_options[$opt_key . '_src']; ?>" 
							alt="" /></th>
						<td>
							<fieldset>
								<p><label>
									<input type="checkbox" <?php if ( $hadv_options[$opt_key . '_enabled'] ): ?> checked="checked" <?php endif; ?>
										id="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_enabled]"
										name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_enabled]" 
										value="1" />
									Wyświetlaj reklamę
								</label><span class="description">Odznaczenie opcji spowoduje, 
								że reklama przestanie się ukazywać na stronie</span></p>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_place]"
										name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_place]" 
										value="<?php esc_attr_e( $hadv_options[$opt_key . '_place'] ); ?>" />
									Nazwa miejsca
								</label></p>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_msg]"
										name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_msg]" 
										value="<?php esc_attr_e( $hadv_options[$opt_key . '_msg'] ); ?>" />
									Treść reklamy
								</label><span class="description">Właściwa treść reklamy</span></p>
								<p><label>
									<input class="regular-text" type="text"
										id="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_url]"
										name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_url]" 
										value="<?php esc_attr_e( $hadv_options[$opt_key . '_url'] ); ?>" />
									URL
								</label><span class="description">Adres strony, do której prowadzi reklama</span></p>
							<input type="hidden" 
								name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_src]" 
								value="<?php esc_attr_e( $hadv_options[$opt_key . '_src'] ); ?>" />
							<input type="hidden" 
								name="niceaparafia_theme_hmpgadv[<?php echo $opt_key ?>_cls]" 
								value="<?php esc_attr_e( $hadv_options[$opt_key . '_cls'] ); ?>" />
						</td>
					</tr>
				<?php endfor; ?>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Zapisz zmiany', 'niceaparafia' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}