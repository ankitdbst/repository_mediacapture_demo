<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * repository_mediacapture_demo class
 *
 * @copyright  2012 Ankit Gupta <mailtoankitgupta@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/recorder.php');

class repository_mediacapture_demo extends recorder {

    /**
     * Type option names for the recorder
     * @return array $options
     */
    public static function get_type_option_names() {
        array('demo');
    }

    /**
     * Admin config settings for the type options defined in get_type_option_names()
     * @param $mform
     */
    public function add_config_form($mform) {
        $mform->addElement('advcheckbox', 'demo', get_string('demo', 'repository_mediacapture'),
                            null, array('group' => 1));
    }

    /**
     * The form should contain the following required parameters by mediacapture
     *
     * @param moodleform $mform instance of recoder form
     * @param array $options recorder options
     */
    public function view($mform, $options) {
        $recorderhtml = '<object></object>';
        $mform->addElement('html', $recorderhtml);
        $mform->addElement('hidden', 'filepath', '');
        $mform->addElement('hidden', 'filetype', 'xyz');
        $mform->addElement('text', 'filename', get_string('name', 'repository_mediacapture'));
        $mform->addElement('submit', 'save', get_string('save', 'repository_mediacapture'));
    }

    /**
     * Url for submitting the recorded file (via ajax) to temp_dir()
     * @return string $url
     */
    public function post_url() {
        global $CFG;
        $posturl = new moodle_url("$CFG->wwwroot/repository/mediacapture/recorders/demo/record.php");
        return $posturl;
    }

    /**
     * List of all string keys defined by the recorder in the lang file
     * @return array $strings
     */
    public function string_keys() {
       return array('demo');
    }

    /**
     * Min version of supported_type() required by the recorder
     * @return array $version
     */
    public function min_version() {
       return array('java' => 1.5, 'flash' => 11);
    }

    /**
     * Supported media viz array('audio', 'video')
     * @return array $media
     */
    public function supported_media() {
        return array('audio', 'video');
    }

    /**
     * Supported type viz array('html5', 'flash', 'java')
     * @return array $type
     */
    public function supported_types() {
        return array('java', 'flash', 'html5');
    }
}

