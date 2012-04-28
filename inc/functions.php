<?
include 'markdown.php';
include('spyc.php');
 //http://www.anyexample.com/programming/php/how_to_detect_internet_explorer_with_php.xml
function ae_detect_ie()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) &&
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}

function isOldMobileSafari()
{

    $browserAsString = $_SERVER['HTTP_USER_AGENT'];
    if (strstr($browserAsString, " AppleWebKit/") && strstr($browserAsString, " Mobile/")&& strstr($browserAsString, "4_2"))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function get_ini()
{
    $data = Spyc::YAMLLoad("inc/site.yaml");
    //$data = parse_ini_file("site.ini", true);
    return $data;
}

function get_about()
{
    $data = get_ini();
    return ($data["about"]);
}
function get_projects()
{
    $data = get_ini();
    return ($data["projects"]);
}
function get_cv()
{
    $data = get_ini();
    return ($data["cv"]);
}

function get_contact()
{
    $data = get_ini();
    return ($data["contact"]);
}
