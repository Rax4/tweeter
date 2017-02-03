jQuery(document).ready(function()
{
    function countTweet(event)
    {
        jQuery(this).parent().find('.counter').text('Ilość znaków: '+this.value.length+'/140');
        if (this.value.length<=60)
        {
            jQuery(this).parent().find('.counter').css('color','green');
        }
        else if(this.value.length<100)
        {
            jQuery(this).parent().find('.counter').css('color','yellow');
        }
        else
        {
            jQuery(this).parent().find('.counter').css('color','red');
        }
    }
    function countComment(event)
    {
        jQuery(this).parent().find('.counter').text('Ilość znaków: '+this.value.length+'/60');
        if (this.value.length<=20)
        {
            jQuery(this).parent().find('.counter').css('color','green');
        }
        else if(this.value.length<40)
        {
            jQuery(this).parent().find('.counter').css('color','yellow');
        }
        else
        {
            jQuery(this).parent().find('.counter').css('color','red');
        }
    }
    function countMessage(event)
    {
        jQuery(this).parent().find('.counter').text('Ilość znaków: '+this.value.length+'/200');
        if (this.value.length<=80)
        {
            jQuery(this).parent().find('.counter').css('color','green');
        }
        else if(this.value.length<150)
        {
            jQuery(this).parent().find('.counter').css('color','yellow');
        }
        else
        {
            jQuery(this).parent().find('.counter').css('color','red');
        }
    }
    var a = jQuery('#tweetText');
    a.on("keyup",countTweet);
    var b = jQuery('.comText');
    b.on("keyup",countComment);
    var c = jQuery('#messageText');
    c.on("keyup",countMessage);
});