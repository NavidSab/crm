function UploadManager()
{


    this.register = function(el,route)
    {
        showLoading('در حال پردازش درخواست...');

            var el        = $(el),
            user_id       = el.find('#user_id').val(),
            file_path     = el.find('#file_path').val();


        var jqxhr = $.ajax({
            url:  route,
            type: 'POST',
            data: { user_id: user_id, file_path:file_path}
        });
        jqxhr.done(function(response, textStatus, jqXHR) {
            response = JSON.parse(response);
            if(response.status != 1)
            {
                alert('کد خطا: ' + response.MessageCode + '\n\n' + 'پیام: ' + response.msg);
                return false;
            }
            alert('انجام شد...');
            location.reload();
        });

        jqxhr.fail(function() {
            alert('خطایی رخ داده است، لطفا دوباره امتحان کنید.');
        });
        jqxhr.always(function() { hideLoading(); });
    }
}

var UploadManager = new UploadManager();