var ReplyHelper = {
    init: function () {
        ReplyHelper.form = $('#topic-reply-container');
        ReplyHelper.form.hide();
        ReplyHelper.bind();
    },
    reply: function (element) {
        console.log('reply click');
        ReplyHelper.form.show();

        href = element.attr('href');
        
        
            ReplyHelper.form.find('input[name=parent_id]').val(href);
        

        console.log($(element).attr('href'));
    },
    softDelete: function (url) {
        $.ajax({
            url: url,
            method: 'DELETE'
        });
    },
    bind: function () {
        $('.post-reply').click(function (e) {
            e.preventDefault();
            ReplyHelper.reply($(this));
        });

        $('.reply-cancel').click(function (e) {
            e.preventDefault();
            ReplyHelper.form.hide();
        });
        
//        $('.soft-delete').on('click',function (e) {
//           e.preventDefault();
//           ReplyHelper.softDelete($(this).attr('href'));
//        });
    }
};

$(function () {
    ReplyHelper.init();
});