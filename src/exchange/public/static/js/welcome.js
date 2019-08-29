// 路径是引用该js的页面引用的相对路径
layui.extend({
    echarts: '{/}../static/js/extends/echarts',
    echartsTheme: '{/}../static/js/extends/echartsTheme',
});
layui.use(['jquery', 'carousel', 'echarts'], function () {
    var $ = layui.jquery,
        carousel = layui.carousel,
        echarts = layui.echarts;
    //建造实例
    carousel.render({
        elem: '.layadmin-backlog',
        width: '100%', //设置容器宽度				
        arrow: 'none', //始终显示箭头	
        trigger: 'hover',
        autoplay: false
    });
    
    carousel.render({
        elem: '.layadmin-dataview',
        width: '100%', //设置容器宽度				
        arrow: 'none', //始终显示箭头	
        trigger: 'hover',
        autoplay: true
    });
    // 数据概览
    var echartsApp = [],
        options = [
            //今日流量趋势
            {
                title: {
                    text: '今日流量趋势',
                    x: 'center',
                    textStyle: {
                        fontSize: 14
                    }
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['', '']
                },
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ['06:00', '06:30', '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30']
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: [{
                    name: 'PV',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default'
                            }
                        }
                    },
                    data: [111, 222, 333, 444, 555, 666, 3333, 33333, 55555, 66666, 33333, 3333, 6666, 11888, 26666, 38888, 56666, 42222, 39999, 28888, 17777, 9666, 6555, 5555, 3333, 2222, 3111, 6999, 5888, 2777, 1666, 999, 888, 777]
                }, {
                    name: 'UV',
                    type: 'line',
                    smooth: true,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: 'default'
                            }
                        }
                    },
                    data: [11, 22, 33, 44, 55, 66, 333, 3333, 5555, 12666, 3333, 333, 666, 1188, 2666, 3888, 6666, 4222, 3999, 2888, 1777, 966, 655, 555, 333, 222, 311, 699, 588, 277, 166, 99, 88, 77]
                }]
            },

            //访客浏览器分布
            {
                title: {
                    text: '访客浏览器分布',
                    x: 'center',
                    textStyle: {
                        fontSize: 14
                    }
                },
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Chrome', 'Firefox', 'IE 8.0', 'Safari', '其它浏览器']
                },
                series: [{
                    name: '访问来源',
                    type: 'pie',
                    radius: '55%',
                    center: ['50%', '50%'],
                    data: [{
                            value: 9052,
                            name: 'Chrome'
                        },
                        {
                            value: 1610,
                            name: 'Firefox'
                        },
                        {
                            value: 3200,
                            name: 'IE 8.0'
                        },
                        {
                            value: 535,
                            name: 'Safari'
                        },
                        {
                            value: 1700,
                            name: '其它浏览器'
                        }
                    ]
                }]
            },

            //新增的用户量
            {
                title: {
                    text: '最近一周新增的用户量',
                    x: 'center',
                    textStyle: {
                        fontSize: 14
                    }
                },
                tooltip: { //提示框
                    trigger: 'axis',
                    formatter: "{b}<br>新增用户：{c}"
                },
                xAxis: [{ //X轴
                    type: 'category',
                    data: ['11-07', '11-08', '11-09', '11-10', '11-11', '11-12', '11-13']
                }],
                yAxis: [{ //Y轴
                    type: 'value'
                }],
                series: [{ //内容
                    type: 'line',
                    data: [200, 300, 400, 610, 150, 270, 380],
                }]
            }
        ],
        elemDataView = $('#LAY-index-dataview').children('div'),
        renderDataView = function (index) {
            echartsApp[index] = echarts.init(elemDataView[index], layui.echartsTheme);
            echartsApp[index].setOption(options[index]);
            window.onresize = echartsApp[index].resize;
        };
    //没找到DOM，终止执行
    if (!elemDataView[0]) return;
    renderDataView(0);

    //监听数据概览轮播
    var carouselIndex = 0;
    carousel.on('change(LAY-index-dataview)', function (obj) {
        renderDataView(carouselIndex = obj.index);
    });
});
