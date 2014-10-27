<html>
<head>
<title>remotes.club</title>
<style type="text/css">
ul.members { list-style-type: none; }
</style>
</head>
<body>
<h1>remotes.club</h1>

<p>A home for remote workers.</p>

<p>More interesting things to come. For now, visit us on <a href="irc://irc.freenode.net/%23%23remotes">##remotes on freenode</a>.</p>

<p>If you'd like a remotes.club account, send an email to <a href="mailto:hi@remotes.club">hi@remotes.club</a> introducing yourself. Include your desired username and your <a href="https://help.github.com/articles/generating-ssh-keys/">public ssh key</a>.</p>

<h2>Members</h2>
<ul class="members">
<?php
$homedirs = array_filter(scandir("/home"), function($dir) {
  return !preg_match("/^\.|www/", $dir) && is_dir("/home/$dir");
});

$index_files = ["index.html", "index.htm", "index.php"];
foreach ($homedirs as $homedir) {
  $last_update = array_reduce($index_files, function($carry, $index_file) use ($homedir) {
    $path = "/home/$homedir/web/$index_file";
    if (file_exists($path)) {
      $mtime = filemtime($path);
      if ($mtime > $carry) {
        return $mtime;
      } else {
        return $carry;
      }
    } else {
      return $carry;
    }
  }, 0);

  $updated_marker = $last_update > time() - 86400 ? "*" : "";

  print("<li data-last-update=\"$last_update\"><span><a href=\"https://$homedir.remotes.club\">$homedir</a></span> $updated_marker</li>\n");
}
?>
</ul>
<p><small>* Updated in the last 24 hours</small></p>

</body>
</html>
