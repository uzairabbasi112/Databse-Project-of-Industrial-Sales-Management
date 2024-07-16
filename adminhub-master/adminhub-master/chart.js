// Chart data
var chartjson = {
    "title": "",
    "data": [
      {
        "name": "Jan",
        "score": 20
      },
      {
        "name": "Feb",
        "score": 73
      },
      {
        "name": "Mar",
        "score": 20
      },
      {
        "name": "Apr",
        "score": 89
      },
      {
        "name": "May",
        "score": 24
      },
      {
        "name": "June",
        "score": 86
      },
      {
        "name": "July",
        "score": 96
      },
      {
        "name": "Aug",
        "score": 71
      },
      {
        "name": "Sept",
        "score": 55
      },
      {
        "name": "Oct",
        "score": 40
      },
      {
        "name": "Nov",
        "score": 65
      },
      {
        "name": "Dec",
        "score": 90
      }
    ],
    "xtitle": "Secured Marks",
    "ytitle": "Marks",
    "ymax": 100,
    "ykey": 'score',
    "xkey": "name",
    "prefix": "%"
  };
  
  // Chart colors
  var colors = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen'];
  
  // Constants
  var TROW = 'tr',
    TDATA = 'td';
  
  var chart = document.createElement('div');
  // Create the chart canvas
  var barchart = document.createElement('table');
  // Create the title row
  var titlerow = document.createElement(TROW);
  // Create the title data
  var titledata = document.createElement(TDATA);
  // Make the colspan to number of records
  titledata.setAttribute('colspan', chartjson.data.length + 1);
  titledata.setAttribute('class', 'charttitle');
  titledata.innerText = chartjson.title;
  titlerow.appendChild(titledata);
  barchart.appendChild(titlerow);
  chart.appendChild(barchart);
  
  // Create the bar row
  var barrow = document.createElement(TROW);
  
  // Add data to the chart
  for (var i = 0; i < chartjson.data.length; i++) {
    barrow.setAttribute('class', 'bars');
    var prefix = chartjson.prefix || '';
    // Create the bar data
    var bardata = document.createElement(TDATA);
    var bar = document.createElement('div');
    bar.setAttribute('class', colors[i]);
    bar.style.height = chartjson.data[i][chartjson.ykey] + prefix;
    bardata.innerText = chartjson.data[i][chartjson.ykey] + prefix;
    bardata.appendChild(bar);
  
    // Create x-axis label
    var xlabel = document.createElement('div');
    xlabel.setAttribute('class', 'xlabel');
    xlabel.innerText = chartjson.data[i][chartjson.xkey];
  
    bardata.appendChild(xlabel);
    barrow.appendChild(bardata);
  }
  
  // Create legends
  var legendrow = document.createElement(TROW);
  var legend = document.createElement(TDATA);
  legend.setAttribute('class', 'legend');
  legend.setAttribute('colspan', chartjson.data.length);
  
  // Add legend data
  for (var i = 0; i < chartjson.data.length; i++) {
    var legbox = document.createElement('span');
    legbox.setAttribute('class', 'legbox');
    var barname = document.createElement('span');
    barname.setAttribute('class', colors[i] + ' xaxisname');
    var bartext = document.createElement('span');
    bartext.innerText = chartjson.data[i][chartjson.xkey];
    legbox.appendChild(barname);
    legbox.appendChild(bartext);
    legend.appendChild(legbox);
  }
  
  barrow.appendChild(legend);
  barchart.appendChild(barrow);
  barchart.appendChild(legendrow);
  chart.appendChild(barchart);
  document.getElementById('chart').innerHTML = chart.outerHTML;
  