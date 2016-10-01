<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Http\Models\Outside\Articles;
use Illuminate\Support\Facades\Auth;
use App\MyCore\Outside\Helpers\Slug;
use App\Http\Models\Outside\Categories;
class NewArticle extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'categoriesId'=> NULL,
        'limit' => 4,
        'slug' => 'aaa',
        'articleType' => 'text'
    ];
    protected $data = array();
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        if($this->config['categoriesId'] != NULL){
            $listSlugs = Slug::make();
            $this->data['slugs'] = $listSlugs[$this->config['categoriesId']];
        }else{
            $this->data['listSlugs'] = Slug::make();
        }
        $listNewArticles = Articles::getListNewArticles($this->config['categoriesId'],$this->config['limit'],$this->config['articleType']);
        
        $this->data['listNewArticles'] = $listNewArticles;
        $this->data['config'] = $this->config;
        return view("widgets.NewArticle",$this->data);
    }
}