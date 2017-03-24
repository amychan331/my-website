<?php

class Blogs extends Model
{
    public function __construct() {
    	$this->content();
    }

    public function content() {
    	echo "<main id=\"blogs\">";
    	echo "<h4 class=\"italic right\">Content generated from my WordPress blog: <a class=\"icon\" href=blog><i class=\"fa fa-wordpress fa-2x\" aria-hidden=\"true\"></i></a></h4>";
    	$this->wploop();
    	echo "</main>";
    }

	public function wploop() {
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

		// Begin looping
		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				// Output the post
				echo "<h2>"; the_title(); echo "</h2>";
		    	the_date(); echo "<br />";
		    	the_tags('Tags: ', ' • '); echo "<br />";
		    	// Excerpt inside this tag will be replace by full content from WordPress blog when click activates Ajax:
		    	echo "<div class='wp-entry' aria-live='polite'>";
					the_excerpt();
				echo "</div>";
				// Hidden tag contains info on number of comments, to be unhidden when Ajax expands the excerpt into content.
				echo "<p class='center postmetadata' style='display:none;'>";
					comments_popup_link('No Comments', '1 Comment', '% Comments');
				echo "</p>";
				echo "<hr>";
			endwhile;
		} else {
			echo "No posts found.";
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
		echo "<div id='pagination' class='center'>";
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
		echo "</div>";
		wp_reset_postdata();
	}
}