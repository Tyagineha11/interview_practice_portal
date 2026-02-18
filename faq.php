<?php include 'header.php'; ?>


<!-- 🌟 HERO SECTION -->
<section class="abt-hero">
  <div class="abt-overlay"></div>
  <div class="abt-hero-content">
    <h1 class="slide-in-title">Frequently Asked Questions</h1>
    <p class="fade-in-sub">Find answers to the most common questions about our interview preparation platform.
    </p>
  </div>
</section>


<!-- FAQ Section Start -->
<section class="faq-section">
  <h2 class="section-title">Got Questions? We’ve Got Answers.</h2>
  <div class="faq-container">

    <div class="faq-item">
      <div class="faq-question">How do I sign up?</div>
      <div class="faq-answer">
        <p>You can sign up by clicking the <b>Sign Up</b> button in the header. Fill out the form and verify your email to start practicing interviews instantly.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Are the interviews real-time?</div>
      <div class="faq-answer">
        <p>Our AI-powered mock interviews simulate real-world conditions, letting you practice anytime with instant feedback and performance analytics.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Can I track my progress?</div>
      <div class="faq-answer">
        <p>Absolutely! You’ll have access to your personal dashboard that shows interview history, scores, and progress over time.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Do I need to pay for access?</div>
      <div class="faq-answer">
        <p>We offer a free plan for beginners and a premium plan for advanced users. Premium unlocks more AI insights, question sets, and expert feedback.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Is technical support available?</div>
      <div class="faq-answer">
        <p>Yes! Our support team is available 24/7 to assist you with any questions or technical issues via chat or email.</p>
      </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">What types of interviews can I practice here?</div>
        <div class="faq-answer">
            <p>You can practice HR, technical, behavioral, and even AI-assisted interviews for roles in IT, marketing, finance, and more.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Do you provide feedback after each interview?</div>
        <div class="faq-answer">
            <p>Yes, our system gives instant AI-based feedback along with detailed scorecards for communication, confidence, and technical accuracy.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Can I download my interview reports?</div>
        <div class="faq-answer">
            <p>Absolutely! You can download performance reports in PDF format to review your progress or share them with mentors.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is there a mobile app available?</div>
        <div class="faq-answer">
            <p>Yes, our platform is fully responsive, and our mobile app is launching soon to let you practice interviews on the go.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Can I customize my interview questions?</div>
        <div class="faq-answer">
            <p>Yes, premium users can select difficulty level, topic, and question types for a personalized mock interview experience.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Do you offer mock interviews with real experts?</div>
        <div class="faq-answer">
            <p>Yes, you can book 1-on-1 mock sessions with HR professionals and technical interviewers for real-time guidance.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">What if I forget my login password?</div>
        <div class="faq-answer">
            <p>You can easily reset your password from the login page using your registered email address — we’ll send a reset link instantly.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Is my data and interview recording secure?</div>
        <div class="faq-answer">
            <p>Yes, all your interview data and responses are securely stored with end-to-end encryption to protect your privacy.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question">Do you provide job placement support?</div>
        <div class="faq-answer">
            <p>Yes, once you achieve consistent high scores, you’ll get access to recruiter listings and company partnerships on our platform.</p>
        </div>
    </div>


  </div>
</section>
<!-- FAQ Section End -->

<?php include 'footer.php'; ?>


<!-- CSS -->
<style>
/* HERO SECTION */
* Base Reset for This Page */
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


/* FAQ SECTION */
.faq-section {
  padding: 80px 20px;
  background: linear-gradient(135deg,#0b0f19,#141828);
  color: white;
  text-align: center;
}

.faq-section .section-title {
  font-size: 2.8rem;
  color: #00d4ff;
  margin-bottom: 50px;
  animation: fadeDown 1s ease;
}

.faq-container {
  max-width: 900px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 20px;
  animation: fadeUp 1.2s ease;
}

.faq-item {
  background: rgba(0,212,255,0.05);
  backdrop-filter: blur(10px);
  border-radius: 15px;
  border: 1px solid rgba(0,212,255,0.2);
  overflow: hidden;
  cursor: pointer;
  transition: all 0.3s ease;
}

.faq-question {
  padding: 20px 25px;
  font-size: 1.2rem;
  font-weight: 600;
  position: relative;
  text-align: left;
  color: #00d4ff;
}

.faq-question::after {
  content: '+';
  position: absolute;
  right: 25px;
  font-size: 1.5rem;
  color: #00d4ff;
  transition: transform 0.3s;
}

.faq-item.active .faq-question::after {
  content: '-';
  transform: rotate(180deg);
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  padding: 0 25px;
  background: rgba(0,212,255,0.05);
  transition: max-height 0.5s ease, padding 0.5s ease;
  text-align: left;
}

.faq-item.active .faq-answer {
  padding: 15px 25px;
  max-height: 300px;
}

.faq-answer p {
  font-size: 1rem;
  line-height: 1.6;
  color: #c0eaff;
}

.faq-item:hover {
  box-shadow: 0 0 25px rgba(0,212,255,0.3);
  transform: translateY(-3px);
}

/* ANIMATIONS */
@keyframes fadeUp {
  from {opacity: 0; transform: translateY(40px);}
  to {opacity: 1; transform: translateY(0);}
}

@keyframes fadeDown {
  from {opacity: 0; transform: translateY(-40px);}
  to {opacity: 1; transform: translateY(0);}
}

/* RESPONSIVE */
@media(max-width: 900px){
  .faq-hero h1 {font-size: 2.2rem;}
  .faq-section .section-title {font-size:2.2rem;}
  .faq-question {font-size:1.1rem;}
  .faq-answer p {font-size:0.95rem;}
}
</style>

<!-- JS -->
<script>
const faqs = document.querySelectorAll('.faq-item');
faqs.forEach(faq => {
  faq.addEventListener('click', () => {
    faq.classList.toggle('active');
  });
});
</script>
