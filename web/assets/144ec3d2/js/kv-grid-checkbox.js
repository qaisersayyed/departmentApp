/*!
 * @package   yii2-grid
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2018
 * @version   3.2.7
 *
 * Client actions for kartik\grid\CheckboxColumn
 * 
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2018, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
var kvSelectRow, kvSelectColumn;
(function ($) {
    "use strict";
    kvSelectRow = function (id, css) {
        var $grid = $('#' + id),
            kvHighlight = function ($el, $parent) {
                var $row = $el.closest('tr'), $cbx = $parent || $el;
                if ($cbx.is(':checked') && !$el.attr('disabled')) {
                    $row.removeClass(css).addClass(css);
                } else {
                    $row.removeClass(css);
                }
            },
            toggle = function ($cbx, all) {
                if (all === true) {
                    $grid.find(".kv-row-select input").each(function () {
                        kvHighlight($(this), $cbx);
                    });
                    return;
                }
                kvHighlight($cbx);
            };
        $grid.find(".kv-row-select input").on('change', function () {
            toggle($(this));
        }).each(function () {
            toggle($(this));
        });
        $grid.find(".kv-all-select input").on('change', function () {
            toggle($(this), true);
        });
    };
    kvSelectColumn = function (id, options) {
        var gridId = '#' + id, $grid = $(gridId), checkAll, inputs, inputsEnabled;
        if (!options.multiple || !options.checkAll) {
            return;
        }
        checkAll = gridId + " input[name='" + options.checkAll + "']";
        inputs = options.class ? "input." + options.class : "input[name='" + options.name + "']";
        inputsEnabled = gridId + " " + inputs + ":enabled";
        $(document).off('click.yiiGridView', checkAll).on('click.yiiGridView', checkAll, function () {
            $grid.find(inputs + ":enabled").prop('checked', this.checked);
        });
        $(document).off('click.yiiGridView', inputsEnabled).on('click.yiiGridView', inputsEnabled, function () {
            var all = $grid.find(inputs).length === $grid.find(inputs + ":checked").length;
            $grid.find("input[name='" + options.checkAll + "']").prop('checked', all);
        });
    };
})(window.jQuery);