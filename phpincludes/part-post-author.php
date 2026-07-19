<?php
/*
Package: OnAir2
Description: AUTHOR PART
Version: 3.8.7
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

/**
 * Build list of authors. With Co-Authors Plus active, one box per co-author;
 * otherwise fall back to the single post author.
 */
$onair2_authors = array();
if ( function_exists( 'get_coauthors' ) ) {
    foreach ( get_coauthors() as $onair2_coauthor ) {
        $onair2_authors[] = array(
            'id'          => $onair2_coauthor->ID,
            'name'        => $onair2_coauthor->display_name,
            'description' => $onair2_coauthor->description,
            'url'         => get_author_posts_url( $onair2_coauthor->ID, $onair2_coauthor->user_nicename ),
            'avatar'      => get_avatar_url( $onair2_coauthor->user_email, array( 'size' => 500 ) ),
        );
    }
} else {
    $onair2_authors[] = array(
        'id'          => get_the_author_meta( 'ID' ),
        'name'        => get_the_author(),
        'description' => get_the_author_meta( 'description' ),
        'url'         => get_author_posts_url( get_the_author_meta( 'ID' ) ),
        'avatar'      => get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 500 ) ),
    );
}

foreach ( $onair2_authors as $onair2_author ) {
?>
<!-- AUTHOR PART RIGHT IMAGE INSIDE BOX WITH BIO ========================= -->
<div class="qt-post-author qt-card" style="display: flex; align-items: flex-start; justify-content: space-between; padding: 20px;">

    <div class="qt-post-author-data" style="max-width: 70%;">
        <h6><?php echo esc_html__("Author","onair2"); ?></h6>
        <h4>
            <a href="<?php echo esc_url( $onair2_author['url'] ); ?>">
                <?php echo esc_html( $onair2_author['name'] ); ?>
            </a>

            <?php
            // Get Yoast SEO pronouns (replace 'yoast_pronouns' with the actual meta key)
            $pronouns = get_user_meta( $onair2_author['id'], 'yoast_pronouns', true );
            if($pronouns) {
                echo ' <span class="qt-author-pronouns" style="font-weight: normal; font-size: 0.8em;">(' . esc_html($pronouns) . ')</span>';
            }
            ?>

        </h4>
        <?php
        if( $onair2_author['description'] ) {
            echo '<p class="qt-author-bio" style="margin-top: 10px; font-size: 0.9rem; line-height: 1.6;">' . esc_html( $onair2_author['description'] ) . '</p>';
        }
        ?>
    </div>

    <?php if( $onair2_author['avatar'] != '' ) { ?>
    <div class="qt-post-author-pictureNEW" style="flex-shrink: 0;">
        <a href="<?php echo esc_url( $onair2_author['url'] ); ?>">
            <img src="<?php echo esc_url( $onair2_author['avatar'] ); ?>" alt="<?php echo esc_attr( $onair2_author['name'] ); ?>" style="width: 150px; height: 150px; object-fit: cover;">
        </a>
    </div>
    <?php } ?>

</div>
<!-- AUTHOR PART END ========================= -->
<?php } ?>
