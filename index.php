<?php include 'header.php'; ?>

<!-- Seticon One Start -->
<section class="hero-alt">
  <div class="hero-left"> 
    <h1>Level Up Your Career With Every Practice</h1>
    <p>Sharpen your skills with real-world interview challenges and unlock your dream career.</p>
    
    <!-- Dynamic Get Started Button -->
    <a href="<?php echo isset($_SESSION['user']) ? 'dashboard.php' : 'signup.php'; ?>" class="btn-cta">
        <?php 
            echo 'Get Started - ';
            echo isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']['name']) : 'Sign Up';
        ?>
    </a>
  </div>

  <div class="hero-right">
    <div class="shape shape1"></div>
    <div class="shape shape2"></div>
    <div class="shape shape3"></div>
  
    <!-- New floating blobs -->
    <div class="blob blob1"></div>
    <div class="blob blob2"></div>
    <div class="blob blob3"></div>
  
    <!-- Particle dots -->
    <div class="particle particle1"></div>
    <div class="particle particle2"></div>
    <div class="particle particle3"></div>
    <div class="particle particle4"></div>
  </div>
</section>


<!-- Section one css start -->
<style>
  .hero-alt {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 74vh;
    padding: 0 60px;
    background: linear-gradient(135deg, #0d111f, #141829);
    overflow: hidden;
    position: relative;
  }

  .hero-left {
    max-width: 50%;
    z-index: 2;
    animation: fadeInLeft 1s ease forwards;
    opacity: 0;
  }

  .hero-left h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    line-height: 1.2;
    color: #00d4ff;
  }

  .hero-left p {
    font-size: 1.2rem;
    margin-bottom: 30px;
    color: #a0cfff;
  }

  .btn-cta {
    display: inline-block;
    padding: 15px 35px;
    font-size: 1.2rem;
    font-weight: 600;
    color: white;
    text-decoration: none;
    border-radius: 50px;
    background: linear-gradient(135deg, #00d4ff, #007bff);
    box-shadow: 0 5px 20px rgba(0,212,255,0.4);
    transition: all 0.3s ease;
  }

  .btn-cta:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,212,255,0.6);
  }

  .hero-right {
    position: relative;
    width: 45%;
    height: 400px;
  }

  /* Animated shapes */
  .shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(0, 212, 255, 0.3);
    animation: float 6s ease-in-out infinite;
  }

  .shape1 {
    width: 120px;
    height: 120px;
    top: 10%;
    left: 50%;
    animation-delay: 0s;
  }

  .shape2 {
    width: 80px;
    height: 80px;
    top: 50%;
    left: 70%;
    animation-delay: 2s;
    background: rgba(0, 212, 255, 0.5);
  }

  .shape3 {
    width: 150px;
    height: 150px;
    top: 70%;
    left: 30%;
    animation-delay: 4s;
    background: rgba(0, 212, 255, 0.2);
  }

  @keyframes fadeInLeft {
    to { opacity: 1; transform: translateX(0); }
    from { opacity: 0; transform: translateX(-50px); }
  }

  @keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
  }

  /* Responsive */
  @media (max-width: 900px) {
    .hero-alt {
      flex-direction: column-reverse;
      padding: 40px 20px;
      text-align: center;
    }

    .hero-left {
      max-width: 100%;
      margin-top: 20px;
    }

    .hero-right {
      width: 100%;
      height: 300px;
    }
  }

  /* New floating blobs */
.blob {
  position: absolute;
  border-radius: 50%;
  background: rgba(0, 212, 255, 0.15);
  filter: blur(20px);
  animation: floatBlob 8s ease-in-out infinite;
}

.blob1 { width: 180px; height: 180px; top: 20%; left: 20%; animation-delay: 0s;}
.blob2 { width: 120px; height: 120px; top: 60%; left: 60%; animation-delay: 2s;}
.blob3 { width: 200px; height: 200px; top: 40%; left: 75%; animation-delay: 4s;}

@keyframes floatBlob {
  0%, 100% { transform: translateY(0) rotate(0deg);}
  50% { transform: translateY(-40px) rotate(180deg);}
}

/* Particle dots */
.particle {
  position: absolute;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: rgba(0, 212, 255, 0.5);
  animation: moveParticle 6s linear infinite;
}

.particle1 { top: 10%; left: 10%; animation-delay: 0s;}
.particle2 { top: 30%; left: 80%; animation-delay: 1s;}
.particle3 { top: 70%; left: 50%; animation-delay: 2s;}
.particle4 { top: 50%; left: 30%; animation-delay: 3s;}

