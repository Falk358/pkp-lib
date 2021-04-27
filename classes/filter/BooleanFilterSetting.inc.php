<?php

/**
 * @file classes/filter/BooleanFilterSetting.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class BooleanFilterSetting
 * @ingroup classes_filter
 *
 * @brief Class that describes a configurable filter setting which must
 *  be either true or false.
 */

namespace PKP\filter;

// FIXME: Add validation
import('lib.pkp.classes.form.validation.FormValidatorBoolean');

class BooleanFilterSetting extends FilterSetting
{
    /**
     * Constructor
     *
     * @param $name string
     * @param $displayName string
     * @param $validationMessage string
     */
    public function __construct($name, $displayName, $validationMessage)
    {
        parent::__construct($name, $displayName, $validationMessage, FORM_VALIDATOR_OPTIONAL_VALUE);
    }


    //
    // Implement abstract template methods from FilterSetting
    //
    /**
     * @see FilterSetting::getCheck()
     */
    public function &getCheck(&$form)
    {
        $check = new FormValidatorBoolean($form, $this->getName(), $this->getValidationMessage());
        return $check;
    }
}

if (!PKP_STRICT_MODE) {
    class_alias('\PKP\filter\BooleanFilterSetting', '\BooleanFilterSetting');
}
