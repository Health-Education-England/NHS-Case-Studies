<?php

$query = array(
    'post_type'      => 'case-studies',
    'posts_per_page' => 3
);


if( $args["tax"] ):

$query['tax_query'] = array(
    array(
        'taxonomy' => 'cs_categories',
        'field'    => 'term_id',
        'terms'    => intval( $args["tax"] ),
    ),
);

endif;



$backend = $args["backend"];

$link_txt = $args["urlTxt"] ? $args["urlTxt"] : __('View all Case Studies', 'nhs_cs');
$link = $args["url"] ? get_term_link( intval( $args["url"] ), 'cs_categories' ) : get_post_type_archive_link( 'case-studies' );




$the_query = new WP_Query( $query );

if ( $the_query->have_posts() ) : ?>

    <div class="nhsuk-grid__item nhsuk-grid-column-full case-studies-cards">

        <?php if( ! $backend ):

        printf( '<h2> %s </h2>',
            $args["title"] ? $args["title"] : __('Latest Case Studies', 'nhs_cs')
        );

        endif; ?>

        <div class="nhsuk-grid-row nhsuk-promo-group">

            <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                    
            <div class="nhsuk-grid-column-one-third nhsuk-promo-group__item">
                <div class="nhsuk-promo">
                    <a class="nhsuk-promo__link-wrapper" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(null, [
                                'class' => 'nhsuk-promo__img'
                        ]); ?>
                        <div class="nhsuk-promo__content">
                            <h2 class="nhsuk-promo__heading"><?php the_title(); ?></h2>
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                </div>
            </div>

            <?php endwhile; 

            wp_reset_postdata(); ?>

        </div>

        <?php if( ! $backend ): ?>

        <div class="nhsuk-action-link text-center">
            <a class="nhsuk-action-link__link" href="<?php echo esc_url( $link ); ?>">
                <svg class="nhsuk-icon nhsuk-icon__arrow-right-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 2a10 10 0 0 0-9.95 9h11.64L9.74 7.05a1 1 0 0 1 1.41-1.41l5.66 5.65a1 1 0 0 1 0 1.42l-5.66 5.65a1 1 0 0 1-1.41 0 1 1 0 0 1 0-1.41L13.69 13H2.05A10 10 0 1 0 12 2z"></path>
                </svg>
                <span class="nhsuk-action-link__text"><?php echo esc_html( $link_txt ); ?></span>
            </a>
        </div>

        <?php endif; ?>

    </div>

<?php endif; ?>