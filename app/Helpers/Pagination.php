<?php

namespace App\Helpers;

class Pagination
{
    /**
     * @param $currentPage
     * @param $totalResults
     * @param $perPage
     * @param $url
     * @echo string
     *
     * create the actual pagination html
     */
    public static function view($currentPage, $totalResults, $perPage, $url){
        if($totalResults > $perPage) {
            $total_pages = ceil($totalResults / $perPage);
            $html_output = '<ul class="pagination">';

            if (($currentPage - 1) != 0) {
                $html_output .= '<li><a style="border-radius: 5px 0 0 5px;" href="' . $url . '&page=' . ($currentPage - 1) . '">قبلی <i class="fa fa-chevron-left" style="color: #2c8dad;"></i></a></li>';
            } else {
                $html_output .= '<li class="disabled" onclick="return false"><a style="border-radius: 5px 0 0 5px; background-color: #e0dddd; color: white;" href="#">قبلی <i class="fa fa-chevron-left" style="color: white;"></i></a></li>';
            }

            if ($total_pages <= 12) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $html_output .= static::links($currentPage, $url, $i);
                }
            } elseif ($total_pages >= 13) {
                if ($currentPage >= 5 && $currentPage <= ($total_pages - 5)) {
                    for ($i = 1; $i <= 3; $i++) {
                        $html_output .= static::links($currentPage, $url, $i);
                    }
                    if ($currentPage > 5) {
                        $html_output .= '<li class="disabled" onclick="return false"><a style="background-color: #e0dddd; color: white;" href="#">...</a></li>';
                    }
                    for ($i = $currentPage - 1; $i <= $currentPage + 1; $i++) {
                        $html_output .= static::links($currentPage, $url, $i);
                    }
                    $html_output .= '<li class="disabled" onclick="return false"><a style="background-color: #e0dddd; color: white;" href="#">...</a></li>';
                    for ($i = ($total_pages - 2); $i <= $total_pages; $i++) {
                        $html_output .= static::links($currentPage, $url, $i);
                    }
                } else {
                    for ($i = 1; $i <= 5; $i++) {
                        $html_output .= static::links($currentPage, $url, $i);
                    }
                    $html_output .= '<li class="disabled" onclick="return false"><a style="background-color: #e0dddd; color: white;" href="#">...</a></li>';
                    if ($currentPage != $total_pages - 4) {
                        for ($i = (ceil($total_pages / 2) - 1); $i <= (ceil($total_pages / 2) + 1); $i++) {
                            $html_output .= static::links($currentPage, $url, $i);
                        }
                        $html_output .= '<li class="disabled" onclick="return false"><a style="background-color: #e0dddd; color: white;" href="#">...</a></li>';
                        for ($i = ($total_pages - 4); $i <= $total_pages; $i++) {
                            $html_output .= static::links($currentPage, $url, $i);
                        }
                    } else {
                        for ($i = ($total_pages - 5); $i <= $total_pages; $i++) {
                            $html_output .= static::links($currentPage, $url, $i);
                        }
                    }
                }
            }

            if ($currentPage != $total_pages) {
                $html_output .= '<li><a style="border-radius: 0 5px 5px 0;" href="' . $url . '&page=' . ($currentPage + 1) . '"><i class="fa fa-chevron-right" style="color: #2c8dad;"></i> بعدی</a></li>';
            } else {
                $html_output .= '<li class="disabled" onclick="return false"><a style="border-radius: 0 5px 5px 0; background-color: #e0dddd; color: white;" href="#"><i class="fa fa-chevron-right" style="color: white;"></i> بعدی</a></li>';
            }

            $html_output .= '</ul>';
        }else{
            $html_output = '';
        }

        echo $html_output;
    }

    /**
     * @param $currentPage
     * @param $url
     * @param $counter
     * @return string
     *
     * used to generate li items of pagination
     */
    public static function links($currentPage, $url, $counter){
        if ($counter == $currentPage) {
            $html_output = '<li class="active"><a href="' . $url . '&page=' . $counter . '">';
        } else {
            $html_output = '<li><a href="' . $url . '&page=' . $counter . '">';
        }

        $html_output .= $counter;
        $html_output .= '</a></li>';

        return $html_output;
    }

    public static function validatePage($page)
    {
        if (!isset($page)){
            $currentPage = 1;
        }else{
            if (is_numeric($page) && $page > 0 && $page < 999999) {
                $currentPage = $page;
            }else{
                $currentPage = 1;
            }
        }

        return $currentPage;
    }
}