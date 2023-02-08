## Installation Instructions

1. npm install
   - Optional if you haven't installed this package yet it will require you this ( npm install --save-dev gulp-strip-css-comments )

## Run Commands

1. gulp ( development mode )
2. gulp prod ( for production )

## Helpful Notes
- If you're adding Styles that are for a plugin or the content coming from Database, e.g. CF7 form custom styles. You need to wrap it inside "purgecss start ignore, purgecss end ignore" same as the example below, this is for when compiling **"gulp prod"**.
```
/*! purgecss start ignore */
----- STYLES HERE
/*! purgecss end ignore */
```

- Here's another method of adding your custom styles as an exception on purgecss: https://purgecss.com/guides/wordpress.html#installation

## Info
- Supported Woocommerce custom templates using tailwind
- With New Beach Blocks handler

## Base Version
- 2.1