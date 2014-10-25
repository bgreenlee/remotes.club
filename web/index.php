<html>
<head>
<title>remotes.club</title>
</head>
<body>
<h1>remotes.club</h1>

<p>A home for remote workers.</p>

<p>More interesting things to come. For now, visit us on <a href="irc://irc.freenode.net/%23%23remotes">##remotes on freenode</a>.</p>

<p>If you'd like a remotes.club account, send an email to <a href="mailto:hi@remotes.club">hi@remotes.club</a> introducing yourself. Include your desired username and your <a href="https://help.github.com/articles/generating-ssh-keys/">public ssh key</a>.</p>

<h2>Members</h2>
<ul>
<?php
$homedirs = array_filter(scandir("/home"), function($dir) {
  return !preg_match("/^\.|www/", $dir) && is_dir("/home/$dir");
});

foreach ($homedirs as $homedir) {
  print("<li><a href=\"https://$homedir.remotes.club\">$homedir</a></li>\n");
}
?>
</ul>

</body>
</html>
