<?php
// ---------- PHP: data ----------
$projects = json_decode(file_get_contents('projects.json'), true) ?? [];

$cvPath = 'Documentation/Mostafa El Badawi El Najjar- CV 2025.pdf';
$cvVer  = file_exists($cvPath) ? filemtime($cvPath) : time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

<title>Mostafa Najjar • MEP Engineer</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
/* ====== Design tokens ====== */
:root{
  --bg: #0b1220;
  --surface: #121826;
  --card: #0f172a;
  --text: #e5e7eb;
  --muted:#9ca3af;
  --primary:#60a5fa;
  --primary-2:#3b82f6;
  --accent:#8b5cf6;
  --teal:#22d3ee;
  --border:#203049;
  --shadow:0 10px 25px rgba(0,0,0,.45);
  --radius:16px;
  --maxw:1200px;
}

/* ====== Base ====== */
html,body{background:var(--bg); color:var(--text); font-family:Inter,system-ui,Segoe UI,Roboto,Arial,sans-serif;}
img{max-width:100%; height:auto; display:block;}
a{color:inherit;}

/* Page-wide subtle orbs */
body{
  background:
    radial-gradient(900px 600px at 10% 10%, rgba(99,102,241,.14), transparent 60%),
    radial-gradient(900px 600px at 90% 85%, rgba(34,211,238,.10), transparent 55%),
    var(--bg);
  background-attachment: fixed;
}

.container{max-width:var(--maxw); margin:0 auto; padding:0 16px;}
section{padding:84px 0;}
.section__title{font-weight:900; font-size:clamp(1.6rem, 3.5vw, 2.4rem); text-align:center; margin:0 0 10px;}
.section__subtitle{color:var(--muted); text-align:center; margin:0 0 32px;}

/* ====== Top bar (desktop & mobile) ====== */
.topbar{
  position:sticky; top:0; z-index:1000;
  background:rgba(10,14,22,.70); backdrop-filter:blur(10px);
  border-bottom:1px solid rgba(255,255,255,.08);
}
.topbar__inner{max-width:var(--maxw); margin:0 auto; padding:10px 16px; display:flex; align-items:center; gap:12px;}
/* Brand = same gradient as active nav pill */
.brand{
  font-weight:900;
  background: linear-gradient(90deg, var(--accent), var(--primary));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 0 0 22px rgba(96,165,250,.22);
}
.brand:hover{ filter: saturate(1.08); }

