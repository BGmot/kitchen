<?php

require_once('head_inc.php');
require_once('html_head_inc.php');
require_once('custom_colors_inc.php');

?>
<script>
function delMovie(msgid)
{
  var user_id = <?php print($user_id);  ?>;
    var message_id=msgid;
      //add the msgid to movies
      $.ajax({
              type: "POST",
              url: "movies_del.php",
              data: {user: user_id, msg: msgid} ,
              success: function(data) {
            }
      });
}
</script>

<h3>Movies</h3>

<dl>
<?php

$query = 'SELECT confa_movies.msg_id as msgid, confa_posts.subject, confa_users.username from confa_movies, confa_posts, confa_users where confa_posts.id=confa_movies.msg_id and confa_users.id=confa_posts.author order by confa_movies.msg_id desc;';
$result = mysql_query($query);
if (!$result) {die('Query failed ');}
while ($row = mysql_fetch_assoc($result))
{
 print('<img border="0" src="images/youtube12x12w.png" width="16" height="16" align="top" style="padding:0px 0px 3px 0px;">&nbsp;<a href="msg.php?id='.$row['msgid'].'" target="bottom">'.$row['subject'].'</a>&nbsp;<b>'.$row['username'].'</b>');
 if ( !is_null( $moder ) && $moder > 0){print('<a href="movies.php" style="cursor: pointer" onclick="delMovie('.$row['msgid'].')">&nbsp;Hide</a>');}
 print('<BR>');
}



?>
</dl>