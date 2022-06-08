"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// Chartjs Line Demo
// =============================================================
var ChartjsLineDemo = /*#__PURE__*/function () {
  function ChartjsLineDemo() {
    _classCallCheck(this, ChartjsLineDemo);

    this.init();
  }

  _createClass(ChartjsLineDemo, [{
    key: "init",
    value: function init() {
      // event handlers
      this.lineChart(); 
    }
  }, 
  {
    key: "colorBrandNames",
    value: function colorBrandNames() {
      return Object.keys(Looper.getColors('brand'));
    }
  }, {
    key: "randomScalingFactor",
    value: function randomScalingFactor() {
      return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    }
  }, {
    key: "months",
    value: function months() {
      return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    }
  }, 
  {
    key: "lineChart",
    value: function lineChart() {
      var self = this;
      var data = {
        type: 'line',
        data: {
          labels: function(){ 
          },
          datasets: [{
            label: 'Data 1',
            backgroundColor: Looper.colors.brand.purple,
            borderColor: Looper.colors.brand.purple,
            data: [this.randomScalingFactor(), this.randomScalingFactor(), this.randomScalingFactor(), this.randomScalingFactor(), this.randomScalingFactor(), this.randomScalingFactor(), this.randomScalingFactor()],
            fill: false
          }, ]
        },
        options: {
          title: {
            display: true,
            text: 'Line Chart'
          },
          tooltips: {
            mode: 'index',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              ticks: {
                maxRotation: 0,
                maxTicksLimit: 5
              }
            }]
          }
        }
      };

      var canvas = $('#canvas-line')[0].getContext('2d');
      var chart = new Chart(canvas, data); // randomize data
 
    }
  }, 
]);

  return ChartjsLineDemo;
}(); 

$(document).on('theme:init', function () {
  new ChartjsLineDemo();
});