@keyframes moveParticle {
  0% { transform: translate(0,0);}
  50% { transform: translate(50px, -30px);}
  100% { transform: translate(0,0);}
}
</style>

<!-- Section one css end -->

<!-- Seticon One end -->
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

<!-- How It Works Full Width Panels -->
<section class="how-it-works-panels">
  <h2 class="section-title">How It Works</h2>
  <div class="panels-container">
    <div class="panel">
      <div class="icon">📝</div>
      <h3>Sign Up as Candidate</h3>
      <p>Create your profile and join the platform to start your interview journey.</p>
    </div>
    <div class="panel">
      <div class="icon">🎯</div>
      <h3>Choose an Interview & Attempt</h3>
      <p>Select an interview type, practice anytime, and gain realistic experience.</p>
    </div>
    <div class="panel">
      <div class="icon">📊</div>
      <h3>Get Feedback & Score</h3>
      <p>Receive instant feedback, track your progress, and improve your performance.</p>
    </div>
  </div>
</section>

<style>
/* Full Width Panels */
.how-it-works-panels {
  background: linear-gradient(135deg, #0b0f19, #141828);
  color: white;
  padding: 80px 20px;
  text-align: center;
  overflow: hidden;
  position: relative;
}

.section-title {
  font-size: 3rem;
  color: #00d4ff;
  margin-bottom: 50px;
  animation: slideDown 1s ease forwards;
  opacity: 0;
}

@keyframes slideDown {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

.panels-container {
  display: flex;
  justify-content: space-around;
  align-items: stretch;
  gap: 20px;
  flex-wrap: wrap;
}

.panel {
  flex: 1 1 300px;
  background: rgba(0,212,255,0.05);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 40px 20px;
  box-shadow: 0 10px 30px rgba(0,212,255,0.2);
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: transform 0.5s, box-shadow 0.5s;
}

.panel:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,212,255,0.4);
}

.panel .icon {
  font-size: 3rem;
  margin-bottom: 20px;
  color: #00d4ff;
}

.panel h3 {
  font-size: 1.8rem;
  margin-bottom: 15px;
}

.panel p {
  font-size: 1rem;
  line-height: 1.5;
  color: #c0eaff;
}

/* Subtle floating animation */
@keyframes floatPanels {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.panel {
  animation: floatPanels 6s ease-in-out infinite;
}

/* Responsive */
@media(max-width: 900px) {
  .panels-container { flex-direction: column; gap: 30px; }
  .section-title { font-size: 2.2rem; }
}
</style>







<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="popular-interviews">
  <h2 class="section-title">Popular Interviews</h2>
  <div class="carousel-wrapper">
    <div class="carousel">
      <?php
      $res = $conn->query("SELECT * FROM interviews WHERE status='active' ORDER BY created_at DESC");
      if($res && $res->num_rows){
        $interviews = [];
        while($r=$res->fetch_assoc()){
          $interviews[] = $r;
        }
        // Duplicate cards for smooth infinite loop
        $loopData = array_merge($interviews, $interviews);

        foreach($loopData as $r){
          $img = !empty($r['image']) ? $r['image'] : 'images/default.png';

          // Check if user is logged in
          if(isset($_SESSION['user'])){
            $btnStart = '<a href="take_interview.php?i='.$r['id'].'" class="btn-start">Start Interview</a>';
          } else {
            $btnStart = '<button class="btn-start" onclick="Swal.fire({
                            icon: \'warning\',
                            title: \'Login Required\',
                            text: \'Please sign up or log in to start the interview!\',
                            confirmButtonText: \'Go to Login\'
                          }).then((result) => {
                              if(result.isConfirmed){
                                window.location.href = \'login.php\';
                              }
                          });">Start Interview</button>';
          }

          echo '
          <div class="interview-card">
            <img src="'.$img.'" alt="'.htmlspecialchars($r['title']).'">
            <h3>'.htmlspecialchars($r['title']).'</h3>
            <p>'.(strlen($r['description'])>100 ? substr($r['description'],0,97).'...' : htmlspecialchars($r['description'])).'</p>
            <div class="meta">
              <span class="tag">'.htmlspecialchars($r['domain']).'</span>
              <span class="level '.strtolower($r['difficulty']).'">'.htmlspecialchars($r['difficulty']).'</span>
            </div>
            '.$btnStart.'
          </div>';
        }
      } else {
        echo '<p class="no-data">No interviews available yet.</p>';
      }
      ?>
    </div>
  </div>
</section>

