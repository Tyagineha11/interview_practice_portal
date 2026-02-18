<!-- Footer Start -->


<footer class="footer">
  <div class="footer-container">
    
    <!-- About -->
    <div class="footer-section about">
      <h3>Interview Portal</h3>
      <p>Empowering job seekers with realistic interview simulations, instant feedback, and skill growth opportunities.</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-section links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><a href="feature.php">Features</a></li>
        <li><a href="faq.php">FAQs</a></li>
        <!-- <li><a href="#">Feedback</a></li> -->
      </ul>
    </div>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Contact -->
    <div class="footer-section contact">
  <h3>Contact</h3>
  <p>Email: support@interviewportal.com</p>
  <p>Phone: +91 9876543210</p>

  <div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
</div>

  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Interview Portal. All Rights Reserved.</p>
  </div>
</footer>

<style>

  .social-icons a {
  color: #fff;      /* icon color */
  margin-right: 12px;
  font-size: 22px;
  text-decoration: none;
  transition: 0.3s;
}

.social-icons a:hover {
  color: #00aced;   /* icon hover color */
}
/* Footer */
.footer {
  background: linear-gradient(135deg,#0b0f19,#141828);
  color: white;
  padding: 60px 20px 30px;
  position: relative;
  overflow: hidden;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
}

.footer-section {
  flex: 1 1 250px;
}

.footer-section h3 {
  font-size: 1.5rem;
  color: #00d4ff;
  margin-bottom: 20px;
}

.footer-section p, 
.footer-section li, 
.footer-section a {
  font-size: 1rem;
  color: #c0eaff;
  line-height: 1.8;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-section a:hover {
  color: #00d4ff;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section li {
  margin-bottom: 10px;
}

/* Social Icons */
.social-icons {
  margin-top: 15px;
  display: flex;
  gap: 15px;
}

.social-icons a img {
  width: 28px;
  transition: transform 0.3s, filter 0.3s;
}

.social-icons a:hover img {
  transform: scale(1.2);
  filter: drop-shadow(0 0 5px #00d4ff);
}

/* Footer Bottom */
.footer-bottom {
  text-align: center;
  margin-top: 40px;
  border-top: 1px solid rgba(255,255,255,0.1);
  padding-top: 20px;
  font-size: 0.9rem;
  color: #a0cfff;
}

/* Footer Hover Glow */
.footer-section:hover {
  transform: translateY(-3px);
  transition: 0.3s ease;
}

/* Responsive */
@media(max-width: 900px){
  .footer-container {
    flex-direction: column;
    gap: 30px;
    text-align: center;
  }
  .footer-section h3 { font-size: 1.3rem; }
  .footer-section p, .footer-section li, .footer-section a { font-size: 0.95rem; }
}
</style>
