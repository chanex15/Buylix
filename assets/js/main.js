/* Buylix theme interactions — vanilla JS, no dependencies. */
(function () {
  "use strict";

  /* ---------- Mobile menu ---------- */
  var toggle = document.getElementById("menuToggle");
  var menu = document.getElementById("mobileMenu");
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      var open = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!open));
      toggle.setAttribute("aria-label", open ? "Open menu" : "Close menu");
      menu.hidden = open;
      document.body.style.overflow = open ? "" : "hidden";
    });
    menu.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        toggle.setAttribute("aria-expanded", "false");
        menu.hidden = true;
        document.body.style.overflow = "";
      });
    });
  }

  /* ---------- Scroll reveal ---------- */
  var revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && revealEls.length) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("in");
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    revealEls.forEach(function (el) {
      io.observe(el);
    });
  } else {
    revealEls.forEach(function (el) {
      el.classList.add("in");
    });
  }

  /* ---------- Hero hotspots ---------- */
  document.querySelectorAll("[data-hotspot]").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var card = document.getElementById(btn.getAttribute("aria-controls"));
      if (!card) return;
      var willOpen = card.hidden;
      document.querySelectorAll(".hotspot-card").forEach(function (c) {
        c.hidden = true;
      });
      card.hidden = !willOpen;
      var title = btn.getAttribute("data-title") || "";
      var text = btn.getAttribute("data-text") || "";
      var t = card.querySelector("[data-t]");
      var d = card.querySelector("[data-d]");
      if (t) t.textContent = title;
      if (d) d.textContent = text;
    });
  });
  var hotspotClose = document.querySelector("[data-hotspot-close]");
  if (hotspotClose) {
    hotspotClose.addEventListener("click", function () {
      document.querySelectorAll(".hotspot-card").forEach(function (c) {
        c.hidden = true;
      });
    });
  }

  /* ---------- Hero color swatches ---------- */
  var swatches = document.querySelectorAll(".swatches button");
  var swatchName = document.getElementById("swatchName");
  swatches.forEach(function (b) {
    b.addEventListener("click", function () {
      swatches.forEach(function (x) {
        x.classList.remove("on");
        x.setAttribute("aria-checked", "false");
      });
      b.classList.add("on");
      b.setAttribute("aria-checked", "true");
      if (swatchName) swatchName.textContent = b.getAttribute("data-name") || "";
    });
  });

  /* ---------- Hero brand tabs -> inventory filter ---------- */
  var heroTabs = document.querySelectorAll(".brand-tabs button");
  heroTabs.forEach(function (b) {
    b.addEventListener("click", function () {
      heroTabs.forEach(function (x) {
        x.classList.remove("on");
        x.setAttribute("aria-selected", "false");
      });
      b.classList.add("on");
      b.setAttribute("aria-selected", "true");
      var brand = b.getAttribute("data-brand") || "All";
      var target = document.querySelector('.tabs button[data-brand="' + brand + '"]');
      if (target) target.click();
      var models = document.getElementById("models");
      if (models) models.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  /* ---------- Inventory: filter / search / sort / budget ---------- */
  var grid = document.getElementById("carGrid");
  var cards = grid ? Array.prototype.slice.call(grid.querySelectorAll(".car")) : [];
  var tabBtns = document.querySelectorAll(".tabs button");
  var search = document.getElementById("carSearch");
  var sortSel = document.getElementById("carSort");
  var budget = document.getElementById("carBudget");
  var budgetLabel = document.getElementById("budgetLabel");
  var countLabel = document.getElementById("carCount");
  var empty = document.getElementById("carEmpty");
  var activeBrand = "All";

  function fmt(n) {
    return "₱" + Number(n).toLocaleString("en-PH");
  }
  function paintRange(input) {
    if (!input) return;
    var min = Number(input.min || 0);
    var max = Number(input.max || 100);
    var pct = ((Number(input.value) - min) / (max - min)) * 100;
    input.style.setProperty("--fill", pct + "%");
  }
  function applyFilters() {
    if (!grid) return;
    var q = search ? search.value.trim().toLowerCase() : "";
    var max = budget ? Number(budget.value) : 999999;
    var visible = [];
    cards.forEach(function (card) {
      var brand = card.getAttribute("data-brand") || "";
      var price = Number(card.getAttribute("data-price") || 0);
      var hay = (card.getAttribute("data-search") || "").toLowerCase();
      var ok = (activeBrand === "All" || brand === activeBrand) && price <= max && (!q || hay.indexOf(q) !== -1);
      card.style.display = ok ? "" : "none";
      if (ok) visible.push(card);
    });
    var mode = sortSel ? sortSel.value : "featured";
    visible.sort(function (a, b) {
      var pa = Number(a.getAttribute("data-price")), pb = Number(b.getAttribute("data-price"));
      var ka = Number(a.getAttribute("data-km")), kb = Number(b.getAttribute("data-km"));
      var ya = Number(a.getAttribute("data-year")), yb = Number(b.getAttribute("data-year"));
      if (mode === "price-low") return pa - pb;
      if (mode === "price-high") return pb - pa;
      if (mode === "mileage") return ka - kb;
      if (mode === "year") return yb - ya;
      return 0;
    });
    visible.forEach(function (c) {
      grid.appendChild(c);
    });
    if (budgetLabel && budget) budgetLabel.textContent = fmt(budget.value);
    if (countLabel) countLabel.textContent = visible.length + " of " + cards.length + " cars";
    if (empty) empty.hidden = visible.length !== 0;
  }
  tabBtns.forEach(function (b) {
    b.addEventListener("click", function () {
      tabBtns.forEach(function (x) {
        x.classList.remove("on");
        x.setAttribute("aria-selected", "false");
      });
      b.classList.add("on");
      b.setAttribute("aria-selected", "true");
      activeBrand = b.getAttribute("data-brand") || "All";
      applyFilters();
    });
  });
  if (search) search.addEventListener("input", applyFilters);
  if (sortSel) sortSel.addEventListener("change", applyFilters);
  if (budget) {
    paintRange(budget);
    budget.addEventListener("input", function () {
      paintRange(budget);
      applyFilters();
    });
  }
  var resetBtn = document.getElementById("carReset");
  if (resetBtn) {
    resetBtn.addEventListener("click", function () {
      activeBrand = "All";
      tabBtns.forEach(function (x, i) {
        x.classList.toggle("on", i === 0);
      });
      if (search) search.value = "";
      if (sortSel) sortSel.value = "featured";
      if (budget) {
        budget.value = budget.max;
        paintRange(budget);
      }
      applyFilters();
    });
  }
  applyFilters();

  /* ---------- Car modal ---------- */
  var modal = document.getElementById("carModal");
  var lastFocus = null;
  function openModal(card) {
    if (!modal || !card) return;
    lastFocus = document.activeElement;
    var d = card.dataset;
    var set = function (id, val) {
      var el = document.getElementById(id);
      if (el) el.textContent = val;
    };
    set("mBrand", (d.brand || "") + " · Certified");
    set("mName", d.name || "");
    set("mTrim", (d.trim || "") + " · " + Number(d.km || 0).toLocaleString() + " km · " + (d.fuel || "") + " · " + (d.trans || ""));
    set("mPrice", fmt(d.price || 0));
    set("mRange", (d.range || "—") + " km");
    set("mSeats", d.seats || "—");
    set("mYear", d.year || "—");
    var img = document.getElementById("mImg");
    if (img) {
      img.src = d.img || "";
      img.alt = d.name || "Car";
    }
    var old = document.getElementById("mOld");
    if (old) {
      if (d.old && Number(d.old) > 0) {
        old.textContent = fmt(d.old);
        old.hidden = false;
      } else {
        old.hidden = true;
      }
    }
    var down = document.getElementById("mDown");
    if (down) {
      down.value = 20;
      paintRange(down);
      updateMonthly();
    }
    modal.hidden = false;
    document.body.style.overflow = "hidden";
    var x = modal.querySelector(".modal-x");
    if (x) x.focus();
  }
  function closeModal() {
    if (!modal) return;
    modal.hidden = true;
    document.body.style.overflow = "";
    if (lastFocus && lastFocus.focus) lastFocus.focus();
  }
  function updateMonthly() {
    var down = document.getElementById("mDown");
    var out = document.getElementById("mMonthly");
    var lbl = document.getElementById("mDownLabel");
    var priceEl = document.getElementById("mPrice");
    if (!down || !out || !priceEl) return;
    var price = Number(priceEl.textContent.replace(/[^0-9]/g, "")) || 0;
    var pct = Number(down.value) || 20;
    var p = Math.max(price - price * (pct / 100), 0);
    var m = (p * (1 + 0.109 * 5)) / 60;
    out.textContent = fmt(Math.round(m));
    if (lbl) lbl.textContent = pct + "% (" + fmt(price * (pct / 100)) + ")";
  }
  document.querySelectorAll("[data-open-car]").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var card = btn.closest(".car");
      openModal(card);
    });
  });
  if (modal) {
    modal.querySelectorAll("[data-close-modal]").forEach(function (b) {
      b.addEventListener("click", closeModal);
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && !modal.hidden) closeModal();
    });
    var downInput = document.getElementById("mDown");
    if (downInput) {
      downInput.addEventListener("input", function () {
        paintRange(downInput);
        updateMonthly();
      });
    }
  }

  /* ---------- Testimonials slider ---------- */
  var slides = document.querySelectorAll(".quote-slide");
  var dots = document.querySelectorAll(".tdots button");
  var idx = 0, timer = null;
  function show(i) {
    idx = (i + slides.length) % slides.length;
    slides.forEach(function (s, k) {
      s.classList.toggle("off", k !== idx);
      s.setAttribute("aria-hidden", k !== idx ? "true" : "false");
    });
    dots.forEach(function (d, k) {
      d.classList.toggle("on", k === idx);
      d.setAttribute("aria-selected", k === idx ? "true" : "false");
    });
  }
  function auto() {
    stop();
    timer = setInterval(function () {
      show(idx + 1);
    }, 6000);
  }
  function stop() {
    if (timer) clearInterval(timer);
  }
  var prev = document.getElementById("tPrev"), next = document.getElementById("tNext");
  if (prev) prev.addEventListener("click", function () { show(idx - 1); auto(); });
  if (next) next.addEventListener("click", function () { show(idx + 1); auto(); });
  dots.forEach(function (d, k) {
    d.addEventListener("click", function () { show(k); auto(); });
  });
  var testi = document.getElementById("testimonials");
  if (testi) {
    testi.addEventListener("mouseenter", stop);
    testi.addEventListener("mouseleave", auto);
  }
  if (slides.length) {
    show(0);
    auto();
  }

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll(".faq-item").forEach(function (item) {
    var btn = item.querySelector(".faq-q");
    if (!btn) return;
    btn.addEventListener("click", function () {
      var isOpen = item.classList.contains("open");
      document.querySelectorAll(".faq-item.open").forEach(function (o) {
        o.classList.remove("open");
        o.querySelector(".faq-q").setAttribute("aria-expanded", "false");
      });
      if (!isOpen) {
        item.classList.add("open");
        btn.setAttribute("aria-expanded", "true");
      }
    });
  });

  /* ---------- Contact form (demo validation + success) ---------- */
  var form = document.getElementById("contactForm");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var name = document.getElementById("c-name");
      var phone = document.getElementById("c-phone");
      var email = document.getElementById("c-email");
      var err = document.getElementById("formErr");
      var okName = name && name.value.trim().length > 1;
      var okContact = (phone && phone.value.trim()) || (email && email.value.trim());
      if (!okName || !okContact) {
        if (err) {
          err.textContent = "Please add your name and a phone number or email so we can reach you.";
          err.hidden = false;
        }
        return;
      }
      if (err) err.hidden = true;
      var btn = form.querySelector('button[type="submit"]');
      if (btn) {
        btn.disabled = true;
        btn.textContent = "Sending…";
      }
      setTimeout(function () {
        var done = document.getElementById("formDone");
        var first = name.value.trim().split(" ")[0];
        var who = document.getElementById("formWho");
        if (who) who.textContent = first;
        form.hidden = true;
        if (done) done.hidden = false;
      }, 800);
    });
    var again = document.getElementById("formAgain");
    if (again) {
      again.addEventListener("click", function () {
        form.reset();
        form.hidden = false;
        document.getElementById("formDone").hidden = true;
        var btn = form.querySelector('button[type="submit"]');
        if (btn) {
          btn.disabled = false;
          btn.textContent = "Request appointment";
        }
      });
    }
  }

  /* ---------- Newsletter ---------- */
  var nl = document.getElementById("newsletterForm");
  if (nl) {
    nl.addEventListener("submit", function (e) {
      e.preventDefault();
      var ok = document.getElementById("newsletterOk");
      if (ok) ok.hidden = false;
      nl.querySelector("input").value = "";
    });
  }
})();
