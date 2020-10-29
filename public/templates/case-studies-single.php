<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nightingale
 * @copyright NHS Leadership Academy, Tony Blacker
 * @version 1.1 21st August 2019
 */

get_header();
?>


<div id="primary" class=" nhsuk-grid-row nhsuk-width-restrict">
		<div class="
		<?php
        if ( \NHS_CASESTUDIES\ADMIN\Custom_Sidebar\nhs_cs_show_sidebar() ) :
            echo 'nhsuk-grid-column-two-thirds ';
            echo nightingale_sidebar_location( 'case-studies' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        endif;
     	?>
		case-studies-single">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content' );
				

			endwhile; // End of the loop.
			?>

			<?php nightingale_get_prev_next(); ?>

		</div>
		
		<?php include 'case-studies-sidebar.php'; ?>

	</div><!-- #primary -->

	


<?php
get_footer();