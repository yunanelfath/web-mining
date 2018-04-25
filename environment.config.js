const webpack = require('webpack'),
      gutil = require("gulp-util");

var productionPlugins = gutil.env.production !== undefined && gutil.env.production ? [
  new webpack.optimize.UglifyJsPlugin({
      compress: {
          warnings: false
      },
      comments: false,
      sourceMap: true
  }),
	new webpack.ProgressPlugin(function(percentage, message) {
		const percent = Math.round(percentage * 100);
		process.stderr.clearLine();
		process.stderr.cursorTo(0);
		process.stderr.write(percent + "% " + message);
	})
] : [
  // new webpackBundleAnalyzer()
];
var loaders = [
  {
    test: /\.s?css$/,
    exclude: /node_modules/,
    use: [
      { loader: "style-loader" },
      {
        loader: "css-loader",
        options: {
          modules: true,
          minimize: true,
          localIdentName:'[local]'
        }
      },
      {
        loader: "ruby-sass-loader",
        options: {
          modules: true,
          minimize: true,
          compass: true
        }
      }
    ]
  },
  {
    test: /\.css$/,
    use: [
      {
        loader: 'style-loader',
        options: {
          minimize: true
        }
      },
      {
        loader: 'css-loader',
        options: {
          minimize: true
        }
      }
    ]
  },
  {
    query: {
        presets: ['es2015']
    },
    test: /\.cjsx$/, loader: "coffee-jsx-loader",// all you have to do is just load this loader
  }
];
var environment = {
  plugins: productionPlugins,
  loaders: loaders,
}
exports.environment = environment;
