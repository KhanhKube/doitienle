(function () {
  var root = document.querySelector("[data-rate-widget]");
  if (!root) return;

  var fromSelect = root.querySelector("[data-rate-from]");
  var toSelect = root.querySelector("[data-rate-to]");
  var amountInput = root.querySelector("[data-rate-amount]");
  var resultEl = root.querySelector("[data-rate-result]");
  var swapBtn = root.querySelector("[data-rate-swap]");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var table = {};
  var shown = 0;
  var frame = 0;
  var turns = 0;

  function loadRates() {
    var mock = window.doitienleRatesMock;
    if (!mock || !mock.currencies) {
      return Promise.reject(new Error("missing rates"));
    }
    return Promise.resolve(mock);
  }

  function parseAmount(raw) {
    var text = String(raw || "").trim().replace(/\s/g, "");
    if (!text) return 0;
    if (text.indexOf(",") !== -1 && text.indexOf(".") !== -1) {
      text = text.replace(/\./g, "").replace(",", ".");
    } else if (text.indexOf(",") !== -1) {
      text = text.replace(",", ".");
    }
    var value = Number(text);
    if (!Number.isFinite(value) || value < 0) return 0;
    return value;
  }

  function fractionDigits(value) {
    var nearest = Math.round(value);
    if (Math.abs(value - nearest) < 1e-6) return 0;
    if (value > 0 && value < 1) return 4;
    return 2;
  }

  function formatAmount(value) {
    var digits = fractionDigits(value);
    return new Intl.NumberFormat("vi-VN", {
      minimumFractionDigits: 0,
      maximumFractionDigits: digits
    }).format(value);
  }

  function convert(amount, from, to) {
    var fromRate = table[from];
    var toRate = table[to];
    if (!fromRate || !toRate) return 0;
    return amount * (fromRate / toRate);
  }

  var names = {};

  function paint(value) {
    resultEl.textContent = formatAmount(value) + " tờ";
  }

  function animateTo(next) {
    cancelAnimationFrame(frame);
    if (reduce) {
      shown = next;
      paint(shown);
      return;
    }
    var from = shown;
    var start = performance.now();
    var step = function (now) {
      var t = Math.min(1, (now - start) / 420);
      var eased = 1 - Math.pow(1 - t, 3);
      shown = from + (next - from) * eased;
      paint(shown);
      if (t < 1) frame = requestAnimationFrame(step);
      else shown = next;
    };
    frame = requestAnimationFrame(step);
  }

  function render() {
    var next = convert(parseAmount(amountInput.value), fromSelect.value, toSelect.value);
    animateTo(next);
  }

  function fillSelect(select, selected) {
    select.textContent = "";
    Object.keys(table).forEach(function (code) {
      var option = document.createElement("option");
      option.value = code;
      option.textContent = names[code] || code;
      if (code === selected) option.selected = true;
      select.appendChild(option);
    });
  }

  loadRates().then(function (data) {
    data.currencies.forEach(function (item) {
      table[item.code] = item.vnd;
      names[item.code] = item.name;
    });
    fillSelect(fromSelect, "500");
    fillSelect(toSelect, "500000");
    render();
  }).catch(function () {
    resultEl.textContent = "Chưa có mệnh giá";
  });

  amountInput.addEventListener("input", render);
  fromSelect.addEventListener("change", render);
  toSelect.addEventListener("change", render);
  swapBtn.addEventListener("click", function () {
    var nextFrom = toSelect.value;
    toSelect.value = fromSelect.value;
    fromSelect.value = nextFrom;
    turns += 180;
    swapBtn.style.transform = "rotate(" + turns + "deg)";
    render();
  });
})();
