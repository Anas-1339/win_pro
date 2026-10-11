(function () {
  "use strict";

  let __ac;
  function fanfare() {
    try {
      __ac = __ac || new (window.AudioContext || window.webkitAudioContext)();
      [523.25, 659.25, 783.99, 1046.5].forEach(function (f, i) {
        const o = __ac.createOscillator(), g = __ac.createGain(), t = __ac.currentTime + i * 0.11;
        o.type = "triangle"; o.frequency.value = f;
        g.gain.setValueAtTime(0.0001, t);
        g.gain.exponentialRampToValueAtTime(0.22, t + 0.02);
        g.gain.exponentialRampToValueAtTime(0.0001, t + 0.45);
        o.connect(g).connect(__ac.destination);
        o.start(t); o.stop(t + 0.5);
      });
    } catch (e) {}
  }

  window.celebrate = function (opts) {
    opts = opts || {};
    const count = opts.count || 180;
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    let cvs = document.getElementById("__confetti");
    if (!cvs) {
      cvs = document.createElement("canvas");
      cvs.id = "__confetti";
      // z-index أعلى من مودال بوتستراب (1055) وأعلى من اللودر
      cvs.style.cssText =
        "position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:20000";
      document.body.appendChild(cvs);
    }

    const ctx = cvs.getContext("2d");
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    const W = window.innerWidth, H = window.innerHeight;
    cvs.width = W * dpr; cvs.height = H * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

    // نقطة الانفجار: مركز العنصر المُمرَّر، أو وسط الشاشة
    let ox = W / 2, oy = H / 2;
    if (opts.origin) {
      const r = opts.origin.getBoundingClientRect();
      ox = r.left + r.width / 2;
      oy = r.top + r.height / 2;
    }

    const COLORS = ["#F4C24B", "#FF5D8F", "#56E0C0", "#0d6efd", "#FFFFFF"];
    const parts = [];
    for (let i = 0; i < count; i++) {
      const a = Math.random() * Math.PI * 2, sp = 3 + Math.random() * 9;
      parts.push({
        x: ox, y: oy,
        vx: Math.cos(a) * sp, vy: Math.sin(a) * sp - 4,
        w: 5 + Math.random() * 7, h: 8 + Math.random() * 10,
        rot: Math.random() * Math.PI, vr: (Math.random() - 0.5) * 0.35,
        c: COLORS[i % COLORS.length], life: 1
      });
    }

    (function tick() {
      ctx.clearRect(0, 0, W, H);
      for (const p of parts) {
        p.vy += 0.26; p.vx *= 0.995;
        p.x += p.vx; p.y += p.vy; p.rot += p.vr;
        if (p.y > H * 0.6) p.life -= 0.016;
        ctx.save();
        ctx.globalAlpha = Math.max(p.life, 0);
        ctx.translate(p.x, p.y);
        ctx.rotate(p.rot);
        ctx.fillStyle = p.c;
        ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
        ctx.restore();
      }
      for (let i = parts.length - 1; i >= 0; i--)
        if (parts[i].life <= 0 || parts[i].y > H + 60) parts.splice(i, 1);
      if (parts.length) requestAnimationFrame(tick);
      else ctx.clearRect(0, 0, W, H);
    })();

    if (opts.sound !== false) fanfare();
  };

  // الربط التلقائي: تنطلق الاحتفالية لحظة ظهور المودال
  document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal");
    if (!modal) return;

    modal.addEventListener("shown.bs.modal", function () {
      const name = modal.querySelector(".modal-body h1");
      if (name) {
        name.classList.remove("winner-pop");
        void name.offsetWidth;          // لإعادة تشغيل الأنيميشن في كل مرة
        name.classList.add("winner-pop");
      }
      window.celebrate({ origin: name });
    });
  });
})();