/* nav pills */
.nav{margin-left:auto; margin-right:auto;}
.nav__list{
  display:flex; align-items:center; gap:12px;
  list-style:none; padding:8px 10px; margin:0;
  border-radius:999px;
  background:rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.12);
  box-shadow:0 10px 30px rgba(0,0,0,.35);
}
.nav__link{
  text-decoration:none; font-weight:700; line-height:1;
  padding:9px 14px; border-radius:999px; white-space:nowrap;
  transition:.18s;
  color:var(--text);
}
.nav__link:hover,
.nav__link.is-active{color:#061018; background:linear-gradient(90deg, var(--accent), var(--primary));}

/* actions */
.actions{display:flex; align-items:center; gap:10px;}
.btn-cta{
  display:inline-flex; align-items:center; gap:8px;
  padding:10px 14px; border-radius:999px; text-decoration:none; font-weight:900;
  color:#061018; background:linear-gradient(90deg,#10b981,var(--teal));
  border:1px solid rgba(255,255,255,.14); box-shadow:0 8px 22px rgba(34,211,238,.25);
}

/* mobile nav */
.nav-toggle{
  display:none; width:44px; height:44px; border-radius:12px;
  border:1px solid rgba(255,255,255,.14);
  background:rgba(255,255,255,.06);
}
.hamburger,.hamburger::before,.hamburger::after{
  content:""; display:block; width:20px; height:2px; background:var(--text); margin:0 auto; position:relative; border-radius:2px;
}
.hamburger::before{position:absolute; top:-6px;}
.hamburger::after{position:absolute; top:6px;}

@media (max-width:860px){
  .nav-toggle{display:block;}
  .nav{position:fixed; left:0; right:0; top:58px; display:none;}
  .nav__list{justify-content:center; overflow-x:auto;}
  body.nav-open .nav{display:block; padding:10px 12px; background:rgba(7,12,22,.98);}
  .actions .btn-cta{display:none;} /* keep just icons when tight */
}

/* ====== HERO ====== */
.intro .container{display:grid; gap:24px; align-items:center;}
@media (min-width:980px){
  .intro .container{grid-template-columns:minmax(260px,360px) 1fr;}
}
.intro__img{
  border-radius:22px; border:3px solid transparent;
  border-image: linear-gradient(135deg, var(--accent), var(--primary), var(--teal)) 1;
  box-shadow:0 16px 38px rgba(0,0,0,.5), 0 0 40px rgba(34,211,238,.15);
  transition:.25s;
}
.intro__img:hover{transform:translateY(-2px); box-shadow:0 22px 54px rgba(0,0,0,.55), 0 0 44px rgba(96,165,250,.22);}
.section__subtitle--intro{
  display:inline-block; padding:8px 12px; border-radius:12px;
  background:linear-gradient(90deg, var(--accent), var(--primary));
  font-weight:900; color:#061018;
}
.hero-pills{display:flex; flex-wrap:wrap; gap:10px; margin:14px 0 0; padding:0; list-style:none;}
.hero-pills li{display:inline-flex; align-items:center; gap:8px; padding:8px 12px; border-radius:999px;
  background:rgba(255,255,255,.06); border:1px solid var(--border); box-shadow:var(--shadow); font-weight:700;}

/* ====== Education ====== */
.education{background:var(--surface);}
.edu{
  display:grid; gap:22px; align-items:center;
  grid-template-columns:120px 1fr;
  max-width:900px; margin:0 auto; padding:18px; border-radius:var(--radius);
  background:var(--card); border:1px solid var(--border); box-shadow:var(--shadow);
}
.edu img{width:100%; height:100px; object-fit:cover; border-radius:12px; border:1px solid var(--border);}
.edu h3{margin:0 0 6px; font-weight:900;}
.edu .degree{margin:0 0 12px; color:var(--muted); font-weight:700;}
.edu .chips{display:flex; flex-wrap:wrap; gap:8px; list-style:none; padding:0; margin:0;}
.edu .chip{padding:6px 10px; border-radius:999px; font-size:.85rem; color:#d9f7ff; background:rgba(34,211,238,.12); border:1px solid rgba(34,211,238,.22);}
@media (max-width:640px){ .edu{grid-template-columns:1fr;} .edu img{height:140px;} }

/* ====== Skills ====== */
.skills-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:18px;}
.skill{
  background:var(--card); border:1px solid var(--border); border-radius:var(--radius);
  box-shadow:var(--shadow); padding:20px; transition:.2s;
}
.skill:hover{transform:translateY(-4px); border-color:rgba(34,211,238,.35); box-shadow:0 18px 36px rgba(0,0,0,.5);}
.skill .icon{font-size:28px; color:var(--primary); margin-bottom:8px;}
.skill h3{margin:6px 0 8px;}
.skill p{color:var(--muted);}

/* ====== About ====== */
.about{background:var(--surface);}
.about .grid{display:grid; gap:36px; align-items:start;}
@media (min-width:1000px){ .about .grid{grid-template-columns:1.15fr .85fr;} }
.about .lead{line-height:1.8; color:var(--text); margin:8px 0 18px;}
.tags{display:flex; flex-wrap:wrap; gap:10px; list-style:none; padding:0; margin:0 0 18px;}
.tags li{padding:8px 12px; border-radius:12px; background:rgba(99,102,241,.14); border:1px solid rgba(255,255,255,.12); font-weight:700; transition:.15s;}
.tags li:hover{transform:translateY(-2px); box-shadow:0 12px 24px rgba(0,0,0,.35); border-color:rgba(34,211,238,.35);}
.stats{display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:12px;}
@media (max-width:560px){ .stats{grid-template-columns:repeat(2,1fr);} }
.stat{background:var(--card); border:1px solid var(--border); border-radius:14px; padding:14px 12px; text-align:center; transition:.15s;}
.stat:hover{transform:translateY(-2px); border-color:rgba(34,211,238,.35);}
.stat .num{font-weight:900; font-size:1.6rem; background:linear-gradient(90deg,var(--primary),var(--teal)); -webkit-background-clip:text; background-clip:text; color:transparent;}
.stat .label{color:var(--muted); font-weight:700; font-size:.92rem;}
/* about photo card */
.photo{
  position:relative; border-radius:18px; overflow:hidden;
  background:
    linear-gradient(var(--card),var(--card)) padding-box,
    linear-gradient(120deg,rgba(139,92,246,.6),rgba(96,165,250,.6)) border-box;
  border:1px solid transparent; box-shadow:0 20px 60px rgba(0,0,0,.45); transition:.2s;
}
.photo:hover{transform:translateY(-4px) scale(1.01); box-shadow:0 28px 70px rgba(0,0,0,.55);}

/* ====== Projects ====== */
.projects-grid{display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:18px;}
@media (max-width:1100px){ .projects-grid{grid-template-columns:repeat(2,1fr);} }
@media (max-width:700px){ .projects-grid{grid-template-columns:1fr;} }
.card{
  background:rgba(15,22,35,.92); border:1px solid rgba(255,255,255,.08); border-radius:18px;
  overflow:hidden; box-shadow:0 12px 30px rgba(0,0,0,.45); display:flex; flex-direction:column; transition:.2s; position:relative;
}
.card:hover{transform:translateY(-4px); border-color:rgba(34,211,238,.35);}
.card__media{display:block; aspect-ratio:16/10; background:#0b1220;}
.card__media img{width:100%; height:100%; object-fit:cover;}
.card__body{padding:14px 16px; display:flex; flex-direction:column; gap:8px; flex:1;}
.chips{display:flex; flex-wrap:wrap; gap:8px;}
.chip{padding:4px 8px; border-radius:999px; font-size:.75rem; color:#d9f7ff; background:rgba(34,211,238,.12); border:1px solid rgba(34,211,238,.22);}
.card__cta{
  align-self:flex-start; margin-top:auto; text-decoration:none; font-weight:900; color:#061018;
  background:linear-gradient(90deg,var(--accent),var(--primary));
  padding:10px 14px; border-radius:12px; border:1px solid rgba(255,255,255,.1);
}

/* ====== Resume ====== */
.resume .box{
  max-width:780px; margin:0 auto; padding:18px; display:flex; flex-wrap:wrap; gap:14px; justify-content:space-between; align-items:center;
  background:var(--card); border:1px solid var(--border); border-radius:14px; box-shadow:var(--shadow);
}
.btn{display:inline-block; padding:10px 14px; border-radius:12px; text-decoration:none; font-weight:900;
     color:#061018; background:linear-gradient(90deg,var(--primary),var(--primary-2)); border:1px solid rgba(255,255,255,.12);}
.btn:hover{filter:saturate(1.05);}

/* ====== Footer ====== */
.footer{border-top:1px solid var(--border); background:var(--surface); padding:22px 0;}
.social{display:flex; gap:12px; list-style:none; padding:0; margin:8px 0 0;}
.social a{display:inline-grid; place-items:center; width:40px; height:40px; border-radius:12px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.12);}
.social a:hover{transform:translateY(-2px);}
/* Mobile polish + edge cases */
html { -webkit-text-size-adjust: 100%; }     /* iOS text zoom sanity */
* { min-width: 0; }                           /* prevent grid overflow */
:where(h1,h2,h3,p,li,span,a){ overflow-wrap:anywhere; }  /* long words/tags */
.icon-btn, .btn-cta, .nav__link { min-height: 44px; }    /* Apple HIG tap size */
.chips, .badge-grid { overflow-x:auto; -webkit-overflow-scrolling:touch; }
.nav__list { gap: 10px; }                     /* tighter pill spacing on small widths */
img, video { max-width: 100%; height: auto; }

@supports(height: 100svh){
  /* modern mobile viewport unit to avoid 100vh bugs on iOS */
  .full-viewport { min-height: 100svh; }
}

/* keep anchored scroll from tucking under sticky header on all sections */
section { scroll-margin-top: calc(var(--headerH, 70px) + 12px); }

/* super-narrow phones */
@media (max-width: 360px){
  .brand { font-size: 0.95rem; }
  .nav__link { padding: 8px 10px; }
}
@media (prefers-reduced-motion: reduce) {
  html:focus-within { scroll-behavior: auto; }
  * { animation: none !important; transition: none !important; }
}
:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }
* { -webkit-tap-highlight-color: rgba(255,255,255,0.08); }
.intro-title{
  display:grid;
  grid-template-columns:auto 1fr;
  grid-template-rows:auto auto;
  column-gap:.6ch; align-items:baseline;
  max-width: 36rem;
}
.intro-title .hello{ grid-column:1; grid-row:1; font-weight:800; color:var(--text); }
.intro-title .name{  grid-column:2; grid-row:1; margin:0; font-weight:900; font-size:clamp(1.6rem,3.8vw,2.4rem);}
.intro-title .tagline{
  grid-column:2; grid-row:2;
  margin:.35rem 0 0; display:inline-block; padding:8px 12px; border-radius:12px;
  background:linear-gradient(90deg,var(--accent),var(--primary)); color:#061018; font-weight:900;
}
@media (max-width:480px){
  .intro-title{ grid-template-columns:1fr; }
  .intro-title .hello{ grid-column:1; }
  .intro-title .name{  grid-column:1; }
  .intro-title .tagline{ grid-column:1; }
}
/* Hero title layout: hello | NAME and tagline under the NAME */
.intro-title{
  display:grid;
  grid-template-columns:auto 1fr;
  grid-template-rows:auto auto;
  column-gap:.7ch;
  align-items:baseline;
  max-width: 46rem;
}
.intro-title .hello{
  grid-column:1; grid-row:1;
  font-weight:800; color:var(--muted);
}
.intro-title .name{
  grid-column:2; grid-row:1;
  margin:0;
  font-weight:900;
  font-size: clamp(1.9rem, 4.2vw, 2.8rem);
  line-height:1.1;
}
.intro-title .tagline{
  grid-column:2; grid-row:2;
  margin:.5rem 0 0;
  display:inline-block;
  padding:.55rem .85rem;
  border-radius:12px;
  background: linear-gradient(90deg, var(--accent), var(--primary));
  color:#061018; font-weight:900;
}

/* Mobile tweak */
@media (max-width:480px){
  .intro-title{ grid-template-columns:1fr; }
  .intro-title .hello,
  .intro-title .name,
  .intro-title .tagline{ grid-column:1; }
}
/* ——— Brand gradient like the active pill ——— */
.brand{
  font-weight: 900;
  background: linear-gradient(90deg, var(--accent), var(--primary));
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
}

/* ——— Hero title split: "Hello, I am" on its own line with spacing ——— */
.hero-title{ margin:0; text-align:left; }
.hero-title .hello{
  display:block;
  font-size: clamp(.95rem, 2.8vw, 1rem);
  letter-spacing:.02em;
  color: var(--muted);
  margin-bottom: .4rem;           /* space between lines */
}
.hero-title .name{
  display:block;
  font-weight: 900;
  font-size: clamp(1.9rem, 7vw, 2.7rem);
  line-height: 1.12;
}

/* keep the subtitle pill snug under the name */
.section__subtitle--intro{
  display:inline-block;
  margin-top: 10px;
}

/* ——— Mobile nav: make it a second row INSIDE the topbar, not a fixed overlay ——— */
@media (max-width: 860px){
  .nav-toggle{ display:none !important; }            /* hide hamburger (no overlay) */
  .topbar__inner{ flex-wrap: wrap; row-gap: 8px; }   /* allow second row */
  .nav{ position: static !important; display:block !important; width:100%; }
  .nav__list{
    width:100%;
    justify-content:flex-start;
    overflow-x:auto; -webkit-overflow-scrolling:touch;
    scrollbar-width:none;
    gap:10px;
  }
  .nav__list::-webkit-scrollbar{ display:none; }
  .actions .btn-cta{ display:none; }                 /* keep only icons when tight */
}

/* Slight top breathing room after the bar on phones */
@media (max-width: 860px){
  .intro{ padding-top: 8px; }
}

/* iOS notch */
.topbar{ padding-top: env(safe-area-inset-top); }

</style>
</head>
<body>

<header class="topbar">
  <div class="topbar__inner">
    <div class="brand">Mostafa</div>

    <button class="nav-toggle" aria-label="Open menu"><span class="hamburger"></span></button>

    <nav class="nav" aria-label="Primary">
      <ul class="nav__list">
        <li><a class="nav__link" href="#home">Home</a></li>
        <li><a class="nav__link" href="#education">Education</a></li>
        <li><a class="nav__link" href="#skills">Skills</a></li>
        <li><a class="nav__link" href="#about">About</a></li>
        <li><a class="nav__link" href="#work">Projects</a></li>
        <li><a class="nav__link" href="#resume">Resume</a></li>
      </ul>
    </nav>

    <div class="actions">
      <!-- keep ONE mailto to avoid duplicates -->
      <a class="btn-cta" href="mailto:eng.mostafanajjar@outlook.com">Get in Touch <span aria-hidden="true">→</span></a>
      <a class="social-btn" href="https://linkedin.com/in/mostafa-najjar" target="_blank" rel="noopener" title="LinkedIn"
         style="display:grid;place-items:center;width:42px;height:42px;border-radius:12px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
  </div>
</header>

<!-- ===== HERO ===== -->
<section id="home" class="intro">
  <div class="container">
    <img class="intro__img" src="img/Pfp-mos.jpg" alt="Mostafa Najjar">

    <h1 class="hero-title">
  <span class="hello">Hello, I am</span>
  <span class="name">Mostafa Najjar !</span>
</h1>
<p class="section__subtitle section__subtitle--intro">MEP Designer &amp; BIM Modeler</p>

</div>

</section>

<!-- ===== EDUCATION ===== -->
<section id="education" class="education">
  <div class="container">
    <h2 class="section__title">Education</h2>
    <p class="section__subtitle">B.E. in Mechanical Engineering</p>

    <div class="edu">
      <img src="img/lau.jpg" alt="Lebanese American University" onerror="this.style.display='none'">
      <div>
        <h3>Lebanese American University (LAU)</h3>
        <p class="degree">Bachelor of Engineering • Mechanical Engineering (2022–2026)</p>
        <ul class="chips">
          <li class="chip">HVAC</li>
          <li class="chip">Thermodynamics</li>
          <li class="chip">Fluid Mechanics</li>
          <li class="chip">Heat Transfer</li>
          <li class="chip">Mechanical Design</li>
          <li class="chip">Thermal Systems</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ===== SKILLS ===== -->
<section id="skills">
  <div class="container">
    <h2 class="section__title">My Skills</h2>
    <p class="section__subtitle">What I work with</p>

    <div class="skills-grid">
      <div class="skill">
        <div class="icon"><i class="fas fa-cogs"></i></div>
        <h3>Systems Design &amp; Standards</h3>
        <p>Designing & integrating MEP systems for residential, commercial & institutional projects; codes like ASHRAE & IPC; accurate load calculations & optimization.</p>
      </div>

      <div class="skill">
        <div class="icon"><i class="fas fa-drafting-compass"></i></div>
        <h3>BIM &amp; Digital Engineering</h3>
        <p>Building Information Modeling with Revit—precise, coordinated, construction-ready models for efficient multidisciplinary collaboration.</p>
      </div>

      <div class="skill">
        <div class="icon"><i class="fas fa-users"></i></div>
        <h3>Leadership &amp; Collaboration</h3>
        <p>Club president, scout leader, and startup co-founder—driving delivery, communication, and teamwork.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== ABOUT ===== -->
<section id="about" class="about">
  <div class="container">
    <div class="grid">
      <div>
        <h2 class="section__title" style="text-align:left">Who’s Mostafa?</h2>
        <span class="section__subtitle" style="display:inline-flex;align-items:center;gap:10px;padding:10px 14px;border-radius:12px;background:linear-gradient(90deg,var(--accent),var(--primary));color:#061018;font-weight:900;">MEP Engineer • BIM Modeler • Team Leader</span>

        <p class="lead">I’m Mostafa El Badawi El Najjar, a Senior Mechanical Engineering student at the Lebanese American University. I focus on sustainable MEP design and modern digital tools to deliver efficient, coordinated systems.</p>
        <p class="lead">Outside academics I’ve led student clubs and scout teams and co-founded LawMate, an AI startup—experiences that sharpened my leadership and delivery.</p>

        <ul class="tags">
          <li title="Cooling/heating loads, ducting, piping">🧮 Load Calc</li>
          <li title="3D coordination, families, schedules">🧩 Revit</li>
          <li title="Energy-aware systems & selections">🌱 Sustainable HVAC</li>
        </ul>

        <div class="stats">
          <div class="stat"><div class="num">10+</div><div class="label">Projects</div></div>
          <div class="stat"><div class="num">4+</div><div class="label">Leadership Roles</div></div>
          <div class="stat"><div class="num">2</div><div class="label">Years in BIM</div></div>
        </div>
      </div>

      <figure class="photo">
        <img src="img/imagemos.jpg" alt="Mostafa Najjar speaking">
      </figure>
    </div>
  </div>
</section>

<!-- ===== PROJECTS ===== -->
<section id="work">
  <div class="container">
    <h2 class="section__title">My Projects</h2>
    <p class="section__subtitle">A selection of my top work</p>

    <div class="projects-grid">
      <?php foreach ($projects as $p): ?>
        <article class="card">
          <a class="card__media" href="project.php?project=<?php echo htmlspecialchars($p['id']); ?>">
            <img src="<?php echo htmlspecialchars($p['images'][0] ?? ''); ?>" alt="<?php echo htmlspecialchars($p['title'] ?? 'Project'); ?>" onerror="this.style.display='none'">
          </a>
          <div class="card__body">
            <?php if (!empty($p['tags']) && is_array($p['tags'])): ?>
              <div class="chips">
                <?php foreach ($p['tags'] as $t): ?>
                  <span class="chip"><?php echo htmlspecialchars($t); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <h3 style="margin:.2rem 0;"><?php echo htmlspecialchars($p['title'] ?? 'Untitled'); ?></h3>
            <?php if (!empty($p['short_description'])): ?>
              <p style="color:var(--muted); margin:0 0 8px;"><?php echo htmlspecialchars($p['short_description']); ?></p>
            <?php endif; ?>

            <a class="card__cta" href="project.php?project=<?php echo htmlspecialchars($p['id']); ?>">View details →</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== RESUME ===== -->
<section id="resume" class="resume">
  <div class="container">
    <h2 class="section__title">My Resume</h2>
    <p class="section__subtitle">PDF download & online view</p>

    <div class="box">
      <div style="display:flex;align-items:center;gap:10px;color:var(--muted);font-weight:700;">
        <i class="far fa-file-pdf"></i> Resume (PDF)
      </div>
      <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <a class="btn" href="<?php echo $cvPath . '?v=' . $cvVer; ?>" target="_blank" rel="noopener">View</a>
        <a class="btn" href="<?php echo $cvPath; ?>" download>Download</a>
      </div>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
  <div class="container" style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;">
    <a class="footer__link" href="mailto:eng.mostafanajjar@outlook.com" style="color:var(--primary); text-decoration:none; font-weight:800;">
      eng.mostafanajjar@outlook.com
    </a>
    <ul class="social">
      <li><a href="https://linkedin.com/in/mostafa-najjar" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="tel:+96176493457" title="Call"><i class="fas fa-phone fa-flip-horizontal"></i></a></li>
    </ul>
  </div>
</footer>

<!-- ===== SCRIPTS ===== -->
<script>
// mobile nav toggle
(function(){
  const btn = document.querySelector('.nav-toggle');
  if (!btn) return;
  btn.addEventListener('click', () => document.body.classList.toggle('nav-open'));
  // close on link click (mobile)
  document.querySelectorAll('.nav__link').forEach(a => a.addEventListener('click', () => {
    document.body.classList.remove('nav-open');
  }));
})();
</script>

<!-- Single, robust active-pill + smooth-scroll (desktop & mobile) -->
<script>
(function () {
  const links = Array.from(document.querySelectorAll('.nav__link, .nav-link'));
  if (!links.length) return;

  // Map unique section ids used in the nav
  const ids = [...new Set(
    links.map(a => (a.hash || '').slice(1).toLowerCase()).filter(Boolean)
  )];
  const sections = ids.map(id => document.getElementById(id)).filter(Boolean);
  const header  = document.querySelector('.topbar');
  const headerH = () => (header?.offsetHeight || 64);

  const setActive = (id) => {
    links.forEach(a => a.classList.toggle('is-active', (a.hash || '').toLowerCase() === '#'+id));
  };

  const scrollToId = (id, smooth=true) => {
    const el = document.getElementById(id);
    if (!el) return;
    const y = el.getBoundingClientRect().top + window.pageYOffset - headerH() - 8;
    window.scrollTo({ top: y, behavior: smooth ? 'smooth' : 'auto' });
  };

  // click: smooth scroll + immediate highlight
  links.forEach(a => {
    a.addEventListener('click', (e) => {
      const id = (a.hash || '').slice(1).toLowerCase();
      if (!id) return;
      e.preventDefault();
      scrollToId(id, true);
      history.replaceState(null, '', '#'+id);
      setActive(id);
    });
  });

  // scroll: choose section whose top is nearest to header
  let ticking = false;
  const updateActive = () => {
    const y = window.scrollY + headerH() + 24;
    let best = null, bestDist = Infinity;
    for (const sec of sections) {
      const top = sec.offsetTop;
      const d   = Math.abs(top - y);
      if (d < bestDist) { best = sec; bestDist = d; }
    }
    if (best) setActive(best.id.toLowerCase());
  };
  window.addEventListener('scroll', () => {
    if (!ticking) {
      ticking = true;
      requestAnimationFrame(() => { updateActive(); ticking = false; });
    }
  }, { passive:true });
  window.addEventListener('resize', updateActive);

  // initial (honor hash and compensate for sticky header)
  window.addEventListener('load', () => {
    const initial = (location.hash || '#home').slice(1).toLowerCase();
    if (document.getElementById(initial)) {
      scrollToId(initial, false);
      setActive(initial);
    } else {
      setActive('home');
    }
    updateActive();
  });
})();
</script>

</body>
</html>
