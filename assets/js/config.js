require.config({
    paths: {
      "admin": "admin_theme/vendor/admin-lte",
      bootstrap: "admin_theme/vendor/bootstrap/dist/js/bootstrap",
      jquery: "admin_theme/vendor/jquery/dist/jquery",
      fontawesome: "admin_theme/vendor/fontawesome/fonts/*",
      ionicons: "admin_theme/vendor/ionicons/fonts/*"
    },
    shim: {
      bootstrap: [
        "jquery"
      ],
      "admin/dist/js/app": [
        "jquery"
      ],
      "admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min": [
        "jquery"
      ],
      "admin/plugins/jvectormap/jquery-jvectormap-world-mill-en": [
        "jquery",
        "vendor/jvectormap/jquery-jvectormap-1.2.2.min"
      ],
      "admin/plugins/slimScroll/jquery.slimscroll": [
        "jquery"
      ],
      "admin/dist/js/pages/dashboard2": [
        "jquery",
        "bootstrap"
      ],
      "admin/dist/js/demo": [
        "jquery",
        "bootstrap"
      ]
    },
    packages: [
    ]
});
