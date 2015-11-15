<?php
/*$Id: html_head_inc.php 942 2013-09-01 12:10:18Z dmitriy $*/

require_once('head_inc.php');

    if (is_null($doc_type)) {
        print('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">');
    } else {
        print($doc_type);
    }
$css = 'disc2.css';
if (!is_null($user_id) && $user_id != null) {
  $query = "SELECT css from confa_users where id = " . $user_id;
  $result = mysql_query($query);
  if ($result) {
    $row = mysql_fetch_assoc($result);
    $css = $row['css'];
  } 
}
?>
<html>
<head>
<title><?php 
/*    if (is_null($page_title)) {
        print($title);
    } else {
        print($page_title);
    } */?>"Forum Kitchen"</title>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?=autoversion('css/'.$css)?>">
<link rel="stylesheet" type="text/css" href="<?=autoversion('css/common.css')?>">
<script src="js/jquery-1.10.2.min.js"></script>
<script>
/*
var $lastdiv = null;
function show_msg($msg, $body)
{
  $id = 'div' + $msg;
  if ($lastdiv != null) {
    $lastdiv.innerHTML = '';
  }
  $lastdiv = document.getElementById($id);
  $lastdiv.innerHTML = $body;
}
*/
var selected_id = "";

function selectMsg(id) {
  id = "sp_" + id;
  console.log('selectMsg  id=' + id);
  if (selected_id != "") {
    // reset selection
    console.log('resetting selected id=' + selected_id);
    var selected = document.getElementById(selected_id);
    if (selected != null) {
      selected.className = null;
    }  
  }
  var selected = document.getElementById(id);
  if (selected != null) {
    console.log('selected element id=' + id);
    // select message
    selected.className = "selected";
    selected_id = id;
  } else {
    // message not found
    selected_id = "";
    console.log('id=' + id + "not found");
  }
}

$( document ).ready(function() {
  var bydate = document.getElementById('bydate');
  if (bydate !== null) {
    var update_bydate_counter = function() {
      // console.log("calling bydate()");
      $.ajax({
             type: "get",
             url: "./api/messages?mode=bydate",
             success: function(obj) {
                var count = obj.count;
                // console.log("bydate=" + count);
                var text = bydate.innerHTML;
                var braket = text.indexOf("(");
                if (braket >= 0) text = text.substring(0, braket);
                if (count > 0) text += "(<b>" + count + "</b>)";
                bydate.innerHTML = text;
             }
           });      
    };
    window.setTimeout( update_bydate_counter, 1000 );
    window.setInterval(update_bydate_counter, 60000); 
  }
});

</script>
