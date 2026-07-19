<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_accesspanel', get_string('pluginname', 'local_accesspanel'));
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

    // CORREGIDO: Metemos el campo de la URL dentro del mismo bloque limpio en minúsculas
    $settings->add(new admin_setting_configtext(
        'local_accesspanel/backend_url', // Limpio, en minúsculas y sin acento
        'URL del Backend (Render)',
        'Introduce la URL de tu API en Render (ej: https://tu-app.onrender.com)',
        'https://tu-app.onrender.com', // Quitamos la barra del final para evitar líos con CORS
        PARAM_URL
    ));
}
