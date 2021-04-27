<?php

/**
 * @file classes/filter/SetFilterSetting.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class SetFilterSetting
 * @ingroup classes_filter
 *
 * @brief Class that describes a configurable filter setting which must
 *  be one of a given set of values.
 */

namespace PKP\filter;

// FIXME: Add namespacing
import('lib.pkp.classes.form.validation.FormValidatorInSet');

class SetFilterSetting extends FilterSetting
{
    /** @var array */
    public $_acceptedValues;

    /**
     * Constructor
     *
     * @param $name string
     * @param $displayName string
     * @param $validationMessage string
     * @param $acceptedValues array
     * @param $required boolean
     */
    public function __construct($name, $displayName, $validationMessage, $acceptedValues, $required = FORM_VALIDATOR_REQUIRED_VALUE)
    {
        $this->_acceptedValues = $acceptedValues;
        parent::__construct($name, $displayName, $validationMessage, $required);
    }

    //
    // Getters and Setters
    //
    /**
     * Set the accepted values
     *
     * @param $acceptedValues array
     */
    public function setAcceptedValues($acceptedValues)
    {
        $this->_acceptedValues = $acceptedValues;
    }

    /**
     * Get the accepted values
     *
     * @return array
     */
    public function getAcceptedValues()
    {
        return $this->_acceptedValues;
    }

    /**
     * Get a localized array of the accepted
     * values with the key being the accepted value
     * and the value being a localized display name.
     *
     * NB: The standard implementation displays the
     * accepted values.
     *
     * Can be overridden by sub-classes.
     *
     * @return array
     */
    public function getLocalizedAcceptedValues()
    {
        return array_combine($this->getAcceptedValues(), $this->getAcceptedValues());
    }

    //
    // Implement abstract template methods from FilterSetting
    //
    /**
     * @see FilterSetting::getCheck()
     */
    public function &getCheck(&$form)
    {
        $check = new FormValidatorInSet($form, $this->getName(), $this->getRequired(), $this->getValidationMessage(), $this->getAcceptedValues());
        return $check;
    }
}

if (!PKP_STRICT_MODE) {
    class_alias('\PKP\filter\SetFilterSetting', '\SetFilterSetting');
}
