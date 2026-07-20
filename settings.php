<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage(
        'local_accesspanel',
        get_string('pluginname', 'local_accesspanel')
    );

    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_configcheckbox(
        'local_accesspanel/enablenav',
        get_string('navigation', 'local_accesspanel'),
        '',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_accesspanel/enablereading',
        get_string('reading', 'local_accesspanel'),
        '',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_accesspanel/enablevisual',
        get_string('visualsettings', 'local_accesspanel'),
        '',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_accesspanel/enablesummary',
        get_string('summary', 'local_accesspanel'),
        '',
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_accesspanel/enableprogress',
        get_string('progress', 'local_accesspanel'),
        '',
        1
    ));

    $settings->add(new admin_setting_configtext(
        'local_accesspanel/backend_url',
        'URL del Backend (Render)',
        'Introduce la URL del backend (ej: back-lti.onrender.com)',
        'https://back-lti.onrender.com',
        PARAM_URL
    ));

    $settings->add(new admin_setting_configpasswordunmask(
        'local_accesspanel/shared_secret',
        'Shared Secret',
        'Debe coincidir exactamente con MOODLE_SHARED_SECRET del backend.',
        ''
    ));
}