<?php 
/**
	Admin Page Framework v3.8.20 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/InCloud>
	Copyright (c) 2013-2019, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class InCloudAdminPageFramework_FieldType_section_title extends InCloudAdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array('section_title',);
    protected $aDefaultKeys = array('label_min_width' => 30, 'attributes' => array('size' => 20, 'maxlength' => 100,),);
    protected function getStyles() {
        return ".InCloud-section-tab .InCloud-field-section_title {padding: 0.5em;} .InCloud-section-tab .InCloud-field-section_title .InCloud-input-label-string { vertical-align: middle; margin-left: 0.2em;}.InCloud-section-tab .InCloud-fields {display: inline-block;} .InCloud-field.InCloud-field-section_title {float: none;} .InCloud-field.InCloud-field-section_title input {background-color: #fff;color: #333;border-color: #ddd;box-shadow: inset 0 1px 2px rgba(0,0,0,.07);border-width: 1px;border-style: solid;outline: 0;box-sizing: border-box;vertical-align: middle;}";
    }
    protected function getField($aField) {
        $aField['attributes'] = array('type' => 'text') + $aField['attributes'];
        return parent::getField($aField);
    }
    }
    