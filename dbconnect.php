<?php
if(!mysql_connect("localhost","root",""))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("tpv"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>