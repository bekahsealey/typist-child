<?php get_header(); ?>

<?php
// The Query
if (is_home) {
    $gallery_query = new WP_Query( array( 'pagename' => 'front-page-gallery' ) );

    if ( $gallery_query->have_posts() ) {
        // The Loop
        while ( $gallery_query->have_posts() ) {
            $gallery_query->the_post();
            
                    get_template_part( 'content', get_post_format() );
        }
        
        /* Restore original Post Data 
         * NB: Because we are using new WP_Query we aren't stomping on the 
         * original $wp_query and it does not need to be reset with 
         * wp_reset_query(). We just need to set the post data back up with
         * wp_reset_postdata().
         */
        wp_reset_postdata();
    }
}

?>

<div id="column" class="<?php echo esc_attr(get_theme_mod('typist_bloglayout', 'left'));?>-sidebar">
    <div id="bloglist">
    
		<?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;					
                    
				the_posts_pagination( array(
					'prev_text'          => __( '&lt;&lt;', 'typist'),
					'next_text'          => __( '&gt;&gt;', 'typist'),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'typist' ) . ' </span>',
				) ); 
                       
            else :
                get_template_part( 'content', 'none' );
            endif;
        ?>
    
    </div><!--bloglist end-->

    <div id="sidewrap">
    	<?php get_sidebar(); ?>
    </div>
  
</div><!-- column end -->


<?php get_footer(); ?>