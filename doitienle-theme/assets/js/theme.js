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
  var catBtn = document.querySelector('.cat-btn');
  var catDrop = document.querySelector('.cat-drop');
  if (!catBtn || !catDrop) return;

  var headerHeight = parseInt(
    getComputedStyle(document.documentElement).getPropertyValue('--header') || '72',
    10
  );

  // ── Slugify Vietnamese text to safe id ──────────────────────────────────
  function slugify(text) {
    var map = {
      'à':'a','á':'a','ả':'a','ã':'a','ạ':'a',
      'ă':'a','ắ':'a','ặ':'a','ằ':'a','ẳ':'a','ẵ':'a',
      'â':'a','ấ':'a','ậ':'a','ầ':'a','ẩ':'a','ẫ':'a',
      'è':'e','é':'e','ẻ':'e','ẽ':'e','ẹ':'e',
      'ê':'e','ế':'e','ệ':'e','ề':'e','ể':'e','ễ':'e',
      'ì':'i','í':'i','ỉ':'i','ĩ':'i','ị':'i',
      'ò':'o','ó':'o','ỏ':'o','õ':'o','ọ':'o',
      'ô':'o','ố':'o','ộ':'o','ồ':'o','ổ':'o','ỗ':'o',
      'ơ':'o','ớ':'o','ợ':'o','ờ':'o','ở':'o','ỡ':'o',
      'ù':'u','ú':'u','ủ':'u','ũ':'u','ụ':'u',
      'ư':'u','ứ':'u','ự':'u','ừ':'u','ử':'u','ữ':'u',
      'ỳ':'y','ý':'y','ỷ':'y','ỹ':'y','ỵ':'y',
      'đ':'d',
      'À':'a','Á':'a','Ả':'a','Ã':'a','Ạ':'a',
      'Ă':'a','Ắ':'a','Ặ':'a','Ằ':'a','Ẳ':'a','Ẵ':'a',
      'Â':'a','Ấ':'a','Ậ':'a','Ầ':'a','Ẩ':'a','Ẫ':'a',
      'È':'e','É':'e','Ẻ':'e','Ẽ':'e','Ẹ':'e',
      'Ê':'e','Ế':'e','Ệ':'e','Ề':'e','Ể':'e','Ễ':'e',
      'Ì':'i','Í':'i','Ỉ':'i','Ĩ':'i','Ị':'i',
      'Ò':'o','Ó':'o','Ỏ':'o','Õ':'o','Ọ':'o',
      'Ô':'o','Ố':'o','Ộ':'o','Ồ':'o','Ổ':'o','Ỗ':'o',
      'Ơ':'o','Ớ':'o','Ợ':'o','Ờ':'o','Ở':'o','Ỡ':'o',
      'Ù':'u','Ú':'u','Ủ':'u','Ũ':'u','Ụ':'u',
      'Ư':'u','Ứ':'u','Ự':'u','Ừ':'u','Ử':'u','Ữ':'u',
      'Ỳ':'y','Ý':'y','Ỷ':'y','Ỹ':'y','Ỵ':'y',
      'Đ':'d'
    };
    return text
      .split('').map(function (c) { return map[c] || c; }).join('')
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/^-+|-+$/g, '');
  }

  // ── Collect sections: section[id] > first h2, else standalone h2 in main ─
  function collectSections() {
    var main = document.querySelector('main');
    if (!main) return [];
    var seen = {};
    var items = [];
    var usedSlugs = {};

    // Walk section[id] with a heading inside
    var sections = main.querySelectorAll('section[id]');
    sections.forEach(function (sec) {
      var h = sec.querySelector('h1, h2, h3');
      if (!h) return;
      var label = h.textContent.trim();
      if (!label) return;
      var id = sec.id;
      if (seen[id]) return;
      seen[id] = true;
      items.push({ id: id, label: label, el: sec });
    });

    // Also pick up any h2 directly in main that aren't inside a section[id]
    var allH2 = main.querySelectorAll('h2');
    allH2.forEach(function (h) {
      var parentSec = h.closest('section[id]');
      if (parentSec && seen[parentSec.id]) return; // already added via section
      var label = h.textContent.trim();
      if (!label) return;
      // Ensure id exists on h or its parent section
      var anchor = h.id ? h : (h.closest('section') || h);
      if (!anchor.id) {
        var base = slugify(label);
        var slug = base;
        var n = 1;
        while (usedSlugs[slug]) { slug = base + '-' + (++n); }
        anchor.id = slug;
      }
      usedSlugs[anchor.id] = true;
      if (seen[anchor.id]) return;
      seen[anchor.id] = true;
      items.push({ id: anchor.id, label: label, el: anchor });
    });

    return items;
  }

  // ── Build dropdown list ─────────────────────────────────────────────────
  function buildDrop(items) {
    catDrop.textContent = '';
    items.forEach(function (item, idx) {
      var li = document.createElement('li');
      var a = document.createElement('a');
      a.href = '#' + item.id;

      var num = document.createElement('span');
      num.className = 'cat-num';
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
        closeDropdown();
        var target = document.getElementById(item.id);
        if (!target) return;
        var top = target.getBoundingClientRect().top + window.scrollY - headerHeight - 16;
        window.scrollTo({ top: Math.max(0, top), behavior: 'smooth' });
      });
    });
  }

  var sections = collectSections();
  if (!sections.length) return; // no sections — hide button
  buildDrop(sections);

  // ── Open / close ────────────────────────────────────────────────────────
  function openDropdown() {
    catDrop.hidden = false;
    catBtn.setAttribute('aria-expanded', 'true');
    // focus first link
    var first = catDrop.querySelector('a');
    if (first) first.focus();
  }

  function closeDropdown() {
    catDrop.hidden = true;
    catBtn.setAttribute('aria-expanded', 'false');
  }

  catBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    var isOpen = catBtn.getAttribute('aria-expanded') === 'true';
    if (isOpen) {
      closeDropdown();
    } else {
      openDropdown();
    }
  });

  // ESC closes
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && catBtn.getAttribute('aria-expanded') === 'true') {
      closeDropdown();
      catBtn.focus();
    }
  });

  // Click outside closes
  document.addEventListener('click', function (e) {
    if (!catBtn.contains(e.target) && !catDrop.contains(e.target)) {
      if (catBtn.getAttribute('aria-expanded') === 'true') closeDropdown();
    }
  });

  // Keyboard nav inside dropdown (Arrow keys, Tab, Home, End)
  catDrop.addEventListener('keydown', function (e) {
    var links = Array.prototype.slice.call(catDrop.querySelectorAll('a'));
    var idx = links.indexOf(document.activeElement);
    if (e.key === 'ArrowDown') {
      e.preventDefault();
      links[(idx + 1) % links.length].focus();
    } else if (e.key === 'ArrowUp') {
      e.preventDefault();
      links[(idx - 1 + links.length) % links.length].focus();
    } else if (e.key === 'Home') {
      e.preventDefault();
      links[0].focus();
    } else if (e.key === 'End') {
      e.preventDefault();
      links[links.length - 1].focus();
    }
  });

  // ── Highlight current section while scrolling ────────────────────────────
  if ('IntersectionObserver' in window) {
    var catLinks = [];
    function refreshLinks() {
      catLinks = Array.prototype.slice.call(catDrop.querySelectorAll('a'));
    }
    refreshLinks();

    var sectionEls = sections.map(function (s) { return document.getElementById(s.id); }).filter(Boolean);
    var currentId = sectionEls.length ? sectionEls[0].id : null;

    var catIo = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) currentId = entry.target.id;
      });
      catLinks.forEach(function (a) {
        var href = a.getAttribute('href');
        if (href === '#' + currentId) a.setAttribute('aria-current', 'true');
        else a.removeAttribute('aria-current');
      });
    }, { rootMargin: '-30% 0px -60% 0px', threshold: 0 });

    sectionEls.forEach(function (el) { catIo.observe(el); });
  }
})();
