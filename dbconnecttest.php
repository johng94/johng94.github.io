<?php
/*This file is just to show that
the database is connected successfully
Not actually part of the project

To test php files in xampp find the xammp folder
(probably in local disk)
and put the php file in 'htdocs'
you can organize it in a folder as long as its
in the htdocs folder

open up a web browser and type 'localhost/foldername'
and it will bring up the files in that folder*/

$dbname = 'generico';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($connect, $test_query);

$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
}
/*Just loops through tables and returns
how many there are to test connection*/
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}