document.addEventListener("DOMContentLoaded",function()
{
function showMenu(event)
{
    if (jQuery('#editMenu').css("display")=='none') 
    {
        jQuery('#editMenu').fadeIn(1000);
        jQuery('#avatar').fadeIn(1000);
    }
    else
    {
        jQuery('#editMenu').fadeOut(1000);
        jQuery('#avatar').fadeOut(1000);
    }
}



jQuery('#editBtn').on('click',showMenu);
});