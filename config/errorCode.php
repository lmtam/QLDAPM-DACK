<?php
return [
    
//shared
    'E2000' => 'E2000 : Không tìm thấy thông tin.',//không tìm thấy Article
    'E2001' => 'E2001 : Không tìm thấy thông tin.',//không tìm thấy Comment
    'E2002' => 'E2002 : Nội dung bình luận không được rỗng.',
    'E2003' => 'E2003 : Vui lòng đăng nhập.',//không tìm thấy Comment
 
//begin CommentsController

    //begin postReplyComment()
    'E2210' => 'E2210 : Hệ thống đang bận vui lòng thử lại sau.',//Comments::updateNoteBeforeInsert($modelCommentsParrent->right) false
    //end postReplyComment()
    
    
    //begin postAddComment()
    'E2220' => 'E2220 : Hệ thống đang bận vui lòng thử lại sau.',//Comments::updateNoteBeforeInsert($modelCommentsParrent->right) false
    //end postReplyComment()
    
//end CommentsController

//begin CommentsInsideController
    //begin postApproved()
    'E2250' => 'E2250 : Bình luận cấp cha chưa được duyệt',
    //end postApproved()
   
    //begin postApproved()
    'E2260' => 'E2260 : Hệ thống đang bận vui lòng thử lại sau.',//Comments::updateStatusCommentIn($arrayUpdate,'deleted'); false
    //end postApproved()
    
    
//end CommentsInsideController
    

];
    
