const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    mode: "development",
    context: path.resolve(__dirname, "assets"),
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, "assets/dist")
    },
    watch: true,
    plugins: [
        new MiniCssExtractPlugin()
    ],
    module: {
        rules: [
          {
            test: /\.(scss)$/,
            use: [              
                MiniCssExtractPlugin.loader,
              {
                // Interprets `@import` and `url()` like `import/require()` and will resolve them
                loader: 'css-loader'
              },
              {
                // Loader for webpack to process CSS with PostCSS
                loader: 'postcss-loader',
                options: {
                  plugins: function () {
                    return [
                      require('autoprefixer')
                    ];
                  }
                }
              },
              {
                // Loads a SASS/SCSS file and compiles it to CSS
                loader: 'sass-loader'
              }
            ]
          },
          {
            test: /\.(woff(2)?|ttf|eot)$/,
            use: [
                {
                    loader: 'file-loader',
                    options: {                   
                        outputPath: '../fonts',                      
                        name: '[name].[ext]'
                    }
                }    
            ]                  
          }
        ]
    }
}