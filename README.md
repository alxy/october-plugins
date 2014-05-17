october-plugins
===============

October plugin test

In the stage of development (in which the plugin currently is), it requires a little hack to function properly with october. All you need to do is add the following line to octobers .htaccess:

```
RewriteCond %{REQUEST_URI} !\.html
```

This is neccessary to load the javascript templates.
Eventually there will be a prebuilt script that already contains these files.
