<?php
/**
 * Main plugin class file.
 *
 * @package Last_Modified_Blog_Posts
 */

if (!class_exists('Last_Modified_Blog_Posts')) {

    class Last_Modified_Blog_Posts {

        /**
         * Constructor.
         */
        public function __construct() {
            add_action('admin_notices', array($this, 'display_last_modified_blog_posts_notice'));
        }

        /**
         * Display the admin notice with last modified blog post titles.
         */
        public function display_last_modified_blog_posts_notice() {
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 10,
                'orderby'        => 'modified',
                'order'          => 'DESC',
                'post_status'    => 'publish',
            );

            $query = new WP_Query($args);

            $post_titles = array();
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    // Discard posts with even IDs
                    if ($post_id % 2 !== 0) {
                        $post_titles[] = get_the_title();
                    }
                }
                wp_reset_postdata();

            
            
            
                // Generate admin notice
                if (!empty($post_titles)) {
                    $notice_content = '<strong>Last Modified and Published Blog Post Titles</strong>';
                    $notice_content .= '<ul>';
                    foreach ($post_titles as $title) {
                        $notice_content .= '<li>' . esc_html($title) . '</li>';
                    }
                    $notice_content .= '</ul>';
                    echo '<div class="notice notice-info is-dismissible"><p>' . $notice_content . '</p></div>';
                
                
                
                
                }
            }
        }
    }
}
