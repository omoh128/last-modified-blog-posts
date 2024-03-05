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

            $posts = get_posts($args);

            $post_titles = array();
            if (!empty($posts)) {
                foreach ($posts as $post) {
                    $post_titles[] = esc_html($post->post_title);
                }
                
                // Generate admin notice
                $notice_content = '<strong>' . __('Last Modified and Published Blog Post Titles', 'last-modified-blog-posts') . '</strong>';
                $notice_content .= '<ul>';
                foreach ($post_titles as $title) {
                    $notice_content .= '<li>' . $title . '</li>';
                }
                $notice_content .= '</ul>';
                echo '<div class="notice notice-info is-dismissible"><p>' . $notice_content . '</p></div>';
            }
        }
    }
}
