<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?><form id="headSearch" method="GET" action="<?php echo home_url( '/' ) ?>">
	<input type="text" name="s" id="s" value="<?php echo get_search_query() ?>" class="text" />
	<input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search'); ?>" class="button" />
</form>