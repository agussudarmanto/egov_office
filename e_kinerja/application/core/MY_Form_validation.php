<?php 
/**
 * https://github.com/aariacarterweir/CI_Validation.js
 **/
public static $validationRulesDeclared = FALSE;

public function writeValidationJS($formId, $config = array(), $jsOnly = false) {
    if (!$config && is_array($formId)) {
        $js = '';

        foreach($formId as $id => $config) {
            $js .= $this->writeValidationJS($id, $config, true);
        }

        $this->CI->template->add_js($js, 'embed');

        return;
    }


    $js = "";

    if (!self::$validationRulesDeclared && (self::$validationRulesDeclared = true)) {
        $js .= "window.validationRules = window.validationRules || {};\n";
    }

    $js .= "if (! window.validationRules['$formId']) {\n";
    $js .= "    window.validationRules['$formId'] = ".json_encode($config).";\n";
    $js .= "}\n";

    if ($jsOnly) {

        return $js;
    }

    $this->CI->template->add_js($js, 'embed');
}