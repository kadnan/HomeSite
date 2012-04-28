<?
include_once 'inc/detection.php';
$hashf = 0;
if(isset ($_GET["hashf"]))
    $hashf = intval($_GET["hashf"]);//for Ajax call

$cv = get_cv();
?>
<?
//acting as a Normal Page, Show the entire page-Non Ajax call
if($hashf!=-1)
{
?>
    <html>
        <title><?=$cv["title"]?></title>
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
                <div class="cv">
                    <ul>
                        <li>
                            <span class="contact">
                                <div id="icon">
                                    <?
                                     foreach ($cv["social"] as $key => $value)
                                     {
                                    ?>
                                        <a target="_blank" rel="nofollow" href="<?=$value?>" title="<?= ucfirst($key) ?>"><img src="assets/image/<?= $key.".png" ?>" border="0" title="<?= ucfirst($key) ?>"/></a>
                                    <?
                                     }
                                    ?>
                                </div>
                                <div id="address">
                                    <span><img src="assets/image/email.png" /><?= $cv["head"]["email"] ?></span>
                                    <span><img src="assets/image/skype.png" /><?= $cv["head"]["skype"] ?></span>
                                    <span><img src="assets/image/gtalk.png" /><?= $cv["head"]["gtalk"] ?></span>
                                </div>
                            </span>
                            <span class="title"><?= $cv["head"]["name"] ?></span>
                            <span class="role"><?= $cv["head"]["tagline"] ?></span>
                            <span class="section">
                                <h3 class="heading">Professional Profile:</h3>
                                <?
                                    for($x=0;$x<count($cv["profile"]);$x++)
                                    {
                                ?>
                                <ul class="profile">
                                    <li><?= $cv["profile"][$x] ?></li>
                                </ul>
                                <?
                                    }
                                ?>
                            </span>
                            <span class="section">
                                <h3 class="heading">Work Experience:</h3>
                                <ul class="experience">
                                    <?
                                    for($x=0;$x<count($cv["company"]);$x++)
                                    {
                                    ?>
                                        <li>
                                            <h4 class="subsection"><?= $cv["designation"][$x] ?></h4>
                                            <span class="tenure"><?= $cv["tenure"][$x] ?></span>
                                            <span class="company"><?= $cv["company"][$x] ?></span>
                                            <span class="work"><?= Markdown($cv["work"][$x]) ?></span>
                                        </li>
                                    <?
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span class="section">
                                <h3 class="heading">Skills:</h3>
                                <ul class="experience">
                                    <?
                                    for($x=0;$x<count($cv["skills"]);$x++)
                                    {
                                    ?>
                                    <li>
                                        <h4 class="subsection"><?= $cv["skills"][$x]?></h4>
                                        <span class="tenure"><?= $cv["experience"][$x]?></span>
                                    </li>
                                    <?
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span class="section">
                                <h3 class="heading">Education:</h3>
                                <ul class="experience">
                                    <?
                                    for($x=0;$x<count($cv["education"]);$x++)
                                    {
                                    ?>
                                        <li>
                                            <h4 class="subsection"><?= $cv["education"][$x]?></h4>
                                            <span class="company"><?= $cv["institute"][$x]?></span>
                                        </li>
                                    <?
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span class="section">
                                <h3 class="heading">Affiliation:</h3>
                                <ul class="experience">
                                    <?
                                    for($x=0;$x<count($cv["affiliation"]);$x++)
                                    {
                                    ?>
                                        <li>
                                            <span class="profile"><?= $cv["affiliation"][$x]?></span>
                                        </li>
                                    <?
                                    }
                                    ?>
                                </ul>
                            </span>
                            <span class="section">
                                <h3 class="heading">References:</h3>
                                <ul class="experience">
                                    <li>
                                        <span class="profile">To be available upon request</span>
                                    </li>
                                </ul>
                            </span>
                        </li>
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