/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    config.toolbar = 'videoOnly';
    config.toolbar_videoOnly =
            [
                {name: 'insert', items: ['Youtube']},
            ];
    config.toolbar = 'imageOnly';
    config.toolbar_imageOnly =
            [
                {name: 'insert', items: ['Image']},
            ];


   //  config.filebrowserBrowseUrl = '/public/assets/inside/plugin/kcfinder/browse.php?opener=ckeditor&type=files';
   // config.filebrowserImageBrowseUrl = '/public/assets/plugin/kcfinder/browse.php?opener=ckeditor&type=images';
   // config.filebrowserFlashBrowseUrl = '/public/assets/plugin/kcfinder/browse.php?opener=ckeditor&type=flash';
   // config.filebrowserUploadUrl = '/public/assets/plugin/kcfinder/upload.php?opener=ckeditor&type=files';
   // config.filebrowserImageUploadUrl = '/public/assets/plugin/kcfinder/upload.php?opener=ckeditor&type=images';
   // config.filebrowserFlashUploadUrl = '/public/assets/plugin/kcfinder/upload.php?opener=ckeditor&type=flash';
};
