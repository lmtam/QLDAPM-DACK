<?php namespace App\MyCore\Outside\Helpers;

use App\Http\Models\Api;
use App\Http\Models\Outside\Articles;

class Breadcrumb {
    public static function create ($articleId = null, $categoryId = null, $listSlugs = array()) {
        $modelArticles = new Articles();
        $data = $modelArticles->getBreadcrumbs($articleId, $categoryId, $listSlugs);
        $html = '';
        if (count($data)) {
            $html .= '<div class="col-xs-12 breakumb"> <ul class="list_arrow_breakumb">';
            $i = 1;
            foreach ($data as $item) {
                $html .= '<li class="">';
                    $html .= '<a href="' . $item['url'] . '">' . $item['name'] . '</a>';
                $html .= '</li>';
                if (count($data) > $i) {
                    $html .= '<li><span class="glyphicon glyphicon-menu-right"></span></li>';
                }
                $i ++;
            }
            $html .= '</ul></div>';
        }
        return $html;
    }
}
