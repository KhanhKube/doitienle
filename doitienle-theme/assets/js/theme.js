(function () {
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var toggle = document.querySelector('.nav-toggle');
  var menu = document.querySelector('.menu');
  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var open = menu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && menu.classList.contains('is-open')) {
        menu.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  var head = document.querySelector('.site-head');
  if (head) {
    var onHead = function () {
      head.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    onHead();
    window.addEventListener('scroll', onHead, { passive: true });
  }

  var counts = document.querySelectorAll('[data-count]');
  if (!reduce && counts.length && 'IntersectionObserver' in window) {
    var countIo = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var target = Number(el.getAttribute('data-count'));
        var start = performance.now();
        var dur = 900;
        var frame = function (now) {
          var t = Math.min(1, (now - start) / dur);
          var eased = 1 - Math.pow(1 - t, 3);
          el.textContent = String(Math.round(target * eased));
          if (t < 1) requestAnimationFrame(frame);
        };
        requestAnimationFrame(frame);
        countIo.unobserve(el);
      });
    }, { threshold: 0.6 });
    counts.forEach(function (el) { countIo.observe(el); });
  }

  var post = document.querySelector('.content-post');
  var bar = document.querySelector('.read-bar span');
  if (post && bar) {
    var onRead = function () {
      var start = post.offsetTop;
      var end = start + post.offsetHeight - window.innerHeight;
      var ratio = end <= start ? 1 : (window.scrollY - start) / (end - start);
      ratio = Math.min(1, Math.max(0, ratio));
      bar.style.transform = 'scaleX(' + ratio + ')';
    };
    onRead();
    window.addEventListener('scroll', onRead, { passive: true });
  }

  var toc = document.querySelector('.toc');
  if (post && toc) {
    var heads = post.querySelectorAll('h2');
    if (heads.length) {
      var list = document.createElement('ul');
      var links = [];
      heads.forEach(function (heading, index) {
        if (!heading.id) heading.id = 'muc-' + (index + 1);
        var item = document.createElement('li');
        var link = document.createElement('a');
        link.href = '#' + heading.id;
        link.textContent = heading.textContent;
        item.appendChild(link);
        list.appendChild(item);
        links.push(link);
      });
      toc.appendChild(list);
      toc.hidden = false;
      var mark = function () {
        var current = heads[0];
        heads.forEach(function (heading) {
          if (heading.getBoundingClientRect().top < 140) current = heading;
        });
        links.forEach(function (link) {
          if (link.getAttribute('href') === '#' + current.id) link.setAttribute('aria-current', 'true');
          else link.removeAttribute('aria-current');
        });
      };
      mark();
      window.addEventListener('scroll', mark, { passive: true });
    }
  }

  if (reduce || !('IntersectionObserver' in window)) return;

  var nodes = document.querySelectorAll('.rise');
  if (!nodes.length) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-in');
      entry.target.classList.remove('is-wait');
      io.unobserve(entry.target);
    });
  }, { threshold: 0.18 });

  nodes.forEach(function (node) {
    var rect = node.getBoundingClientRect();
    if (rect.top > window.innerHeight * 0.92) node.classList.add('is-wait');
    io.observe(node);
  });
})();
