const mix = require('laravel-mix');

mix.js('js/app.js', 'dist/app.js')
   .sass('scss/app.scss', 'dist/app.css').options({
      processCssUrls: false
  })
   .sourceMaps()
   .browserSync({
      proxy: 'roukuaidi.local',
      files: [
         'dist/app.css', // Generated .css file
         'dist/app.js', // Generated .js file
         '**/*.php', // Laravel-specific view files
         '**/*.scss'
      ]
   })