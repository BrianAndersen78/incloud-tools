<?php 
/**
	Admin Page Framework v3.8.20 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/InCloud>
	Copyright (c) 2013-2019, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class InCloudAdminPageFramework_FieldType__nested extends InCloudAdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('_nested');
    protected $aDefaultKeys = array();
    protected function getStyles() {
        return ".InCloud-fieldset > .InCloud-fields > .InCloud-field.with-nested-fields > .InCloud-fieldset.multiple-nesting {margin-left: 2em;}.InCloud-fieldset > .InCloud-fields > .InCloud-field.with-nested-fields > .InCloud-fieldset {margin-bottom: 1em;}.with-nested-fields > .InCloud-fieldset.child-fieldset > .InCloud-child-field-title {display: inline-block;padding: 0 0 0.4em 0;}.InCloud-fieldset.child-fieldset > label.InCloud-child-field-title {display: table-row; white-space: nowrap;}";
    }
    protected function getField($aField) {
        $_oCallerForm = $aField['_caller_object'];
        $_aInlineMixedOutput = array();
        foreach ($this->getAsArray($aField['content']) as $_aChildFieldset) {
            if (is_scalar($_aChildFieldset)) {
                continue;
            }
            if (!$this->isNormalPlacement($_aChildFieldset)) {
                continue;
            }
            $_aChildFieldset = $this->getFieldsetReformattedBySubFieldIndex($_aChildFieldset, ( integer )$aField['_index'], $aField['_is_multiple_fields'], $aField);
            $_oFieldset = new InCloudAdminPageFramework_Form_View___Fieldset($_aChildFieldset, $_oCallerForm->aSavedData, $_oCallerForm->getFieldErrors(), $_oCallerForm->aFieldTypeDefinitions, $_oCallerForm->oMsg, $_oCallerForm->aCallbacks);
            $_aInlineMixedOutput[] = $_oFieldset->get();
        }
        return implode('', $_aInlineMixedOutput);
    }
    }
    class InCloudAdminPageFramework_FieldType_inline_mixed extends InCloudAdminPageFramework_FieldType__nested {
        public $aFieldTypeSlugs = array('inline_mixed');
        protected $aDefaultKeys = array('label_min_width' => '', 'show_debug_info' => false,);
        protected function getStyles() {
            return ".InCloud-field-inline_mixed {width: 98%;}.InCloud-field-inline_mixed > fieldset {display: inline-block;overflow-x: visible;padding-right: 0.4em;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields{display: inline;width: auto;table-layout: auto;margin: 0;padding: 0;vertical-align: middle;white-space: nowrap;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field {float: none;clear: none;width: 100%;display: inline-block;margin-right: auto;vertical-align: middle; }.with-mixed-fields > fieldset > label {width: auto;padding: 0;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field .InCloud-input-label-string {padding: 0;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > .InCloud-input-label-container,.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > * > .InCloud-input-label-container{padding: 0;display: inline-block;width: 100%;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > .InCloud-input-label-container > label,.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > * > .InCloud-input-label-container > label{display: inline-block;}.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > .InCloud-input-label-container > label > input,.InCloud-field-inline_mixed > fieldset > .InCloud-fields > .InCloud-field > * > .InCloud-input-label-container > label > input{display: inline-block;min-width: 100%;margin-right: auto;margin-left: auto;}.InCloud-field-inline_mixed .InCloud-input-label-container,.InCloud-field-inline_mixed .InCloud-input-label-string{min-width: 0;}";
        }
    }
    