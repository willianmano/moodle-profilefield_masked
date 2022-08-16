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
 * Masked profile field definition.
 *
 * @package    profilefield_masked
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Class profile_define_masked
 *
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class profile_define_masked extends profile_define_base {

    /**
     * Adds elements to the form for creating/editing this type of profile field.
     *
     * @param moodleform $form
     *
     * @throws coding_exception
     */
    public function define_form_specific($form) {
        // Param 1 for menu type contains the options.
        $form->addElement('text', 'param1', get_string('mask', 'profilefield_masked'));
        $form->setType('param1', PARAM_TEXT);
        $form->addHelpButton('param1', 'mask', 'profilefield_masked');

        $form->addElement('advcheckbox', 'param2', get_string('whatsapplink', 'profilefield_masked'));
        $form->setType('param1', PARAM_TEXT);
        $form->addHelpButton('param2', 'whatsapplink', 'profilefield_masked');
    }
}
