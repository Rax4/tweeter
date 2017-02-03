document.addEventListener("DOMContentLoaded",function()
{
    var avatar = jQuery('#avatar');
    var option = jQuery('#options');
    option.change(function (event)
    {
        switch (jQuery(this).val()) 
        {
            case "img/default.jpeg":
                jQuery('#avatar').css("background-image",'url("img/default.jpeg")');
                break;
            case "img/strzelba.jpg":
                jQuery('#avatar').css("background-image",'url("img/strzelba.jpg")');
                break;
            case 'img/ropowicz.jpg':
                jQuery('#avatar').css("background-image",'url("img/ropowicz.jpg")');
                break;
            case 'img/peja.jpg':
                jQuery('#avatar').css("background-image",'url("img/peja.jpg")');
                break;
            case 'img/mariusz.jpg':
                jQuery('#avatar').css("background-image",'url("img/mariusz.jpg")');
                break;
            default:

                break;
        }
    });
});