/*! Local lightweight-charts compatibility shim for environments without external package downloads. */
(function (global) {
  function drawCandles(ctx, width, height, data) {
    if (!Array.isArray(data) || data.length === 0) return;
    var min = Math.min.apply(null, data.map(function (d) { return Number(d.low); }));
    var max = Math.max.apply(null, data.map(function (d) { return Number(d.high); }));
    var span = Math.max(max - min, 0.000001);
    var step = width / Math.max(data.length, 1);

    data.forEach(function (d, i) {
      var x = i * step + step / 2;
      var openY = height - ((Number(d.open) - min) / span) * height;
      var closeY = height - ((Number(d.close) - min) / span) * height;
      var highY = height - ((Number(d.high) - min) / span) * height;
      var lowY = height - ((Number(d.low) - min) / span) * height;
      var isUp = Number(d.close) >= Number(d.open);

      ctx.strokeStyle = isUp ? '#22c55e' : '#ef4444';
      ctx.fillStyle = isUp ? '#22c55e' : '#ef4444';
      ctx.lineWidth = 1;
      ctx.beginPath();
      ctx.moveTo(x, highY);
      ctx.lineTo(x, lowY);
      ctx.stroke();

      var top = Math.min(openY, closeY);
      var body = Math.max(Math.abs(closeY - openY), 1);
      ctx.fillRect(x - Math.max(step * 0.28, 1), top, Math.max(step * 0.56, 2), body);
    });
  }

  function drawLine(ctx, width, height, data) {
    if (!Array.isArray(data) || data.length === 0) return;
    var values = data.map(function (d) { return Number(d.value); });
    var min = Math.min.apply(null, values);
    var max = Math.max.apply(null, values);
    var span = Math.max(max - min, 0.000001);

    ctx.strokeStyle = '#2563eb';
    ctx.lineWidth = 2;
    ctx.beginPath();
    data.forEach(function (point, idx) {
      var x = (idx / Math.max(data.length - 1, 1)) * width;
      var y = height - ((Number(point.value) - min) / span) * height;
      if (idx === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    });
    ctx.stroke();
  }

  function createChart(container) {
    var canvas = document.createElement('canvas');
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    container.innerHTML = '';
    container.appendChild(canvas);

    function resize() {
      canvas.width = container.clientWidth || 800;
      canvas.height = container.clientHeight || 500;
    }

    resize();
    window.addEventListener('resize', resize);

    function draw(type, data) {
      resize();
      var ctx = canvas.getContext('2d');
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = '#ffffff';
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      if (type === 'line') drawLine(ctx, canvas.width, canvas.height, data);
      else drawCandles(ctx, canvas.width, canvas.height, data);
    }

    return {
      addAreaSeries: function () {
        return {
          setData: function (data) {
            draw('line', data);
          }
        };
      },
      addCandlestickSeries: function () {
        return {
          setData: function (data) {
            draw('candles', data);
          }
        };
      },
      timeScale: function () {
        return {
          fitContent: function () {}
        };
      }
    };
  }

  global.LightweightCharts = {
    createChart: createChart
  };
})(window);
