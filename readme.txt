=== Reviewers_Info ===
Contributors: neekey
Donate link: http://photozero.net/
Tags: visitor,comments
Requires at least: 2.0.2
Tested up to: 2.6.1
Stable tag: 2.0

== Description ==

Display reviewers' nation flag and OS & browser infomation on the next to Comments form.

Example:  From `Somebody Says:...` to `Somebody (WinXP[icon*],Firefox3[icon*]) Says:...` in Responses
(*It can show image and text and depends on your choose.)


在留言者的旁边显示留言者的国家国旗、操作系统、浏览器信息。

示范:  从 `Somebody Says:...` 变成 `Somebody (WinXP[图标*],Firefox3[图标*]) Says:...`
(*你可以决定显示图标或文字。)

== Installation ==

1. Upload `/reviewers-info/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `<?php display_commenter_info($comment); ?>` between `<?php foreach ($comments as $comment) : ?>` and `<?php endforeach;?>` ALSO after `<?php comment_author_link() ?>`  in your current theme's `comments.php` file


………………………………………………………


1. 把文件夹 `/reviewers-info/` 放在 `/wp-content/plugins/` 目录下
2. 在Wordpress后台启用该插件
3. 打开你当前主题的comments.php文件，把 `<?php display_commenter_info($comment); ?>` 放在 `<?php foreach ($comments as $comment) : ?>` 和 `<?php endforeach;?>` 之间， 或者在 `<?php comment_author_link() ?>`之后


== Screenshots ==

<img src="screenshot.jpg" alt="" />