<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Callback estándar de Moodle: se ejecuta justo antes del cierre del <body>
 * en todas las páginas. Aquí inyectamos el botón/panel de accesibilidad.
 */
function local_accesspanel_before_footer() {
    global $USER, $PAGE, $COURSE, $CFG;

    // No mostrar a usuarios no logueados o invitados.
    if (!isloggedin() || isguestuser()) {
        return '';
    }

    // 1. Obtener la URL guardada usando el nombre CORRECTO del plugin
    $backendurl = get_config('local_accesspanel', 'backend_url'); 
    if (empty($backendurl)) {
        // Valor de respaldo por si no se ha guardado nada en configuraciones
        $backendurl = 'https://onrender.com'; 
    }

    $enablenav      = get_config('local_accesspanel', 'enablenav') !== '0';
    $enablereading  = get_config('local_accesspanel', 'enablereading') !== '0';
    $enablevisual   = get_config('local_accesspanel', 'enablevisual') !== '0';
    $enablesummary  = get_config('local_accesspanel', 'enablesummary') !== '0';
    $enableprogress = get_config('local_accesspanel', 'enableprogress') !== '0';
    
    // URL para utilizar el archivo html
    $templatepath = __DIR__ . '/templates/faro.html';

    $username = fullname($USER); 

    // Cargando el template generado por el grupo Frontend
    $html = '';

    if (file_exists($templatepath)) {
        $html = file_get_contents($templatepath);
        
        // 2. CORRECCIÓN SEGURA: Usamos json_encode para pasar la URL sin romper Moodle.
        // json_encode añade comillas automáticamente, por lo que no es necesario envolverlo en '' en JS.
        $script_seguro = "
        <script>
            var RENDER_BACKEND_URL = " . json_encode($backendurl) . ";
        </script>
        ";
        
        $html = $script_seguro . $html;
    } else {
        $html = '<p>No se encontró faro.html</p>';
    }

    return $html;
}

