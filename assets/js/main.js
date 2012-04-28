var settings = null;
var cloneAbout = null;
var cloneProjects = null;
var cloneCV = null;
var cloneContact = null;
var cloneBooks = null;
var animDone = false;//to disable any action on boxes div
$(document).ready(function()
{
    $('.boxes').attr("onclick","return spreadSection(this);");
    $('.cross').css('margin-top','0%');
    $('.cross').attr('onclick','closeCross(this);');
    $('.cross').hide();
    $('#bigcontent').hide();
    $('#bigcontent span').hide();
    $('.boxes a').css("text-decoration","none");
    $('.boxes a').css("color","rgba(0, 0, 0, 0.10)");
    $('.boxes a').click(function(e)
    {
        e.preventDefault();
    });

    //Div Cloning
    cloneAbout = $('#about').clone();
    cloneProjects = $('#projects').clone();
    cloneCV = $('#cv').clone();
    cloneContact = $('#contact').clone();
    cloneBooks = $('#books').clone();

    //submit contact Form
    $('#contactform').submit(function ()
    {
         submitForm();
         return false;
    });

    $('.error').hide();
    $('#thanks').hide();
    if(isOldMobileSafari)
    {
        $('#footer').hide();
    }
});

function navigate(page)
{
    if(!animDone)
    {
        if(page == "contact")
            var _page = page;

        var page = page+".html?hashf=-1";
        $('#bigcontent').html(" ");
        $('#bigcontent').load(page, function()
        {
            //tracking clicks in Analytics
            _gaq.push(['_trackPageview',page]);
            if(_page == "contact")
            {
                $('#contactform').submit(function ()
                {
                     submitForm();
                     return false;
                });

                $('.error').hide();
                $('#thanks').hide();
            }
        });

    }
}

function spreadSection(obj)
{
    var _id = obj.id;
    clickCross = false;
    if(clickCross)
            return false;

        switch(_id)
        {
            case "about":
                $('#projects').hide(2000);
                $('#cv').hide(2000);
                $('#contact').hide(2000);
                $('#books').hide(2000);
                navigate("about");
                break;
            case "projects":
                $('#about').hide(2000);
                $('#cv').hide(2000);
                $('#contact').hide(2000);
                $('#books').hide(2000);
                navigate("projects");
                break;
            case "cv":
                $('#projects').hide(2000);
                $('#about').hide(2000);
                $('#contact').hide(2000);
                $('#books').hide(2000);
                navigate("cv");
                break;
            case "contact":
                $('#projects').hide(2000);
                $('#cv').hide(2000);
                $('#about').hide(2000);
                $('#books').hide(2000);
                navigate("contact");
                break;
            case "books":
                $('#projects').hide(2000);
                $('#cv').hide(2000);
                $('#contact').hide(2000);
                $('#about').hide(2000);
                navigate("books");
                break;
        }
        $('#'+obj.id).animate
        (
            {
                "width": "100%",
                "height": "100%"
            },
            {
                step: function()
                {
                    $(this).css('position','absolute');
                    $(this).css('margin-left','-8%');
                    $(this).css('margin-top','-13.5%');
                    $(this).css('padding-left','0%');
                    $(this).css('height','100%');
                    $(this).css('width','100%');
                    $(this).fadeOut(3000);
                },
                complete: function()
                {
                    $('.cross').css('margin-top','0%');
                    $('.cross').show(2000);

                    //dispose off all box objects
                    $('#projects').remove();
                    $('#cv').remove();
                    $('#contact').remove();
                    $('#about').remove();
                    $('#books').remove();
                    animDone = true;
                    //jQuery.fx.off = true;//disable animation
                    if(!clickCross)
                    {
                        $('#cspan').show();
                        $('#bigcontent').show();
                    }
                }
            },
            "slow"
        );
    return true;
}
var clickCross = false;
function closeCross(obj)
{
    $('#bigcontent').hide();
    $('#cspan').hide();
    //replaced Clone with original boxes
    clickCross = true;
    animDone = false;
    $('#content').prepend(cloneBooks);
    $('#content').prepend(cloneContact);
    $('#content').prepend(cloneCV);
    $('#content').prepend(cloneProjects);
    $('#content').prepend(cloneAbout);

    //removing style attribute so that it resets to original state before animation, A hack for resetting after clicking cross
    cloneAbout.removeAttr("style");
    cloneCV.removeAttr("style");
    cloneContact.removeAttr("style");
    cloneProjects.removeAttr("style");
    cloneBooks.removeAttr("style");
    //hide the cross
    $('.cross').hide();
    $('email_error').hide();
    $('name_error').hide();
    $('msg_error').hide();
}

//Submit Form

function submitForm()
{
    var yourname = $('#yourname').val();
    var youremail = $('#youremail').val();
    var yourmessage = $('#yourmessage').val();
    //http://stackoverflow.com/questions/2855865/jquery-validate-e-mail-address-regex
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

    if(yourname == "")
    {
        $('#name_error').show();
        $('#yourname').focus();
        return false;
    }
    else
        $('#name_error').hide();

    
    if(!pattern.test(youremail) )
    {
        $('#email_error').show();
        $('#youremail').focus();
        return false;
    }
    else
        $('#email_error').hide();
    
    if(yourmessage == "")
    {
         $('#msg_error').show();
         $('#yourmessage').focus();
         return false;
    }
    else
        $('#msg_error').hide();
    
    $.post("contact.php", { name:yourname, email:youremail,message:yourmessage },
       function(data)
       {
            $('#thanks').show();
            $('#thanks').fadeOut(7000);
       });
}