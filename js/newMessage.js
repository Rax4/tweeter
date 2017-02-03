document.addEventListener("DOMContentLoaded",function()
{
    function showMsg(event)
    {
        if (jQuery('#userMessageForm').css("display")=='none') 
        {
            jQuery('#userMessageForm').fadeIn(1000);
        }
        else
        {
            jQuery('#userMessageForm').fadeOut(1000);
        }
    }



    jQuery('#messageBtn').on('click',showMsg);
});