<style>
/* --- Popular Interviews Carousel --- */
.popular-interviews {
  background: linear-gradient(135deg, #0a0f1e, #13182b);
  color: #fff;
  padding: 80px 20px;
  text-align: center;
  overflow: hidden;
}

.section-title {
  font-size: 3rem;
  color: #00d4ff;
  text-align: center;
  margin-bottom: 50px;
}

.carousel-wrapper {
  overflow: hidden;
  width: 100%;
}

.carousel {
  display: flex;
  gap: 30px;
  /* width: max-content; */
  animation: scrollInfinite 30s linear infinite;
}

/* Card */
.interview-card {
  flex: 0 0 330px;
  background: rgba(0, 212, 255, 0.05);
  border: 1px solid rgba(0, 212, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 30px 20px;
  text-align: center;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.interview-card img {
  width: 70px;
  height: 70px;
  object-fit: cover;
  margin-bottom: 15px;
  border-radius: 50%;
  box-shadow: 0 0 20px rgba(0,212,255,0.3);
}

.interview-card h3 {
  font-size: 1.4rem;
  margin-bottom: 10px;
  color: #e3f6ff;
}

.interview-card p {
  font-size: 0.95rem;
  color: #bfe8ff;
  line-height: 1.5;
  margin-bottom: 15px;
  min-height: 60px;
}

/* Tags */
.meta {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 20px;
}

.tag {
  background: rgba(0,212,255,0.1);
  padding: 6px 12px;
  border-radius: 20px;
  color: #00d4ff;
  font-size: 0.85rem;
}

.level {
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 600;
  text-transform: uppercase;
}
.level.easy { background: rgba(34,197,94,0.1); color: #8ef0a7; }
.level.medium { background: rgba(250,204,21,0.1); color: #ffed9a; }
.level.hard { background: rgba(239,68,68,0.1); color: #ffb0b0; }

/* Button */
.btn-start {
  text-decoration: none;
  padding: 12px 25px;
  background: linear-gradient(135deg, #00d4ff, #007bff);
  color: white;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-start:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(0,212,255,0.6);
}

/* Infinite Animation */
@keyframes scrollInfinite {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* Responsive */
@media (max-width: 900px) {
  .interview-card { flex: 0 0 80%; }
  .section-title { font-size: 2.2rem; }
}
</style>




<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->



<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->


<!-- Modern Features Section -->
<section class="features-modern">
  <h2 class="section-title">Platform Features</h2>
  <div class="features-wrapper">
    <div class="feature-card">
      <div class="icon">🎯</div>
      <h3>Targeted Interviews</h3>
      <p>Mock interviews tailored to your skills & desired job roles.</p>
    </div>
    <div class="feature-card">
      <div class="icon">⏱️</div>
      <h3>Anytime, Anywhere</h3>
      <p>Practice interviews on any device, flexible scheduling.</p>
    </div>
    <div class="feature-card">
      <div class="icon">📊</div>
      <h3>Instant Feedback</h3>
      <p>Get real-time feedback and scores to track progress.</p>
    </div>
    <div class="feature-card">
      <div class="icon">💡</div>
      <h3>Realistic Scenarios</h3>
      <p>Experience interview scenarios to simulate real interviews.</p>
    </div>
    <div class="feature-card">
      <div class="icon">📈</div>
      <h3>Progress Tracking</h3>
      <p>Monitor growth and focus on improvement areas.</p>
    </div>
    <div class="feature-card">
      <div class="icon">🧑‍💻</div>
      <h3>Wide Topic Coverage</h3>
      <p>Practice interviews across multiple domains & technologies.</p>
    </div>
  </div>
</section>

<style>
/* Modern Features Section */
.features-modern {
  width: 100%;
  padding: 100px 20px;
  background: #0b0f19;
  color: white;
  overflow: hidden;
  position: relative;
}

.section-title {
  text-align: center;
  font-size: 3rem;
  color: #00d4ff;
  margin-bottom: 60px;
}

.features-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  position: relative;
}

.feature-card {
  position: relative;
  background: linear-gradient(135deg, #00d4ff, #007bff);
  padding: 25px 20px;
  border-radius: 20px;
  width: 250px;
  text-align: center;
  transition: transform 0.4s, box-shadow 0.4s;
  cursor: pointer;
  color: white;
  animation: floatCard 6s ease-in-out infinite;
}

.feature-card:hover {
  transform: translateY(-15px) scale(1.05);
  box-shadow: 0 15px 40px rgba(0,212,255,0.5);
}

.feature-card .icon {
  font-size: 2.5rem;
  margin-bottom: 15px;
}

.feature-card h3 {
  font-size: 1.3rem;
  margin-bottom: 10px;
}

.feature-card p {
  font-size: 0.95rem;
  line-height: 1.5;
}

/* Floating animation */
@keyframes floatCard {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Connecting lines using pseudo-elements */
.features-wrapper .feature-card:nth-child(odd)::after {
  content: "";
  position: absolute;
  width: 60px;
  height: 2px;
  background: rgba(255,255,255,0.2);
  top: 50%;
  right: -70px;
  transform: rotate(10deg);
}

.features-wrapper .feature-card:nth-child(even)::after {
  content: "";
  position: absolute;
  width: 60px;
  height: 2px;
  background: rgba(255,255,255,0.2);
  top: 50%;
  left: -70px;
  transform: rotate(-10deg);
}

/* Responsive */
@media(max-width:900px){
  .section-title { font-size:2.2rem; }
  .feature-card { width: 90%; margin: 10px auto; }
  .features-wrapper .feature-card::after { display:none; }
}
</style>


<!-- Interview Topics Carousel with Content -->
<!-- <section class="interview-topics-carousel">
  <h2 class="section-title">Interview Topics</h2>
  <div class="carousel-wrapper">
    <div class="carousel">
     
      <div class="topic-card">
        <img src="images/java.png" alt="Java">
        <h3>Java</h3>
        <p>Master OOP concepts, collections, multithreading, and prepare for core Java interviews.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
   
      <div class="topic-card">
        <img src="images/frontend.png" alt="Frontend">
        <h3>Frontend</h3>
        <p>Learn HTML, CSS, JS, and build responsive UI to ace frontend interviews.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
      
      <div class="topic-card">
        <img src="images/react.png" alt="React">
        <h3>React</h3>
        <p>Understand components, hooks, state management, and real project-based problems.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
     
      <div class="topic-card">
        <img src="images/python.png" alt="Python">
        <h3>Python</h3>
        <p>Practice Python basics, data handling, libraries, and common coding challenges.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
     
      <div class="topic-card">
        <img src="images/ai.png" alt="AI/ML">
        <h3>AI/ML</h3>
        <p>Work on algorithms, models, and interview questions to build your AI/ML skills.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
  
      <div class="topic-card">
        <img src="images/ds.png" alt="Data Structures">
        <h3>Data Structures</h3>
        <p>Strengthen problem-solving with arrays, trees, graphs, and algorithm patterns.</p>
        <a href="#" class="btn-topic">Start Preparing</a>
      </div>
    </div>
  </div>
</section> -->

<style>
/* Interview Topics Carousel with Content */
.interview-topics-carousel {
  background: linear-gradient(135deg, #0b0f19, #141828);
  color: white;
  padding: 80px 20px;
  overflow: hidden;
}

.section-title {
  font-size: 3rem;
  color: #00d4ff;
  text-align: center;
  margin-bottom: 50px;
}

.carousel-wrapper {
  overflow: hidden;
  width: 100%;
}

.carousel {
  display: flex;
  gap: 30px;
  transition: transform 0.5s ease;
}

/* Topic Card */
.topic-card {
  flex: 0 0 calc(33.333% - 20px);
  background: rgba(0,212,255,0.05);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  padding: 30px 20px;
  text-align: center;
  transition: transform 0.5s, box-shadow 0.5s;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 26px;
}

.topic-card img {
  width: 60px;
  margin-bottom: 15px;
}

.topic-card h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.topic-card p {
  font-size: 0.95rem;
  line-height: 1.4;
  color: #c0eaff;
  margin-bottom: 20px;
}

.btn-topic {
  /* text-decoration: none; */
  padding: 12px 25px;
  background: linear-gradient(135deg, #00d4ff, #007bff);
  color: white;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s;
}

.btn-topic:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(0,212,255,0.6);
}

.topic-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0,212,255,0.4);
}

/* Responsive */
@media(max-width: 900px) {
  .topic-card { flex: 0 0 80%; }
  .section-title { font-size: 2.2rem; }
}
</style>

<script>
// Auto Slide Carousel
const carousel = document.querySelector('.carousel');
const cards = document.querySelectorAll('.topic-card');
let index = 0;
const cardWidth = cards[0].offsetWidth + 30; // width + gap
const totalCards = cards.length;

function slideCarousel() {
  index++;
  if(index > totalCards - 3) { // reset to start
    carousel.style.transition = 'none';
    carousel.style.transform = `translateX(0px)`;
    index = 1;
    setTimeout(() => {
      carousel.style.transition = 'transform 0.5s ease';
      carousel.style.transform = `translateX(-${cardWidth * index}px)`;
    }, 50);
  } else {
    carousel.style.transform = `translateX(-${cardWidth * index}px)`;
  }
}

setInterval(slideCarousel, 5000); // slide every 5 sec
</script>



<section class="about-us-3d">
  <h2 class="section-title">About Us</h2>
  <div class="cards-container">
    <div class="card">
      <div class="card-inner">
        <div class="card-front">
          <h3>Our Mission</h3>
        </div>
        <div class="card-back">
          <p>To empower job seekers with realistic interview simulations and instant feedback, helping them succeed in their careers.</p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-inner">
        <div class="card-front">
          <h3>Our Vision</h3>
        </div>
        <div class="card-back">
          <p>To be the ultimate platform for interview preparation, bridging learning and real-world success seamlessly.</p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-inner">
        <div class="card-front">
          <h3>Why Choose Us?</h3>
        </div>
        <div class="card-back">
          <p>Interactive sessions, performance tracking, and tailored feedback make preparation engaging and effective.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* About Us 3D Flip Cards */
.about-us-3d {
  background: linear-gradient(135deg, #0b0f19, #141828);
  color: white;
  padding: 80px 20px;
  text-align: center;
  perspective: 1500px;
}

.section-title {
  font-size: 2.8rem;
  color: #00d4ff;
  margin-bottom: 50px;
  animation: slideDown 1s ease forwards;
  opacity: 0;
}

@keyframes slideDown {
  to { opacity: 1; transform: translateY(0); }
  from { opacity: 0; transform: translateY(-30px); }
}

.cards-container {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
}

.card {
  width: 300px;
  height: 250px;
  perspective: 1000px;
}

.card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transition: transform 1s;
  transform-style: preserve-3d;
}

.card:hover .card-inner {
  transform: rotateY(180deg);
}

.card-front, .card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 20px;
  backface-visibility: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  box-shadow: 0 10px 30px rgba(0,212,255,0.2);
}

.card-front {
  background: linear-gradient(135deg, #007bff, #00d4ff);
}

.card-front h3 {
  font-size: 1.8rem;
  color: white;
}

.card-back {
  background: rgba(0, 212, 255, 0.1);
  color: #00d4ff;
  transform: rotateY(180deg);
}

.card-back p {
  font-size: 1rem;
  line-height: 1.5;
}

/* Responsive */
@media (max-width: 900px) {
  .cards-container {
    flex-direction: column;
    gap: 30px;
    align-items: center;
  }
}


</style>





<!-- FAQ Section Start -->
<section class="faq-section">
  <h2 class="section-title">Frequently Asked Questions</h2>
  <div class="faq-container">

    <div class="faq-item">
      <div class="faq-question">How do I sign up?</div>
      <div class="faq-answer">
        <p>You can sign up by clicking the Sign Up button in the header. Fill out the form and verify your email to start practicing interviews.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Are the interviews real-time?</div>
      <div class="faq-answer">
        <p>Our platform provides realistic interview simulations. You can practice anytime and receive instant feedback on your performance.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Can I track my progress?</div>
      <div class="faq-answer">
        <p>Yes! The platform tracks your scores and provides insights to help you improve your skills over time.</p>
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Do I need to pay for access?</div>
      <div class="faq-answer">
        <p>We offer both free and premium plans. The free plan gives you access to basic interview questions, while the premium plan unlocks advanced features.</p>
      </div>
    </div>

    <div style="text-align: center; color: #aaddff; font-weight: 800;"><a href="faq.php">View More</a></div>

  </div>
</section>

<style>
/* FAQ Section */
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
}

.faq-container {
  max-width: 900px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 20px;
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
}

.faq-question::after {
  content: '+';
  position: absolute;
  right: 25px;
  font-size: 1.5rem;
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
}

.faq-item.active .faq-answer {
  padding: 15px 25px;
  max-height: 300px; /* adjust according to content */
}

.faq-answer p {
  font-size: 1rem;
  line-height: 1.6;
  color: #c0eaff;
}

/* Hover Glow */
.faq-item:hover {
  box-shadow: 0 0 20px rgba(0,212,255,0.3);
  transform: translateY(-2px);
}

/* Responsive */
@media(max-width: 900px){
  .faq-section .section-title { font-size:2.2rem; }
  .faq-question { font-size:1.1rem; }
  .faq-answer p { font-size:0.95rem; }
}
</style>

<script>
// FAQ Toggle Functionality
const faqs = document.querySelectorAll('.faq-item');
faqs.forEach(faq => {
  faq.addEventListener('click', () => {
    faq.classList.toggle('active');
  });
});
</script>
<!-- FAQ Section End -->

<?php include 'footer.php'; ?>