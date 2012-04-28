<?php
include 'functions.php';
if(ae_detect_ie())
{
    header("Location: noie.html");exit;
}