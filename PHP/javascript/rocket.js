$(document).ready(function() {

    for (i = 1; i <= 20; i++) {
        var starLeft = Math.floor(Math.random() * $(window).width());
        var delay = (Math.random() * 3).toFixed(1);
        var newContent = '<div class="stars" style="left:' + starLeft + 'px;animation:starGo 2s linear ' + delay + 's infinite"></div>';
        var oldContent = $('#allStar').html();
        $('#allStar').html(newContent + oldContent);
    }

});