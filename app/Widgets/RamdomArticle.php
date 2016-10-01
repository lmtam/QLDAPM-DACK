<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Http\Models\Outside\Articles;
use App\Http\Models\Outside\Categories;
use Illuminate\Support\Facades\Auth;
use App\MyCore\Outside\Helpers\Slug;
class RamdomArticle extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'categoriesId'=> NULL,
        'limit' => 4,
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
        $listArticlesRamdom = Articles::getListArticlesRamdom($this->config['categoriesId'],$this->config['limit'],$this->config['articleType']);
        
        $this->data['listArticlesRamdom'] = $listArticlesRamdom;
        $this->data['config'] = $this->config;
        
        return view("widgets.RamdomArticle",$this->data);
    }
}