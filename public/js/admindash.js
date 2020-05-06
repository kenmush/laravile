
function ajax(e){

    let base_url = window.location.origin;
    $('.net-income').html('')
    $('.sales-year').html('')
    let months = [];
    let amounts = [];
    let years = '';
    years = this.document.activeElement.value;
    $('.net-income').append('<i class="fas fa-sync-alt fa-spin m-auto" style="font-size:48px;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)"></i>')
    $.get(base_url +'/render(/getEarningMonthly/' + years, (data) => {
        data.earning.forEach( (e) => {
            months.push(data.month[e.month]);
            amounts.push((e.count)/100);
        })

        $('.fa-sync-alt').hide()
        var data = {
            labels: months,
            series: [
                amounts
            ]
        };
        new Chartist.Bar(".net-income",
        data)

        $('.sales-year').append('Income for the Year: '+ years )
    })

}


$(function () {
let base_url = window.location.origin;

$.get(base_url +'/render(/sales/', (data) => {
    c3.generate({
        bindto: "#campaign-v2",
        data: {
            columns: [
                ["Direct Sales", data.directSale ?? 0],
                ["Referral Sales", data.referarSale ?? 0],
                ["Afilliate Sales", data.affiliateSale ?? 0],

            ],
            type: "donut",
            tooltip: {
                show: !0
            }
        },
        donut: {
            label: {
                show: !1
            },
            title: "Sales",
            width: 18
        },
        legend: {
            hide: !0
        },
        color: {
            pattern: [ "#5f76e8", "#ff4f70", "#01caf1"]
        }
    });

})


d3.select("#campaign-v2 .c3-chart-arcs-title").style("font-family", "Rubik");
var e = {
    axisX: {
        showGrid: !1
    },
    seriesBarDistance: 1,
    chartPadding: {
        top: 15,
        right: 15,
        bottom: 5,
        left: 0
    },
    plugins: [Chartist.plugins.tooltip()],
    width: "100%"
};



$('.calendar').on('click',function(){
    var dt = new Date();
    setTimeout(function(){
    $('.popover-body').append('<input type="number" class="form-control .cur-year" value="'+dt.getFullYear()+'" oninput="ajax()">')

    },100)

})
let month = [];
let amount = [];
let year = '';

// get data from ajax
$.get(base_url +'/render(/getEarningMonthly/' + year, (data) => {
    data.earning.forEach( (e) => {
        month.push(data.month[e.month]);
        amount.push((e.count)/100);
    })


var data = {
    labels: month,
    series: [
        amount
    ]
};

new Chartist.Bar(".net-income",
    data, e, [
    ["screen and (max-width: 640px)", {
        seriesBarDistance: 5,
        axisX: {
            labelInterpolationFnc: function (e) {
                return e[0]
            }
        }
    }]
]), jQuery("#visitbylocate").vectorMap({
    map: "world_mill_en",
    backgroundColor: "transparent",
    borderColor: "#000",
    borderOpacity: 0,
    borderWidth: 0,
    zoomOnScroll: !1,
    color: "#d5dce5",
    regionStyle: {
        initial: {
            fill: "#d5dce5",
            "stroke-width": 1,
            stroke: "rgba(255, 255, 255, 0.5)"
        }
    },
    enableZoom: !0,
    hoverColor: "#bdc9d7",
    hoverOpacity: null,
    normalizeFunction: "linear",
    scaleColors: ["#d5dce5", "#d5dce5"],
    selectedColor: "#bdc9d7",
    selectedRegions: [],
    showTooltip: !0,
    onRegionClick: function (e, t, o) {
        var a = 'You clicked "' + o + '" which has the code: ' + t.toUpperCase();
        console.log(a)
    }
});
});




var t = new Chartist.Line(".stats", {
    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    series: [
        [11, 10, 15, 21, 14, 23, 12]
    ]
}, {
    low: 0,
    high: 28,
    showArea: !0,
    fullWidth: !0,
    plugins: [Chartist.plugins.tooltip()],
    axisY: {
        onlyInteger: !0,
        scaleMinSpace: 40,
        offset: 20,
        labelInterpolationFnc: function (e) {
            return e / 1 + "k"
        }
    }
});
t.on("draw", function (e) {
    "area" === e.type && e.element.attr({
        x1: e.x1 + .001
    })
}), t.on("created", function (e) {
    e.svg.elem("defs").elem("linearGradient", {
        id: "gradient",
        x1: 0,
        y1: 1,
        x2: 0,
        y2: 0
    }).elem("stop", {
        offset: 0,
        "stop-color": "rgba(255, 255, 255, 1)"
    }).parent().elem("stop", {
        offset: 1,
        "stop-color": "rgba(80, 153, 255, 1)"
    })
}), $(window).on("resize", function () {
    t.update()
})
});
