const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
  ...defaultConfig,
  devServer: {
    ...defaultConfig.devServer,
    allowedHosts: "all", // This can also be set to a url i.e "dev-site.dev'
  },
};
