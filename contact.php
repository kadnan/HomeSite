<?
include_once 'inc/detection.php';
if(count($_POST)>0)
{
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Return-Path: $email\r\n";
    
    $contact = get_contact();
    @mail($contact["recipient"],$name." wants to get in touch wih you", $message,$headers);
    exit;
}
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
        <title>Contact Me</title>
        <head>
            <link REL=StyleSheet HREF="assets/css/style.css" TYPE="text/css" MEDIA=screen>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/main.js"></script>
        </head>
        <body>
            <? include 'header.php'; ?>
                <div id="content">
<?
}
?>
                    <div class="contactme">
                        <div id="contactform">
                            <form id="contactmeform" method="POST">
                                <span id="thanks">Thanks! I'll get back to you soon</span>
                                <label for="yourname">
                                    Name
                                    <input placeholder="Jhon Doe" required tabindex="1" class="formFields" id="yourname" type="text" name="yourname" value="" />
                                    <label id="name_error" class="error">Hey you forgot to enter your name.</label>
                                </label>
                                <label for="youremail">
                                    Email
                                    <input placeholder="jhon@example.com" required="email" tabindex="2" required="email" class="formFields" id="youremail" type="email" name="youremail" value="" />
                                    <label id="email_error" class="error">Your email please?</label>
                                </label>
                                <label for="yourmessage">
                                    What do you wanna say?
                                    <textarea required tabindex="3" id="yourmessage" class="formFields" cols="40" rows="20" name="yourmessage"></textarea>
                                    <label id="msg_error" class="error">While you're here, say a few words!</label>
                                </label>
                                <input id="btnSubmit" class="btnSubmit" type="submit" value="submit" />
                            </form>
                        </div>
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