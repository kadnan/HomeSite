<?
    //Detect IE and redirect
    include_once 'inc/detection.php';
?>
<html>
    <title>Welcome to Adnan Siddiqi's Home Ground</title>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="Programmer, Engineer, Pakistan, Karachi, SSUET, Developer, entrepreneur, php, Java, blogger, consultant, Innovative, mobile, Iphone, Appcelerator, Freelance, Socialmedia ">
        <META NAME="DESCRIPTION" CONTENT="A web developer and a wannabe entrepreneur. A self learner geek Willing to change world by using technology in efficient and useful manner">
        <link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/main.js" defer="defer"></script>
        </head>
    <body>
        <? include 'header.php'; ?>
        <div id="content">
            <div id="about" class="boxes red"><a href="about.html">About</a></div>
            <div id="projects" class="boxes green">Projects</div>
            <div id="cv" class="boxes purple">CV</div>
            <div id="contact" class="boxes blue">Contact</div>
            <div id="books" class="boxes orange">Books</div>
            <span class="cross">x</span>
            <div id="bigcontent">
            </div>
        </div>
        <? include 'footer.php'; ?>
    </body>
</html>