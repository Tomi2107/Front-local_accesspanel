<?php
namespace local_accesspanel\privacy;

defined('MOODLE_INTERNAL') || die();

/**
 * Este plugin no almacena datos personales en el servidor.
 * Los ajustes visuales/lectura se guardan solo en el navegador (localStorage).
 */
class provider implements \core_privacy\local\metadata\null_provider {
    public static function get_reason(): string {
        return 'privacy:metadata';
    }
}
