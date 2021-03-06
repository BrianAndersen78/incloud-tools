<?php 
/**
	Admin Page Framework v3.8.20 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/InCloud>
	Copyright (c) 2013-2019, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class InCloudAdminPageFramework_Form_View___CSS_Section extends InCloudAdminPageFramework_Form_View___CSS_Base {
    protected function _get() {
        return $this->_getFormSectionRules();
    }
    private function _getFormSectionRules() {
        $_sCSSRules = ".InCloud-section .form-table {margin-top: 0;}.InCloud-section .form-table td label { display: inline;}.InCloud-section-tabs-contents {margin-top: 1em;}.InCloud-section-tabs { margin: 0;}.InCloud-tab-content { padding: 0.5em 2em 1.5em 2em;margin: 0;border-style: solid;border-width: 1px;border-color: #dfdfdf;background-color: #fdfdfd; }.InCloud-section-tab {background-color: transparent;vertical-align: bottom; margin-bottom: -2px;margin-left: 0px;margin-right: 0.5em;background-color: #F1F1F1;font-weight: normal;}.InCloud-section-tab:hover {background-color: #F8F8F8;}.InCloud-section-tab.active {background-color: #fdfdfd; }.InCloud-section-tab h4 {margin: 0;padding: 0.4em 0.8em;font-size: 1.12em;vertical-align: middle;white-space: nowrap;display:inline-block;font-weight: normal;}.InCloud-section-tab.nav-tab {padding: 0.2em 0.4em;}.InCloud-section-tab.nav-tab a {text-decoration: none;color: #464646;vertical-align: inherit; outline: 0; }.InCloud-section-tab.nav-tab a:focus { box-shadow: none;}.InCloud-section-tab.nav-tab.active a {color: #000;}.InCloud-content ul.InCloud-section-tabs > li.InCloud-section-tab {list-style-type: none;margin: -4px 4px -1px 0;}.InCloud-repeatable-section-buttons {float: right;clear: right;margin-top: 1em;}.InCloud-repeatable-section-buttons.disabled > .repeatable-section-button {color: #edd;border-color: #edd;}.InCloud-section-caption {text-align: left;margin: 0;}.InCloud-section .InCloud-section-title {}.InCloud-sections.sortable-section > .InCloud-section {padding: 1em 1.8em 1em 2.6em;}.InCloud-sections.sortable-section > .InCloud-section.is_subsection_collapsible {display: block; float: none;border: 0px;padding: 0;background: transparent;}.InCloud-sections.sortable-section > .InCloud-tab-content {display: block; float: none;border: 0px;padding: 0.5em 2em 1.5em 2em;margin: 0;border-style: solid;border-width: 1px;border-color: #dfdfdf;background-color: #fdfdfd;}.InCloud-sections.sortable-section > .InCloud-section {margin-bottom: 1em;}.InCloud-section {margin-bottom: 1em; }.InCloud-sectionset {margin-bottom: 1em; display:inline-block;width:100%;}.InCloud-section > .InCloud-sectionset {margin-left: 2em;}";
        $_sCSSRules.= $this->___getForWP47();
        return $_sCSSRules;
    }
    private function ___getForWP47() {
        if (version_compare($GLOBALS['wp_version'], '4.7', '<')) {
            return '';
        }
        return ".InCloud-content ul.InCloud-section-tabs > li.InCloud-section-tab {margin-bottom: -2px;}";
    }
    }
    