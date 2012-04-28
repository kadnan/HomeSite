<?
    include_once 'inc/detection.php';
    $hashf = 0;
    if(isset ($_GET["hashf"]))
        $hashf = intval($_GET["hashf"]);//for Ajax call
?>
<?
//acting as a Normal Page, Show the entire page-Non Ajax call
if($hashf!=-1)
{
?>
    <html>
        <title>Projects I have worked on</title>
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
<?
    $projects = array();
    $projects = get_projects();
?>
                    <div class="projects">
                        <ul>
                            <?
                                for($d = 0;$d < count($projects["title"]);$d++)
                                {

                            ?>
                            <li>
                                <span class="title"><?= $projects["title"][$d] ?></span>
                                <span class="meta">
                                    <span>
                                        <img src="assets/image/clock.png" border="0" /><?= $projects["date"][$d] ?>
                                        <img src="assets/image/tag.png" border="0" /><?= $projects["type"][$d] ?>
                                    </span>
                                </span>
                                <span class="desc"><?= Markdown($projects["desc"][$d]) ?></span>
                            </li>
                            <? } ?>
                        </ul>
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