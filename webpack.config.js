const path = require('path');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const PROD = (process.env.NODE_ENV === 'production') ? true : false;

// Create multiple instances
// const mainStyle = new MiniCssExtractPlugin({filename: (process.env.NODE_ENV === 'production') ? '../css/main.min.css' : '../css/main.css' });
// const inlineStyle = new MiniCssExtractPlugin({filename: (process.env.NODE_ENV === 'production') ? '../css/inline.min.css' : '../css/inline.css'});
const styleExtract = new MiniCssExtractPlugin({filename: (process.env.NODE_ENV === 'production') ? '../css/[name].min.css' : '../css/[name].css'});
const mainMinStyle = new OptimizeCssAssetsPlugin({ assetNameRegExp: /main\.min\.css$/,});
const inlineMinStyle = new OptimizeCssAssetsPlugin({ assetNameRegExp: /inline\.min\.css$/,});
// new OptimizeCssAssetsPlugin({
//     assetNameRegExp: /\.min\.css$/,
//   }),

module.exports = {
  mode: 'development',
  context: path.resolve(__dirname, '.'),
  entry: {
    app: './webpack/js/app.js',
    'inline': './webpack/css/sass/inline.scss',
    'main': './webpack/css/sass/main.scss'
  },
  output: {
    path: path.resolve(__dirname, './public/js'),
    filename: (process.env.NODE_ENV === 'production') ? '[name].min.js' : '[name].js',
  },
  resolve: {
    modules: [path.resolve(__dirname, './src'), 'node_modules'],
  },
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.(sass|scss)$/,
        // include: path.resolve(__dirname, './webpack/css/sass/main.scss'),
        use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                url: false,
                sourceMap: true,
                minimize: (process.env.NODE_ENV === 'production') ? true : false
              }
            },
            {
              loader: 'postcss-sass-loader',
              options: {
                plugins: () => [require('autoprefixer')({
                    'browsers': ['> 1%', 'last 2 versions']
                })],
              }
            },
            {
              loader: 'sass-loader',
              options: { sourceMap: true }
            }
          ]
      },
      {
        test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
        use: [{
            loader: 'file-loader',
            options: {
                name: './fonts/[name].[ext]',
                // outputPath: 'assets/fonts/',
                // publicPath: '../fonts/'
            }
        }]
      },
      // {
      //   test: /\.(sass|scss)$/,
      //   include: path.resolve(__dirname, './webpack/css/sass/inline.scss'),
      //   use: [
      //       MiniCssExtractPlugin.loader,
      //       {
      //         loader: 'css-loader',
      //         options: {
      //           url: false,
      //           sourceMap: true,
      //           minimize: true
      //         }
      //       },
      //       {
      //         loader: 'postcss-sass-loader',
      //         options: {
      //           plugins: () => [require('autoprefixer')({
      //               'browsers': ['> 1%', 'last 2 versions']
      //           })],
      //         }
      //       },
      //       {
      //         loader: 'sass-loader',
      //         options: { sourceMap: true }
      //       }
      //     ]
      // },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [
                'es2015',
              ]
            }
          }
        ],
      }
    ]
  },
  watchOptions: {
    poll: true
  },
  plugins: [
    styleExtract,
    // mainStyle,
    // inlineStyle,
    // new Uglify(),
  ],
  optimization: {
      minimize: PROD,
    minimizer: [
      new TerserPlugin({ parallel: true })
    ]
 }
};