document.addEventListener("DOMContentLoaded",function()
{
    function count(event)
    {
        var tweets  =jQuery('.tweet');
        for (var i = 0; i < tweets.length; i++) 
        {
            var tweet = jQuery(tweets[i]);
            var number = tweet.find('.comments').length - 1;
            var check = tweet.find('.check').html();
            tweet.find('.check').html(check+' ('+number+')');
        }
    }
    count();
    function showHide(event)
    {
        if (this.checked == true)
        {
            jQuery(this).parent().next().fadeIn(800);
        }
        else
        {
            jQuery(this).parent().next().fadeOut(800);
        }
    }
   checks = jQuery('.showHide')
   checks.on("change",showHide);
    function showCom(event)
    {
        event.stopPropagation();
        if (this.checked == true)
        {
            var a = jQuery(this).parent().parent().parent();
            a.find('.comments').fadeIn(800);
        }
        else
        {
            var a = jQuery(this).parent().parent().parent();
            a.find('.comments').fadeOut(800);
        }
    }
   checksy = jQuery('.showCom')
   checksy.on("change",showCom);
});

