=== Reviewers_Info ===
Contributors: neekey
Donate link: http://photozero.net/
Tags: visitor,comments
Requires at least: 2.3
Tested up to: 2.7
Stable tag: 2.1

== Description ==

Display reviewers' nation flag and OS & browser infomation on the next to Comments form.

在留言者的旁边显示留言者的国家国旗、操作系统、浏览器信息。

== Installation ==

1. Upload `/reviewers-info/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php display_commenter_info($comment); ?>` between `<?php foreach ($comments as $comment) : ?>` and `<?php endforeach;?>` ALSO after `<?php comment_author_link() ?>`  in your current theme's `comments.php` file

………………………………………………………

1. 把文件夹 `/reviewers-info/` 放在 `/wp-content/plugins/` 目录下
2. 在Wordpress后台启用该插件
3. 打开你当前主题的comments.php文件，把 `<?php display_commenter_info($comment); ?>` 放在 `<?php foreach ($comments as $comment) : ?>` 和 `<?php endforeach;?>` 之间， 或者在 `<?php comment_author_link() ?>`之后

