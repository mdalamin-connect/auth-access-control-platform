<?php
 function success_message($config){
    $html="";

    $html.="<div class='alert alert-success alert-dismissible'>";
    //$html.="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
   // $html.="<h5><i class='icon fas fa-check'></i> Success!</h5>";
    $html.=$config["message"];
    $html.="</div>";

    return $html;
  }
function pagination($page, $totalPages) {
    $next = ($page + 1) < $totalPages ? ($page + 1) : $totalPages;
    $prev = ($page - 1) > 0 ? ($page - 1) : 1;
    
    $links = "<div class='mirsaige-pagination'>";
    $links .= "<ul class='mirsaige-pagination-list'>";
    
    // First Page Link
    $links .= "<li class='mirsaige-pagination-item'>";
    $links .= "<a href='?page=1' class='mirsaige-pagination-link' aria-label='First'>&laquo;</a>";
    $links .= "</li>";
    
    // Previous Page Link
    $links .= "<li class='mirsaige-pagination-item'>";
    $links .= "<a href='?page=$prev' class='mirsaige-pagination-link' rel='prev' aria-label='Previous'>&lsaquo;</a>";
    $links .= "</li>";
    
    // Pagination Elements
    $start = max(1, $page - 2);
    $end = min($totalPages, $page + 2);
    
    if ($start > 1) {
        $links .= "<li class='mirsaige-pagination-item'>";
        $links .= "<span class='mirsaige-pagination-ellipsis'>...</span>";
        $links .= "</li>";
    }
    
    for ($i = $start; $i <= $end; $i++) {
        if ($i == $page) {
            $links .= "<li class='mirsaige-pagination-item active'>";
            $links .= "<span class='mirsaige-pagination-link active'>$i</span>";
            $links .= "</li>";
        } else {
            $links .= "<li class='mirsaige-pagination-item'>";
            $links .= "<a href='?page=$i' class='mirsaige-pagination-link'>$i</a>";
            $links .= "</li>";
        }
    }
    
    if ($end < $totalPages) {
        $links .= "<li class='mirsaige-pagination-item'>";
        $links .= "<span class='mirsaige-pagination-ellipsis'>...</span>";
        $links .= "</li>";
    }
    
    // Next Page Link
    $links .= "<li class='mirsaige-pagination-item'>";
    $links .= "<a href='?page=$next' class='mirsaige-pagination-link' rel='next' aria-label='Next'>&rsaquo;</a>";
    $links .= "</li>";
    
    // Last Page Link
    $links .= "<li class='mirsaige-pagination-item'>";
    $links .= "<a href='?page=$totalPages' class='mirsaige-pagination-link' aria-label='Last'>&raquo;</a>";
    $links .= "</li>";
    
    $links .= "</ul>";
    
    // Page Jump Form
    $links .= "<form class='mirsaige-pagination-form' method='GET' action=''>";
    $links .= "<input type='number' name='page' class='mirsaige-pagination-input' min='1' max='$totalPages' value='$page'>";
    $links .= "<button type='submit' class='mirsaige-pagination-submit'>Go</button>";
    $links .= "</form>";
    
    $links .= "</div>";
    
    return $links;
}
?>