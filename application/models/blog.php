<?php
class Content {
	public function __construct() {
		// Set up post query
		//   Note that the query and navigation are designed for "Plain" setting permalinks.
		global $wp_query;
		$paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : 1;
		$tagname = ( get_query_var('tag') ) ? htmlentities( get_query_var('tag') ) : "";
		$query_args = array(
  			'post_type' => 'post',
  			'posts_per_page' => 5,
  			'paged' => $paged,
  			'tag' => $tagname,
		);
		$wp_query->query($query_args);

		// Correct tags urls output
		add_filter('tag_link', 'new_tag_link', 100);
		function new_tag_link($taglink) {
			$old = strtok($taglink, '?');
			$new = strtok($_SERVER["REQUEST_URI"], '?');
			$taglink = str_replace( $old, $new, $taglink );
			return $taglink;
		}

		echo "<article>";

			// Begin looping
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
					// Output the post
					echo "<br />"; 
					the_title(); echo "<br />";
			    	the_date(); echo "<br />";
			    	the_tags('Tags: ', ' • '); echo "<br />";
			    	echo "<div class='wp-entry'>";
						the_excerpt();
					echo "</div>";
				endwhile;
			} else {
				echo "No posts found. ";
			}			

			// Pagination feature
			//   Begin by correcting base url for pagination, since the code is extracting
			//   WordPress posts externally.
			add_filter('get_pagenum_link', function($url) {
				$base = strtok($_SERVER["REQUEST_URI"], '?');
				$query = explode('?', $url);
				$url = $base . '?' . $query[1];
				return $url;
			});
			//   Output the pagination
			$big = 999999999;
			echo "<div id = 'pagination' class = 'center'>";
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			echo "</div>";

		wp_reset_postdata(); 
		echo "</article>";
	}
}
?>