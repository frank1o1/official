define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'position/detail/index',
                    add_url: 'position/detail/add',
                    edit_url: 'position/detail/edit',
                    del_url: 'position/detail/del',
                    multi_url: 'position/detail/multi',
                    table: 'position_detail',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'title', title: __('Title')},
                        {field: 'department', title: __('Department')},
                        {field: 'job_classify', title: __('Job_classify')},
                        {field: 'experience_years', title: __('Experience_years')},
                        {field: 'salary_range', title: __('Salary_range')},
                        {field: 'number', title: __('Number')},
                        {field: 'city', title: __('City')},
                        {field: 'area', title: __('Area')},
                        {field: 'logintude', title: __('Logintude')},
                        {field: 'latitude', title: __('Latitude')},
                        {field: 'status_switch', title: __('Status_switch'), searchList: {"0":__('Status_switch 0'),"1":__('Status_switch 1')}, formatter: Table.api.formatter.toggle},
                        {field: 'publish_time', title: __('Publish_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});