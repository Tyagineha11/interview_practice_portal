<?php include 'header.php'; ?>

<!-- 🌟 FEATURE HERO SECTION -->
<section class="feat-hero">
  <div class="feat-overlay"></div>
  <div class="feat-hero-content">
    <h1 class="feat-title">Explore Our Key Features</h1>
    <p class="feat-sub">Discover how our AI-powered tools make your interview preparation seamless, personalized, and powerful.</p>
  </div>
</section>

<!-- 🚀 FEATURE SECTION -->
<section class="feature-showcase">
  <div class="feature-grid">
    <div class="feature-box">
      <div class="icon-wrap"><span>🎯</span></div>
      <h3>Targeted Interviews</h3>
      <p>Mock interviews tailored to your specific job roles, domains, and experience level for maximum relevance.</p>
    </div>

    <div class="feature-box">
      <div class="icon-wrap"><span>⏱️</span></div>
      <h3>Anytime, Anywhere</h3>
      <p>Access interview simulations from any device, anytime — complete flexibility in your preparation.</p>
    </div>

    <div class="feature-box">
      <div class="icon-wrap"><span>📊</span></div>
      <h3>Instant Feedback</h3>
      <p>Receive real-time analysis and performance reports to track progress and identify improvement areas.</p>
    </div>

    <div class="feature-box">
      <div class="icon-wrap"><span>💡</span></div>
      <h3>Realistic Scenarios</h3>
      <p>Simulated interview sessions recreate the pressure and environment of actual job interviews.</p>
    </div>

    <div class="feature-box">
      <div class="icon-wrap"><span>📈</span></div>
      <h3>Progress Tracking</h3>
      <p>Monitor your growth with intelligent dashboards showing skill analytics and success ratios.</p>
    </div>

    <div class="feature-box">
      <div class="icon-wrap"><span>🧑‍💻</span></div>
      <h3>Wide Topic Coverage</h3>
      <p>Practice interviews from multiple fields — tech, management, design, and more — all in one platform.</p>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>

<!-- 🌈 STYLES -->
<style>
/* 🌌 HERO SECTION */
.feat-hero {
  position: relative;
  height: 39vh;
  background: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  overflow: hidden;
}

.feat-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.65);
}

.feat-hero-content {
  position: relative;
  z-index: 2;
  color: #fff;
  max-width: 800px;
  padding: 0 20px;
}

.feat-title {
  font-size: 3rem;
  color: #00d4ff;
  text-shadow: 0 0 20px #00d4ff;
  animation: slideUp 1s ease forwards;
  opacity: 0;
}

.feat-sub {
  margin-top: 20px;
  font-size: 1.1rem;
  color: #e0e0e0;
  line-height: 1.6;
  animation: fadeIn 2s ease 0.5s forwards;
  opacity: 0;
}

/* ⚡ FEATURE SHOWCASE */
.feature-showcase {
  padding: 120px 8%;
  background: radial-gradient(circle at 10% 20%, #061223, #0b1633, #000);
  color: #fff;
  position: relative;
  overflow: hidden;
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 50px;
}

.feature-box {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(0, 212, 255, 0.2);
  border-radius: 20px;
  padding: 40px 30px;
  text-align: center;
  backdrop-filter: blur(12px);
  box-shadow: 0 0 25px rgba(0, 212, 255, 0.15);
  transition: all 0.5s ease;
  transform: translateY(20px);
  opacity: 0;
}

.feature-box.active {
  opacity: 1;
  transform: translateY(0);
}

.feature-box:hover {
  transform: translateY(-15px) scale(1.05);
  box-shadow: 0 0 40px rgba(0, 212, 255, 0.5);
}

.icon-wrap {
  font-size: 3rem;
  margin-bottom: 20px;
  display: inline-block;
  color: #00d4ff;
  animation: floatIcon 4s ease-in-out infinite;
}

.feature-box h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
  color: #00d4ff;
}

.feature-box p {
  font-size: 1rem;
  color: #d8d8d8;
  line-height: 1.6;
}

/* ✨ Animations */
@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 768px) {
  .feat-title { font-size: 2.2rem; }
  .feature-showcase { padding: 80px 5%; }
}
</style>

<!-- 🚀 Scroll Animation -->
<script>
window.addEventListener('scroll', () => {
  document.querySelectorAll('.feature-box').forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) el.classList.add('active');
  });
});
</script>
