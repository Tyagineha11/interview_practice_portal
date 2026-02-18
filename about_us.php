<?php include 'header.php'; ?>

<!-- 🌟 HERO SECTION -->
<section class="abt-hero">
  <div class="abt-overlay"></div>
  <div class="abt-hero-content">
    <h1 class="slide-in-title">Get Ready to Ace Every Interview</h1>
    <p class="fade-in-sub">Master your confidence with AI-driven simulations and expert guidance.</p>
  </div>
</section>

<!-- 💡 ABOUT SECTION -->
<section class="abt-section">
  <h2 class="abt-heading fade-block">About Us</h2>

  <div class="abt-row fade-block">
    <div class="abt-info">
      <h3>Who We Are</h3>
      <p>We are a next-gen interview preparation platform blending AI, analytics, and expert mentoring to help candidates perform at their best in real interviews.</p>
    </div>
    <div class="abt-image">
      <img src="assets/image/about.png" alt="Interview Preparation">
    </div>
  </div>

  <div class="abt-row abt-reverse fade-block">
    <div class="abt-image">
      <img src="assets/image/about1.png" alt="Career Growth">
    </div>
    <div class="abt-info">
      <h3>What We Do</h3>
      <p>We simulate real interview environments with feedback-driven learning paths. Whether you’re a fresher or a professional, we guide you to success with tailored insights.</p>
    </div>
  </div>
</section>

<!-- 🌈 VALUES SECTION -->
<section class="abt-values">
  <h2 class="abt-heading fade-block">Our Core Values</h2>
  <div class="val-cards">
    <div class="val-card fade-block">
      <div class="val-inner">
        <div class="val-front"><h3>Mission</h3></div>
        <div class="val-back"><p>To empower job seekers with realistic simulations and actionable insights that transform preparation into confidence.</p></div>
      </div>
    </div>
    <div class="val-card fade-block">
      <div class="val-inner">
        <div class="val-front"><h3>Vision</h3></div>
        <div class="val-back"><p>To become the most trusted platform bridging learning with real-world interview success.</p></div>
      </div>
    </div>
    <div class="val-card fade-block">
      <div class="val-inner">
        <div class="val-front"><h3>Promise</h3></div>
        <div class="val-back"><p>We promise to make every candidate interview-ready through innovation, honesty, and constant improvement.</p></div>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- 🌟 STYLES -->
<style>
/* Base Reset for This Page */
.abt-hero, .abt-section, .abt-values {
  font-family: "Poppins", sans-serif;
  color: #fff;
}

/* HERO SECTION */
.abt-hero {
  position: relative;
  height: 39vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  background: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
  overflow: hidden;
}

.abt-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.65);
  animation: abt-fadeIn 2s ease forwards;
}

.abt-hero-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
}

.abt-hero-content h1 {
  font-size: 3rem;
  color: #00d4ff;
  text-shadow: 0 0 25px #00d4ff;
  margin-bottom: 20px;
}

.abt-hero-content p {
  font-size: 1.2rem;
  color: #e8e8e8;
}

/* ABOUT SECTION */
.abt-section {
  padding: 100px 8%;
  background: linear-gradient(135deg, #0a1120, #111d3a);
  overflow: hidden;
}

.abt-heading {
  text-align: center;
  font-size: 2.5rem;
  margin-bottom: 70px;
  color: #00d4ff;
  letter-spacing: 1.5px;
}

.abt-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 60px;
  margin-bottom: 80px;
  flex-wrap: wrap;
}

.abt-reverse {
  flex-direction: row-reverse;
}

.abt-info {
  flex: 1;
  font-size: 1.1rem;
  line-height: 1.8;
}

.abt-info h3 {
  font-size: 1.9rem;
  color: #00d4ff;
  margin-bottom: 20px;
}

.abt-image {
  flex: 1;
}

.abt-image img {
  width: 100%;
  border-radius: 20px;
  box-shadow: 0 10px 40px rgba(0, 212, 255, 0.3);
  transition: transform 1s ease;
}

.abt-image img:hover {
  transform: scale(1.05);
}

/* VALUES SECTION */
.abt-values {
  background: linear-gradient(145deg, #08101f, #0b1833);
  padding: 100px 8%;
  text-align: center;
}

.val-cards {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
}

.val-card {
  width: 300px;
  height: 260px;
  perspective: 1000px;
}

.val-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transition: transform 1s;
}

.val-card:hover .val-inner {
  transform: rotateY(180deg);
}

.val-front, .val-back {
  position: absolute;
  inset: 0;
  border-radius: 20px;
  box-shadow: 0 0 35px rgba(0,212,255,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 25px;
  backface-visibility: hidden;
}

.val-front {
  background: linear-gradient(135deg, #007bff, #00d4ff);
}

.val-front h3 {
  font-size: 1.6rem;
  color: #fff;
}

.val-back {
  background: rgba(0, 212, 255, 0.1);
  color: #00d4ff;
  transform: rotateY(180deg);
  font-size: 1rem;
  line-height: 1.6;
}

/* Reveal Animation */
.fade-block {
  opacity: 0;
  transform: translateY(60px);
  transition: 1s all ease;
}

.fade-block.active {
  opacity: 1;
  transform: translateY(0);
}

/* Keyframes */
@keyframes abt-fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.slide-in-title {
  animation: abt-slideUp 1.2s ease forwards;
  opacity: 0;
}
@keyframes abt-slideUp {
  from { opacity: 0; transform: translateY(50px); }
  to { opacity: 1; transform: translateY(0); }
}

.fade-in-sub {
  animation: abt-fadeIn 2.5s ease 0.5s forwards;
  opacity: 0;
}

/* Responsive */
@media (max-width: 900px) {
  .abt-row, .abt-reverse { flex-direction: column; text-align: center; }
  .val-cards { flex-direction: column; align-items: center; }
}
</style>

<!-- 🌟 SCROLL ANIMATION -->
<script>
window.addEventListener('scroll', () => {
  document.querySelectorAll('.fade-block').forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 150) el.classList.add('active');
  });
});
</script>
