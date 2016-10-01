<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Http\Models\Inside\Comments;
use App\Http\Models\Inside\CommentsFeedback;
use App\Http\Models\Inside\Articles;
use Illuminate\Support\Facades\Auth;

class ShowComments extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'object_id'=> 0,
        'class'=> 'abc',//class html tổng quát
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $modelArticle = Articles::find($this->config['object_id']);
        if($modelArticle){
            $data = Comments::getTreeAllShowComments($this->config['object_id'],$modelArticle->is_comment_preview);
            $userId = Auth::user() ? Auth::user()->user_id : 0;
            $listUser = array();
            foreach (\App\User::all() as $modelUser) {
                $listUser[$modelUser->user_id] = $modelUser->email;
            }
            
            //tạo list CommentsFeedback
            $arrCommentsFeedback = CommentsFeedback::getList($this->config['object_id'], 'article');
            $listCommentsFeedback = array();
            foreach ($arrCommentsFeedback as $modelCommentsFeedback) {
                $listCommentsFeedback[$modelCommentsFeedback->comment_id .'_'.$modelCommentsFeedback->user_id] = $modelCommentsFeedback->status;
            }
            return view("widgets.ShowComments", [
                'arrComments'   => ($data == NULL) ? array():$data,
                'config'        => $this->config,
                'userId'        => $userId,
                'listUser'      => $listUser,
                'listCommentsFeedback' => $listCommentsFeedback
            ]);
        }
    }
}