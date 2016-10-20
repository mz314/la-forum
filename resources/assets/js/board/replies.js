var ReplyHelper = {
    init: function () {
        ReplyHelper.form = $('#topic-reply-container');
        ReplyHelper.form.hide();
        ReplyHelper.bind();
    },
    reply: function (element) {
        ReplyHelper.form.show();

        href = element.attr('href');
        
        if (href != '#') {
            ReplyHelper.form.find('input[name=parent_id]').val(href);
        } else {
            ReplyHelper.form.find('input[name=parent_id]').val('');
        }

        console.log($(element).attr('href'));
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
    }
};

$(function () {
    ReplyHelper.init();
});