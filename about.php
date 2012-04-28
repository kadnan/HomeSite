<?
    //Detect IE and redirect
    include_once 'inc/detection.php';
    $hashf = 0;
    if(isset ($_GET["hashf"]))
        $hashf = intval($_GET["hashf"]);//for Ajax call

    $about = get_about();
?>
<?
//acting as a Normal Page, Show the entire page-Non Ajax call
if($hashf!=-1)
{
?>
    <html>
        <title>About Me</title>
        <head>
            <link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/jquery.zoomooz.min.js"></script>
            <script type="text/javascript" src="assets/js/main.js"></script>
        </head>
        <body>
            <? include 'header.php'; ?>
                <div id="content">
<?
}
?>
                    <div id="aboutme">
                            <span>
                                <?
                                       echo Markdown(nl2br($about));
                                ?>
                            </span>
                        </div>
<?
if($hashf!=-1)
{
?>
                </div>
    <? include 'footer.php'; ?>
    </body>
</html>
<?
}
?>