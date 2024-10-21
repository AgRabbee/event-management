<?php

namespace App\Services;

class FormBuilderService
{
    public function prepareFormRequiredDataBasedOnStructure($params)
    {
        if (isset($params['customer_info'])) {
            foreach ($params['customer_info'] as $rowIndex => &$sectionFields) {
                foreach ($sectionFields as $sectionIndex => &$sectionField) {
                    if (!$sectionField['input_type']) {
                        $params['customer_info'][$rowIndex][$sectionIndex] = [];
                    } else {
                        $params['customer_info'][$rowIndex][$sectionIndex]['type'] = $sectionField['input_type'];
                        $params['customer_info'][$rowIndex][$sectionIndex]['nameAttr'] = !empty($sectionField['custom_id']) ? $sectionField['custom_id'] :
                            str_replace('/', '_', str_replace(' ', '', strtolower($sectionField['label'])));
                        $params['customer_info'][$rowIndex][$sectionIndex]['id'] = !empty($sectionField['custom_id']) ? $sectionField['custom_id'] : strtolower($sectionField['label']);
                        $params['customer_info'][$rowIndex][$sectionIndex]['classList'] = $sectionField['custom_classes'];
                        $params['customer_info'][$rowIndex][$sectionIndex]['classList'] .= isset($sectionField['is_required']) && $sectionField['is_required'] == 1 ? 'required-field' : '';
                        $params['customer_info'][$rowIndex][$sectionIndex]['is_required'] = isset($sectionField['is_required']) && $sectionField['is_required'] == 1;
                        $params['customer_info'][$rowIndex][$sectionIndex]['error_msg'] = $sectionField['err_msg'];
                        unset($sectionField['input_type']);
                        unset($sectionField['custom_id']);
                        unset($sectionField['custom_classes']);
                        unset($sectionField['err_msg']);

                        if (!empty($sectionField['opt'])) {
                            foreach ($sectionField['opt'] as $optIndex => &$option) {
                                $params['customer_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['value'] = $option['value'];
                                $params['customer_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['label'] = $option['label'];
                                $params['customer_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['id'] =
                                    !empty($option['custom_id']) ? $option['custom_id'] : 'opt_' . str_replace(' ', '_', strtolower($option['label']));
                                $params['customer_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['checked'] = isset($option['checked']) && $option['checked'] == 1;
                            }
                            unset($sectionField['opt']);
                        }

                        if (array_key_exists('min_limit', $params['customer_info'][$rowIndex][$sectionIndex])) {
                            $params['customer_info'][$rowIndex][$sectionIndex]['min'] = $sectionField['min_limit'];
                            unset($sectionField['min_limit']);
                        }

                        if (array_key_exists('max_limit', $params['customer_info'][$rowIndex][$sectionIndex])) {
                            $params['customer_info'][$rowIndex][$sectionIndex]['max'] = $sectionField['max_limit'];
                            unset($sectionField['max_limit']);
                        }


                        $params['customer_info'][$rowIndex][$sectionIndex]['inline_style'] = '';
                    }
                }
            }
        }

        if (isset($params['contact_info'])) {
            foreach ($params['contact_info'] as $rowIndex => &$sectionFields) {
                foreach ($sectionFields as $sectionIndex => &$sectionField) {
                    if (!$sectionField['input_type']) {
                        $params['contact_info'][$rowIndex][$sectionIndex] = [];
                    } else {
                        $params['contact_info'][$rowIndex][$sectionIndex]['type'] = $sectionField['input_type'];
                        $params['contact_info'][$rowIndex][$sectionIndex]['nameAttr'] = !empty($sectionField['custom_id']) ? $sectionField['custom_id'] :
                            str_replace('/', '_', str_replace(' ', '', strtolower($sectionField['label'])));
                        $params['contact_info'][$rowIndex][$sectionIndex]['id'] = !empty($sectionField['custom_id']) ? $sectionField['custom_id'] : strtolower($sectionField['label']);
                        $params['contact_info'][$rowIndex][$sectionIndex]['classList'] = $sectionField['custom_classes'];
                        $params['contact_info'][$rowIndex][$sectionIndex]['classList'] .= isset($sectionField['is_required']) && $sectionField['is_required'] == 1 ? 'required-field' : '';
                        $params['contact_info'][$rowIndex][$sectionIndex]['is_required'] = isset($sectionField['is_required']) && $sectionField['is_required'] == 1;
                        $params['contact_info'][$rowIndex][$sectionIndex]['error_msg'] = $sectionField['err_msg'];
                        unset($sectionField['input_type']);
                        unset($sectionField['custom_id']);
                        unset($sectionField['custom_classes']);
                        unset($sectionField['err_msg']);

                        if (!empty($sectionField['opt'])) {
                            foreach ($sectionField['opt'] as $optIndex => &$option) {
                                $params['contact_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['value'] = $option['value'];
                                $params['contact_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['label'] = $option['label'];
                                $params['contact_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['id'] =
                                    !empty($option['custom_id']) ? $option['custom_id'] : 'opt_' . str_replace(' ', '_', strtolower($option['label']));
                                $params['contact_info'][$rowIndex][$sectionIndex]['options'][$optIndex]['checked'] = isset($option['checked']) && $option['checked'] == 1;
                            }
                            unset($sectionField['opt']);
                        }

                        if (array_key_exists('min_limit', $params['contact_info'][$rowIndex][$sectionIndex])) {
                            $params['contact_info'][$rowIndex][$sectionIndex]['min'] = $sectionField['min_limit'];
                            unset($sectionField['min_limit']);
                        }

                        if (array_key_exists('max_limit', $params['contact_info'][$rowIndex][$sectionIndex])) {
                            $params['contact_info'][$rowIndex][$sectionIndex]['max'] = $sectionField['max_limit'];
                            unset($sectionField['max_limit']);
                        }


                        $params['contact_info'][$rowIndex][$sectionIndex]['inline_style'] = '';
                    }
                }
            }
        }
        return [
            'customer_info' => $params['customer_info'],
            'contact_info' => $params['contact_info'],
        ];
    }
}


