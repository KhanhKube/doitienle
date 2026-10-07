(function () {
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // ─── Mobile nav toggle ──────────────────────────────────────────────────
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

  // ─── Sticky header shadow ───────────────────────────────────────────────
  var head = document.querySelector('.site-head');
  if (head) {
    var onHead = function () {
      head.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    onHead();
    window.addEventListener('scroll', onHead, { passive: true });
  }

  // ─── Count-up animation ─────────────────────────────────────────────────
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

  // ─── Read progress bar ──────────────────────────────────────────────────
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

  // ─── Article TOC ────────────────────────────────────────────────────────
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

  // ─── Rise-in animation ──────────────────────────────────────────────────
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

// ─── Category dropdown ────────────────────────────────────────────────────
(function () {
  var catBtn = document.querySelector('.menu-cat-btn');
  var catDrop = document.querySelector('.menu-cat-drop');
  if (!catBtn || !catDrop) return;

  var headerHeight = parseInt(
    getComputedStyle(document.documentElement).getPropertyValue('--header') || '72',
    10
  );

  // ── Collect sections từ <main>: section[id] có heading ─────────────────
  function collectSections() {
    var main = document.querySelector('main');
    if (!main) return [];
    var seen = {};
    var items = [];

    main.querySelectorAll('section[id]').forEach(function (sec) {
      var h = sec.querySelector('h2, h3, h1');
      if (!h) return;
      var label = h.textContent.trim();
      if (!label || seen[sec.id]) return;
      seen[sec.id] = true;
      items.push({ id: sec.id, label: label });
    });

    return items;
  }

  // ── Build dropdown ──────────────────────────────────────────────────────
  function buildDrop(items) {
    catDrop.innerHTML = '';
    items.forEach(function (item, idx) {
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = '#' + item.id;
      a.setAttribute('role', 'menuitem');

      var num = document.createElement('span');
      num.className = 'menu-cat-num';
      num.setAttribute('aria-hidden', 'true');
      num.textContent = String(idx + 1).padStart(2, '0');

      var txt = document.createElement('span');
      txt.textContent = item.label;

      a.appendChild(num);
      a.appendChild(txt);
      li.appendChild(a);
      catDrop.appendChild(li);

      a.addEventListener('click', function (e) {
        e.preventDefault();
        close();
        var target = document.getElementById(item.id);
        if (!target) return;
        var top = target.getBoundingClientRect().top + window.scrollY - headerHeight - 12;
        window.scrollTo({ top: Math.max(0, top), behavior: 'smooth' });
      });
    });
  }

  var sections = collectSections();
  if (!sections.length) {
    // Không có sections — ẩn cả li item
    var li = catBtn.closest('li');
    if (li) li.style.display = 'none';
    return;
  }
  buildDrop(sections);

  // ── Open / close ────────────────────────────────────────────────────────
  function open() {
    catDrop.classList.add('is-open');
    catBtn.setAttribute('aria-expanded', 'true');
    var first = catDrop.querySelector('a');
    if (first) first.focus();
  }
  function close() {
    catDrop.classList.remove('is-open');
    catBtn.setAttribute('aria-expanded', 'false');
  }

  catBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    catDrop.classList.contains('is-open') ? close() : open();
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && catDrop.classList.contains('is-open')) {
      close();
      catBtn.focus();
    }
  });

  document.addEventListener('click', function (e) {
    if (!catBtn.closest('li').contains(e.target)) {
      if (catDrop.classList.contains('is-open')) close();
    }
  });

  // Arrow key navigation
  catDrop.addEventListener('keydown', function (e) {
    var links = Array.prototype.slice.call(catDrop.querySelectorAll('a'));
    var idx = links.indexOf(document.activeElement);
    if (e.key === 'ArrowDown') { e.preventDefault(); links[(idx + 1) % links.length].focus(); }
    else if (e.key === 'ArrowUp') { e.preventDefault(); links[(idx - 1 + links.length) % links.length].focus(); }
    else if (e.key === 'Home') { e.preventDefault(); links[0].focus(); }
    else if (e.key === 'End') { e.preventDefault(); links[links.length - 1].focus(); }
  });

  // ── Highlight mục đang xem khi scroll ──────────────────────────────────
  if (!('IntersectionObserver' in window)) return;

  var currentId = sections[0].id;

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) currentId = entry.target.id;
    });
    var links = catDrop.querySelectorAll('a');
    links.forEach(function (a) {
      if (a.getAttribute('href') === '#' + currentId) a.setAttribute('aria-current', 'true');
      else a.removeAttribute('aria-current');
    });
  }, { rootMargin: '-20% 0px -60% 0px', threshold: 0 });

  sections.forEach(function (s) {
    var el = document.getElementById(s.id);
    if (el) io.observe(el);
  });
})();
