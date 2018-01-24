<script type="text/javascript"
        src="https://code.jquery.com/jquery-3.2.1.min.js">
</script>
<script type="text/javascript">
    $(function () {
        $('.post:eq(1) .title').html('new html');

        $('[type=text]').val('123');

        var content = $('.content');

        // content.find('[data-like=5]').html('5 лайков');
        // content.find('[data-like=6]').html('6 лайков');

        $('.content').on('click', '#searchButton', function () {
            alert('Нажали');
        });
    });

    $.ajax({
        url: "index.php?action=ajax",
        data: {},
        type: "post",
        dataType: "json",
        success: function (posts) {
            posts.forEach(function (post) {
                $('.posts').append("<div class=\"post\">\n" +
                    "            <p class=\"title\">"+post.title+"</p>\n" +
                    "            <p class=\"text\">"+post.text+"</p>\n" +
                    "        </div>");
            });
        },
        error: function (response) {
        }
    });

</script>

<div class="header">
    <img id="logo">
</div>
<div class="content">
    <input type="text" id="searchQuery">
    <input type="button" value="Искать" id="searchButton">
    <div class="posts">
        <div class="post" data-like="6">
            <p class="title">Заголовок 1</p>
            <p class="text">Текст 1</p>
        </div>
        <div class="post" data-like="5">
            <p class="title">Заголовок 2</p>
            <p class="text">Текст 2</p>
        </div>
    </div>
</div>
