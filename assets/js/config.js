require.config({
    paths: {
        "admin": "admin_theme/vendor/admin-lte",
        bootstrap: "admin_theme/vendor/bootstrap/dist/js/bootstrap",
        fontawesome: "admin_theme/vendor/fontawesome/fonts/*",
        ionicons: "admin_theme/vendor/ionicons/fonts/*",
        jquery: "admin_theme/vendor/jquery/dist/jquery",
        react: 'admin_theme/vendor/react/react',
        reactdom: 'admin_theme/vendor/react/react-dom',
        datetimepicker: 'admin_theme/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min',
        moment: 'admin_theme/vendor/moment/min/moment.min',
        selectize: 'admin_theme/vendor/selectize/dist/js/selectize',
        sifter: 'admin_theme/vendor/sifter/sifter',
        microplugin: 'admin_theme/vendor/microplugin/src/microplugin'
    },
    shim: {
        bootstrap: [
            "jquery"
        ],
        "admin/dist/js/app": [
            "jquery",
            "bootstrap"
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
        ],
        datetimepicker: [
            "jquery",
            "bootstrap",
            "moment",
        ],
        selectize: [
            "sifter",
            "microplugin",
        ]
    },
    packages: [
    ]
});
