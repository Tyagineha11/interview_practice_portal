<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];
  $role = 'candidate';

  if(strlen($password) < 6){
    echo "<script>
      Swal.fire({
        icon: 'warning',
        title: 'Weak Password!',
        text: 'Password must be at least 6 characters long.'
      });
    </script>";
  } else {
    $pass = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0){
      echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Email Already Registered!',
          text: 'Please try with another email.'
        });
      </script>";
    } else {
      $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
      $stmt->bind_param('ssss',$name,$email,$pass,$role);
      if($stmt->execute()){
        echo "<script>
          Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: 'Redirecting to login page...',
            timer: 2000,
            showConfirmButton: false
          }).then(() => { window.location.href='login.php'; });
        </script>";
      } else {
        echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Something went wrong. Please try again.'
          });
        </script>";
      }
    }
  }
}
?>

<div class="signup-container">
  <div class="signup-card">
    <h3>Create Account</h3>
    <form method="post" id="signupForm" onsubmit="return validateForm()">
      <div class="form-group">
        <label><i class="fa-solid fa-user"></i> Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group password-group">
        <label><i class="fa-solid fa-lock"></i> Password</label>
        <input type="password" name="password" id="password" placeholder="Create a password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>
      <button type="submit"><i class="fa-solid fa-user-plus"></i> Sign Up</button>
      <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
</div>

<style>
/* Signup Container */
.signup-container {
  min-height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: radial-gradient(circle at top left, #0a0f1d, #12192d, #000);
  padding: 40px 20px;
  animation: gradientShift 10s infinite alternate;
}

@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}

/* Signup Card */
.signup-card {
  background: rgba(0, 212, 255, 0.1);
  backdrop-filter: blur(15px);
  border-radius: 20px;
  padding: 50px 30px;
  width: 420px;
  max-width: 95%;
  text-align: center;
  transition: transform 0.4s, box-shadow 0.4s;
  /* box-shadow: 0 0 30px rgba(0,212,255,0.3); */
}

.signup-card:hover {
  transform: translateY(-8px);
  /* box-shadow: 0 0 40px rgba(0,212,255,0.5); */
}

.signup-card h3 {
  color: #00d4ff;
  font-size: 2rem;
  margin-bottom: 30px;
  letter-spacing: 1px;
}

/* Form */
.form-group {
  display: flex;
  flex-direction: column;
  text-align: left;
  margin-bottom: 20px;
  position: relative;
}

.form-group label {
  margin-bottom: 8px;
  color: #c0eaff;
  font-weight: 500;
  font-size: 0.95rem;
}

.form-group input {
  padding: 12px 40px 12px 15px;
  border-radius: 12px;
  border: none;
  outline: none;
  background: rgba(255,255,255,0.08);
  color: white;
  font-size: 1rem;
  transition: background 0.3s, box-shadow 0.3s;
}

.form-group input:focus {
  background: rgba(0,212,255,0.15);
  box-shadow: 0 0 10px rgba(0,212,255,0.5);
}

/* Eye Icon */
.password-group .toggle-password {
  position: absolute;
  right: 15px;
  top: 45px;
  cursor: pointer;
  color: #00d4ff;
  font-size: 1.1rem;
}

/* Button */
button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 50px;
  background: linear-gradient(135deg,#00d4ff,#007bff);
  color: white;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
}

button:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(0,212,255,0.6);
}

/* Link */
.login-link {
  margin-top: 20px;
  color: #c0eaff;
  font-size: 0.95rem;
}

.login-link a {
  color: #00d4ff;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s;
}

.login-link a:hover {
  color: #007bff;
}

@media(max-width: 500px){
  .signup-card { padding: 40px 20px; }
  .signup-card h3 { font-size: 1.6rem; }
}
</style>

<script>
// Toggle password visibility
function togglePassword(){
  const pwd = document.getElementById('password');
  const icon = document.querySelector('.toggle-password');
  if(pwd.type === 'password'){
    pwd.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    pwd.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}

// Client-side validation
function validateForm(){
  const name = document.querySelector('input[name="name"]').value.trim();
  const email = document.querySelector('input[name="email"]').value.trim();
  const pass = document.getElementById('password').value.trim();

  if(name === '' || email === '' || pass === ''){
    Swal.fire({
      icon: 'warning',
      title: 'All fields are required!',
      text: 'Please fill in all details.'
    });
    return false;
  }
  if(pass.length < 6){
    Swal.fire({
      icon: 'warning',
      title: 'Weak Password!',
      text: 'Password must be at least 6 characters long.'
    });
    return false;
  }
  return true;
}
</script>

<?php include 'footer.php'; ?>
