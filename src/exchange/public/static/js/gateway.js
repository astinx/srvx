layui.extend({
    admin: '{/}../../static/js/admin'
}).use('admin');

// 面包屑需要依赖`element`模块
// 页面调用xShow()打开<iframe/>
layui.use(['table', 'jquery', 'form', 'layer', 'element'], function () {
    var table = layui.table,
        $ = layui.jquery,
        form = layui.form,
        element = layui.element,
        layer = layui.layer;

    /** 
     * ------------------------------
     * channel-list
     * ------------------------------
    */ 
    /* 搜索 */
    form.on('submit(chanSreach)', function(data){
        layer.msg(JSON.stringify(data.field));
        // todo something
        return false;
    });
    /*添加*/
    form.on('submit(chanAdd)', function (data) {
        $.ajax({
            type: "POST",
            url: 'http://a.jdpay.com/channel/chanEdit/0',
            data: data.field,
            success: function (res) {
                if (res.code === 0) {
                    layer.msg(res.msg, { icon: 1, time: 2000 }, function () {
                        // do something
                        // table 自动化渲染的重载
                        parent.layui.table.reload('chanLists', { url: 'http://a.jdpay.com/channel/chanList'});
                    });
                } else {
                    layer.msg(res.msg, { icon: 2 });
                }
            },
            error: function (err) {
                console.log(err)
                if (err.responseJSON.code) {
                    layer.msg(err.responseJSON.msg, { icon: 2 });
                } else {
                    layer.msg('未知错误', { icon: 5 });
                }
            }
        });
        return false;
    });

    /**动态table function */
    table.render({
        elem: '#chanLists',
        url: 'http://a.jdpay.com/channel/chanList',
        // 分页
        // page:   true,
        page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
            layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'], //自定义分页布局
            groups: 1, //只显示 1 个连续页码
            first: false, //不显示首页
            last: false, //不显示尾页
        },
        // limits: [10, 20, 50],
        // limit: 5, //每页默认显示的数量
        cols: [
            [ //表头
                { field: 'chan_id', title: '网关ID', minWidth: 90, align: 'center', sort: true }
                , { field: 'chan_name', title: '网关名', minWidth: 200, align: 'center' }
                , { field: 'chan_code', title: '网关代号', minWidth: 200, align: 'center' }
                , { field: 'prod_name', title: '支付产品名称', minWidth: 200, align: 'center' }
                , { field: 'prod_id', title: '支付产品ID', minWidth: 120, align: 'center', sort: true }
                , { field: 'state', title: '状态', templet: '#buttonTpl', minWidth: 90, align: 'center', sort: true }
                , { field: 'memo', title: '备注', minWidth: 120, align: 'center' }
                ,{ fixed: 'right', title:'操作', toolbar: '#barDemo', width:150, align: 'center' }
            ]
        ]
    });
    //监听table行工具事件
    table.on('tool(chanList)', function (obj, index) {
        let data = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除该通道?', function (index) {
                $.ajax({
                    type: "get",
                    url: 'https://a.jdpay.com/channel/chanDel/' + data.chan_id,
                    dataType: 'json',
                    success: function (res) {
                        if (res.code === 0) {
                            layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                                obj.del();
                            });
                        } else {
                            layer.msg(res.msg, {icon: 2});
                        }
                    },
                    error: function (err) {
                        console.log(err)
                        // if (err.responseJSON.code) {
                        //     layer.msg(err.responseJSON.msg, {icon: 2});
                        // } else {
                        //     layer.msg('未知错误', {icon: 5});
                        // }
                    }
                });
                layer.close(index);
            });
        } else if (obj.event === 'edit') {
            sessionStorage.setItem('edit_chan', JSON.stringify(data))
            xShow('编辑', '../function-pages/chan-edit.html')
        }
    });
});
