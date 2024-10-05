$('.short-textarea').summernote({
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['font', ['fontname', 'color']],
    ],
    disableResizeEditor: true,
    height: 50,
    dialogsInBody: true,
    callbacks:{
        onInit:function(){
            $('body > .note-popover').hide();
        },
        onChange: function(contents, $editable) {
            $(this).closest('.note-editor').siblings('textarea').val(contents);
        }
    },
});
