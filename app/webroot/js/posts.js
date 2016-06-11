posts = {};

posts.load_lastest = function() {
	$.ajax({
        type: "GET",
        url: '/posts/getlastestpost',
        dataType: "json",
        /*data: {id: id},*/
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            var html = '';
            for (var i = 0; i < result.length; i++) {
                html += '<li><a href="/posts/view/' + result[i]['Post']['slug'] + '">' + result[i]['Post']['title'] + '</a></li>'
            };
            $('.btn-load').hide();
            $('.lastest-content').append(html);
        }
    });
}