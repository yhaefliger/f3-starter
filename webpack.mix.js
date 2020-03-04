const mix = require('laravel-mix');
const purgecss = require('@fullhuman/postcss-purgecss')({
   content: [
      './resources/**/*.html'
   ],
   // Include any special characters you're using in this regular expression
   defaultExtractor: content => content.match(/[\w-/.:]+(?<!:)/g) || []
});

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
      require('postcss-import'),
      require('tailwindcss'),
      require('postcss-preset-env')({ 
         stage: 1,
         features: {
            'focus-within-pseudo-class': false
          }
      }),
      ...process.env.NODE_ENV === 'production'
         ? [purgecss]
         : []
    ])
   .setPublicPath('public');

if (mix.inProduction()) {
   mix.version()
}