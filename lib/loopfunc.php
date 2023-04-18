<?php
function get_recent_posts_query($ppp = 10, $paginate = false, $num = false,  $cat_id = false)
{
    $bg_color = '#ccc';
    $cate_link = '';
    $cat_name = '';
    $current_page = max(1, get_query_var('paged'));
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'paged' => $current_page,
        'cat' => $cat_id,
    );
    $allposts = new WP_Query($args);
    if ($cat_id) {
        $cate= get_category($cat_id);
        $cate_link = get_term_link($cate->slug, 'category');
        $cat_name = $cate->name;
        $bg_color =  category_description($cate->cat_ID);
        $output = '<ul class="c-listpost" id="cat_' . $num . '">';
    }
    $cate_link = get_category_link($cat_id);
    while ($allposts->have_posts()) : $allposts->the_post();
        if (!$cat_id) {
            $cates = get_the_category();
            $cate_link = get_term_link($cates[0]->slug, 'category');
            $cat_name = $cates[0]->name;
            $bg_color =  category_description($cates[0]->cat_ID);
        };
        $output .= '<li class="c-listpost__item">';
        $output .= '<div class="c-listpost__info">';
        $output .= '<span class="datepost">' . esc_html(get_the_time('Y/m/d')) . '</span>';
        $output .= '   <span class="cat">
                                    <i class="c-dotcat" style="background-color: ' . $bg_color . '"></i>
                                    <a href="' . $cate_link . '">' . $cat_name . '</a>
                                </span></div>';
        $output .= '<h3 class="titlepost"><a href="' . esc_url(get_the_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3> ';
        $output .= '</li>';
    endwhile;
    if ($cat_id) {
        $output .= '</ul>';
    }
    if ($paginate) {
        $big = 999999999;
        $paginate_links = paginate_links(array(
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $allposts->max_num_pages,
            'prev_next' => True,
            'prev_text' => '',
            'next_text' => '',
        ));
        if ($paginate_links) {
            $output .= '<div class="c-pnav">' . $paginate_links . '</div>';
        }
    }
    wp_reset_postdata();
    return $output;
}
