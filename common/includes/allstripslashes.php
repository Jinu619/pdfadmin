<?php

reset($_POST);
foreach ($_POST as $key => $value) //to stripslash all posted variables
{
        @$value = trim($value);
        $value = addslashes($value);
        $$key = $value;
}

reset($_GET);
foreach ($_GET as $key => $value) //to stripslash all get variables
{
        @$value = trim($value);
        $value = stripslashes($value);
        $$key = $value;
}

reset($_GET);
reset($_POST);
