<?php
class Content {
	public function __construct() {
		echo "<main id='content'>";
		$this->subheader();
		$this->getArticle();
		echo "</main>";
	}

	private function subheader() {
		echo "<noscript>
    			<p>Efforts were made so this site remain functional without JavaScript.</p>
    			<p>JS on this page allow you to expand the excerpts into full content. If you don't want to do that, worry not - just click the link to my WordPress account!</p>
			</noscript>";
		echo <<< EOD
		<div id ='subheader'>
			<h1>Excerpts From 
			<a class='icon' href='http://www.craftplustech.com/blog/' aria-label="WordPress logo and Amy's WordPress link"><i class='fa fa-wordpress fa-2x' aria-hidden='true'></i></a>
			 My WordPress</h1>
			<p class='italic'>Feel free to read my blog, search via tags, or subscribe either here or at my WordPress blog - everything here is extracted dynamically via a custom WordPress loop, so there's no delays!</p>
		</div>
		<hr>
EOD;
	}

	private function getArticle() {
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
				echo "<br />"; 
				echo "<h2>"; the_title(); echo "</h2>";
		    	the_date(); echo "<br />";
		    	the_tags('Tags: ', ' • '); echo "<br />";
		    	// Excerpt inside this tag will be replace by full content from WordPress blog when click activates Ajax:
		    	echo "<div class='wp-entry'>";
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
		echo "<div id = 'pagination' class = 'center'>";
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
?>