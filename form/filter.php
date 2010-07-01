<?php
/**
 * Moodlerooms Framework
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://opensource.org/licenses/gpl-3.0.html.
 *
 * @copyright Copyright (c) 2009 Moodlerooms Inc. (http://www.moodlerooms.com)
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @package local/mr
 * @author Mark Nielsen
 */

require_once($CFG->libdir.'/formslib.php');

/**
 * Filter form
 *
 * @author Mark Nielsen
 * @package local/mr
 */
class local_mr_form_filter extends moodleform {

    function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'filterheader', get_string('filter', 'local_mr'));

        foreach ($this->_customdata as $filter) {
            $filter->add_element($mform);
        }

        $buttons = array();
        $buttons[] = &$mform->createElement('submit', 'submitbutton', get_string('filter', 'local_mr'));
        $buttons[] = &$mform->createElement('submit', 'resetbutton', get_string('reset', 'local_mr'));
        $mform->addGroup($buttons, 'buttons', '', array(' '), false);

        $mform->registerNoSubmitButton('reset');
    }
}