<?php
session_start();

if(session_destroy())
{
header("Location: ../spec_home.html");
}

?>