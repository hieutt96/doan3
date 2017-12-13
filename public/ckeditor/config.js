
CKEDITOR.editorConfig = function( config )
{
        // Define changes to default configuration here. For example:
    config.language = 'en';
    
        // config.uiColor = '#AADC6E';
        
        config.toolbar_Full = [
            '/',
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
            ['BidiLtr', 'BidiRtl' ],
            ['Link','Unlink','Anchor'],
            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
            '/',
            ['Styles','Format','Font','FontSize'],
            ['TextColor','BGColor'],
            ['Maximize', 'ShowBlocks','-','About']
            ];
        
        config.entities = true;
        //config.entities_latin = false;
        

        config.filebrowserBrowseUrl = 'http://localhost/fckeditor/ckfinder/ckfinder.html';

        config.filebrowserImageBrowseUrl = 'http://localhost/fckeditor/ckfinder/ckfinder.html?type=Images';

        config.filebrowserFlashBrowseUrl = 'http://localhost/fckeditor/ckfinder/ckfinder.html?type=Flash';

        config.filebrowserUploadUrl = 'http://localhost/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

        config.filebrowserImageUploadUrl = 'http://localhost/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

        config.filebrowserFlashUploadUrl = 'http://localhost/fckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};  