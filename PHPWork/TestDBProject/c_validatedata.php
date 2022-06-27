<?PHP
if(!defined('ISITSAFETORUN')) {
// This provides protection against file being called directly - if it is, ISITSAFETORUN will not be defined
   die('This file does no useful work alone'); // and so this warning message will be issued
}
?>
<div class="report">Start of c_validatedata.php</div>
<p class="report">This script will validate data on the server.</p>
<?php
$formerror['firstname'] = '';
$formerror['lastname'] = '';
$formerror['email'] = '';
$formerror['telephone'] = '';
$valid = TRUE ; // set a variable to true at the start. If we find and error change it to false. At the end if there are any error messages, return the form and data and messages, but don't save.
//$firstname = $webdata['firstname'];
if (isset($webdata['firstname'] )) {
if (!preg_match("/^[a-zA-Z ]{1,30}$/",$webdata['firstname'])) {
  $formerror['firstname'] = '<span class="warn" >Not valid on server: Only letters and white space allowed </span>'; 
  //echo "Only letters and white space allowed";
  $valid = FALSE ;
}}
if (isset($webdata['lastname'] )) {
if (!preg_match("/^[a-zA-Z ]{1,30}$/",$webdata['lastname'])) {
  $formerror['lastname'] = '<span class="warn" >Not valid on server: Only letters and white space allowed</span>'; 
  $valid = FALSE;
}}

if (isset($webdata['email'] )) {
if (!filter_var($webdata['email'], FILTER_VALIDATE_EMAIL)) {
	$formerror['email'] = '<span class="warn" >Not valid on server: invalid email format</span>';
  //echo "Invalid email format"; 
  $valid = FALSE;
}}
if (isset($webdata['telephone'] )) {
if (!preg_match("/^[0-9]{8,10}$/",$webdata['telephone'])) {
  $formerror['telephone'] = '<span class="warn" >Not valid on server: Only numbers allowed</span>'; 
  //$valid = FALSE;
}}

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
    $valid = FALSE;
}//http://php.net/manual/en/function.checkdate.php
//validateDate('2012-02-28', 'Y-m-d')
//validateDate('2012-02-28 12:12:12')
//validateDate('2012-02-28T12:12:12+02:00', 'Y-m-d\TH:i:sP')

?>
<div class="report">End of c_validatedata.php   $valid holds the value:<?php echo $valid ?> </div>
