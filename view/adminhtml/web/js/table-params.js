define([
    'jquery',
    'jquery/ui'
], function ($) {
    'use strict';

    return function () {
        var saveButton = $('#save'),
            saveContinueButton = $('#save_and_continue'),
            urlParamsDivName = 'div[data-index="table_fields"]',
            urlParamsHiddenInput = 'input[name="record[record_table_field]"]';

        saveButton.on('click', function () {
            serializeData();
        });

        saveContinueButton.on('click', function () {
            serializeData();
        });

        function serializeData() {
            var optionContainer, optionsValues;

            optionContainer = $(urlParamsDivName).find('table tbody');

            if (optionContainer) {
                optionsValues = $.map(
                    optionContainer.find('tr'),
                    function (row) {
                        return $(row).find('input, select, textarea').serialize();
                    }
                );

                $(urlParamsHiddenInput).val(JSON.stringify(optionsValues)).change();
            }
        }
    }
});
