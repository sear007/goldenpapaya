<?php
class Custom_Nav_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = array('nav-item nav-link');
        if (in_array('current-menu-item', $item->classes)) {
            $classes[] = 'active';
        }

        $output .= '<a class="' . implode(' ', $classes) . '" href="' . $item->url . '">' . $item->title . '</a>';
    }
}