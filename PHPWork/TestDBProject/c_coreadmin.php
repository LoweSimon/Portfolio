<?php
define('ISITSAFETORUN', TRUE); //each required file needs code to prevent it running if it cannot detect this.
$webdata = array();
$mytable = "TT284Guests"; //set a variable for the database table
$mytitle = 'TT284 Block 2 Part6 Client and Server Working Together';
$mycss   = "c_.css"; //set a variable for the css file
$myjs    = "c_.js"; //set a variable for the js file
$valid   = TRUE; //set flag for errors in form
require 'c_head.php'; //the header information
echo "<h1>Admin: $mytitle</h1>"; //insert the h1 title
?>
<label for="reporta" class="showhide">Show Hide: Report on script actions</label>
<input type="checkbox" id="reporta" value="button" style="display:none;" />
<div class="report">c_coreadmin.php is running</div>
<?php
require "mydatabase.php"; // database name, user, password
require "c_dbconnect.php"; // script to connect to database
require "c_setuparray.php"; // set up empty array to match the database table
require 'c_formdata.php'; //add the script to process form input
$testfordata = array_filter($webdata);
if (!empty($testfordata))
  {
  if (!empty($webdata['action']))
    {
?>
		<div class="report">In script c_coreadmin.php $webdata['action']  holds the value: <?php
    echo $webdata['action'];
?>
		</div>
<?php
    if ($webdata['action'] == 'save')
      {
      require "c_validatedata.php";
?>
			<div class="report">In script c_coreadmin.php $valid  holds the value: <?php
      echo $valid;
?>			</div>
<?php
      if ($valid)
        {
        require "c_savedata.php"; //script to save new data to the form
        } //$valid
      } //$webdata['action'] == 'save'
    if ($webdata['action'] == 'confirmdelete')
      {
      require "c_deletedata.php"; //script to delete data from the form
      } //$webdata['action'] == 'confirmdelete'
    } //!empty($webdata['action'])
  require "c_form.php"; //add the input form
  require "c_displayalldata.php"; //script to display all data from the form
  require "c_searchandsort.php";
  if (!empty($webdata['action']))
    {
    if ($webdata['action'] == "search")
      {
      require "c_selectrowtoedit.php";
      } // we only need to display search results if data has been submitted from the search form.
    } //!empty($webdata['action'])
  } //!empty($testfordata)
echo '<div class="report">c_coreadmin.php has completed all actions</div>';
require 'c_foot.php'; //footer to end html document
?>
