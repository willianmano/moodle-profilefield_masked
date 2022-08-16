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
 * Masked profile field.
 *
 * @package    profilefield_masked
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Class profile_field_masked
 *
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class profile_field_masked extends profile_field_base {
    /**
     * Create the code snippet for this field instance
     * @param moodleform $mform Moodle form instance
     */
    public function edit_field_add($mform) {
        global $PAGE;

        $mform->addElement(
            'text',
            $this->inputname,
            format_string($this->field->name),
            [
                "data-mask" => $this->field->param1,
                "placeholder" => $this->field->param1
            ]
        );

        $mform->setType($this->inputname, PARAM_TEXT);

        $PAGE->requires->js_call_amd('profilefield_masked/inputmask', 'init');
    }

    /**
     * Display the data for this field
     * @return string
     */
    public function display_data() {
        global $OUTPUT;
        $imgurl = $OUTPUT->image_url('whatsapp', 'profilefield_masked')->out(false);
        $img = html_writer::img($imgurl, get_string('wpalt', 'profilefield_masked'));
        if ($this->field->param2) {
            if (strpos($this->data, '+') === 0) {
                $number = '+' . preg_replace('~\D~', '', $this->data);
            } else {
                $number = '+55' . preg_replace('~\D~', '', $this->data);
            }
            return $this->data . ' ' .
                   html_writer::link('https://wa.me/' . $number, get_string('shareonwhatsapp', 'profilefield_masked', $img));
        } else {
            return parent::display_data();
        }
    }
}
