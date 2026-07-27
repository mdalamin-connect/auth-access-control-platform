<?php

// Check if the function exists before declaring it
if (!function_exists('success_message')) {
    function success_message($config)
    {
        $html = "";

        $html .= "<div class='alert alert-success alert-dismissible'>";
        //$html.="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
        // $html.="<h5><i class='icon fas fa-check'></i> Success!</h5>";
        $html .= $config["message"];
        $html .= "</div>";

        return $html;
    }
}

// Check if the function exists before declaring it
if (!function_exists('pagination')) {
    function pagination($paginator)
    {
        if (!$paginator->hasPages()) {
            return '';
        }

        $html = '<div class="mirsaige-pagination">';
        $html .= '<ul class="mirsaige-pagination-list">';
        
        // First Page Link
        if (!$paginator->onFirstPage()) {
            $html .= '<li class="mirsaige-pagination-item">';
            $html .= '<a href="' . $paginator->url(1) . '" class="mirsaige-pagination-link" aria-label="First">&laquo;</a>';
            $html .= '</li>';
        }

        // Previous Page Link
        if ($paginator->onFirstPage()) {
            $html .= '<li class="mirsaige-pagination-item disabled">';
            $html .= '<span class="mirsaige-pagination-link disabled">&lsaquo;</span>';
            $html .= '</li>';
        } else {
            $html .= '<li class="mirsaige-pagination-item">';
            $html .= '<a href="' . $paginator->previousPageUrl() . '" class="mirsaige-pagination-link" rel="prev" aria-label="Previous">&lsaquo;</a>';
            $html .= '</li>';
        }

        // Pagination Elements
        foreach ($paginator->getUrlRange(
            max(1, $paginator->currentPage() - 2), 
            min($paginator->lastPage(), $paginator->currentPage() + 2)
        ) as $page => $url) {
            if ($page == $paginator->currentPage()) {
                $html .= '<li class="mirsaige-pagination-item active">';
                $html .= '<span class="mirsaige-pagination-link active">' . $page . '</span>';
                $html .= '</li>';
            } else {
                $html .= '<li class="mirsaige-pagination-item">';
                $html .= '<a href="' . $url . '" class="mirsaige-pagination-link">' . $page . '</a>';
                $html .= '</li>';
            }
        }

        // Next Page Link
        if ($paginator->hasMorePages()) {
            $html .= '<li class="mirsaige-pagination-item">';
            $html .= '<a href="' . $paginator->nextPageUrl() . '" class="mirsaige-pagination-link" rel="next" aria-label="Next">&rsaquo;</a>';
            $html .= '</li>';
        } else {
            $html .= '<li class="mirsaige-pagination-item disabled">';
            $html .= '<span class="mirsaige-pagination-link disabled">&rsaquo;</span>';
            $html .= '</li>';
        }

        // Last Page Link
        if ($paginator->currentPage() < $paginator->lastPage() - 2) {
            $html .= '<li class="mirsaige-pagination-item">';
            $html .= '<a href="' . $paginator->url($paginator->lastPage()) . '" class="mirsaige-pagination-link" aria-label="Last">&raquo;</a>';
            $html .= '</li>';
        }

        $html .= '</ul>';

        // Page Jump Form
        $html .= '<form class="mirsaige-pagination-form" method="GET" action="' . url()->current() . '">';
        $html .= '<input type="number" name="page" class="mirsaige-pagination-input" ';
        $html .= 'min="1" max="' . $paginator->lastPage() . '" ';
        $html .= 'value="' . $paginator->currentPage() . '">';
        $html .= '<button type="submit" class="mirsaige-pagination-submit">Go</button>';
        $html .= '</form>';

        $html .= '</div>';

        return $html;
    }
}
?>
