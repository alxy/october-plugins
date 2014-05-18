october-plugins
===============

October plugin test

In the stage of development (in which the plugin currently is), it requires a little hack to function properly with october. All you need to do is add the following line to octobers .htaccess:

```
RewriteCond %{REQUEST_URI} !\.html
```

This is neccessary to load the javascript templates.
Eventually there will be a prebuilt script that already contains these files.

Additionally, you need to compile your own /modules/backend/assets/css/october.css form the LESS files in /modules/backend/assets/less (you need to add bootstraps popover styles: ``@import "core/popovers.less";``).
