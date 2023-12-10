<html>
<!-- This script is Open Source, pull requests welcome at https://gitlab.com/tools-on-tech/todoistinnotion -->
<!-- I know it's not pretty, it's functional okay, I'm pretty sure Notion.so will fix the embed at some point anyway -->
<?php
if($_REQUEST['todoist']) {
  $todoisturl = str_replace(["%23","app%2F"],["#","/app/"],urlencode($_REQUEST['todoist']));

  // Tested this, didn't work, seems Notion.so caches the result then and removes the # again
  //header("Status: 301 Moved Permanently");
  //header("Location: https://todoist.com${todoisturl}");

  // Old Fashing redirect
  print "<head><meta http-equiv=\"refresh\" content=\"0;https://todoist.com${todoisturl}\" /></head><body></body></html>";
  exit(0);
} else {
  // Form, so it's easy to use
?>
  <body>
  <h2>Embed Todoist Project/Label in Notion</h2>
  <p>This should no longer be needed as Todoist has adjusted their URLs</p>
  <p>Bugs: <a href="https://gitlab.com/tools-on-tech/todoistinnotion">https://gitlab.com/tools-on-tech/todoistinnotion</a></p>
  <p>Youtube Video: <a href="https://youtu.be/3r33rtOFcpU">Tools On Tech - How to Embed Todoist into Notion</a></p>
  <form>
  <p><b>Paste Todoist URL to convert here</b></p>
    <input type="text" name="todoisturl" />
    <input type="submit" />
  </form>
<?php
  if($_REQUEST['todoisturl']) {
    $todoisturl = str_replace(["https://todoist.com/","#"],["","%23"],$_REQUEST["todoisturl"]);
    $url = htmlspecialchars("https://toolsontech.com/todoistfornotion.php?todoist=$todoisturl");
    print "<p><b>Copy and paste this URL to Notion.so</b></p><p><a href=\"$url\">$url</a></p>"; 
  } else { ?>
  <?php };
}; ?>
  </body>
</html>
