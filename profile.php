<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<?php
include 'header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'candidate'){
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user']['id'];

// Fetch profile
$profile = $conn->query("SELECT * FROM candidate_profile WHERE user_id = $user_id")->fetch_assoc();

// If profile not exists, pre-fill from users table
if(!$profile){
    $user = $conn->query("SELECT name, email FROM users WHERE id = $user_id")->fetch_assoc();
    $profile = [
        'fullname' => $user['name'] ?? '',
        'email' => $user['email'] ?? '',
        'mobile' => '',
        'dob' => '',
        'gender' => '',
        'address' => '',
        'city' => '',
        'state' => '',
        'country' => '',
        'skills' => '',
        'education' => '',
        'experience' => ''
    ];
}

// Handle form submission
if(isset($_POST['save_profile'])){
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $country = $conn->real_escape_string($_POST['country']);
    $skills = $conn->real_escape_string($_POST['skills']);
    $education = $conn->real_escape_string($_POST['education']);
    $experience = $conn->real_escape_string($_POST['experience']);

    if($conn->query("SELECT id FROM candidate_profile WHERE user_id=$user_id")->num_rows > 0){
        // Update
        $conn->query("UPDATE candidate_profile SET 
            fullname='$fullname',
            email='$email',
            mobile='$mobile',
            dob='$dob',
            gender='$gender',
            address='$address',
            city='$city',
            state='$state',
            country='$country',
            skills='$skills',
            education='$education',
            experience='$experience',
            updated_at=NOW()
            WHERE user_id=$user_id
        ");
    } else {
        // Insert
        $conn->query("INSERT INTO candidate_profile 
            (user_id, fullname, email, mobile, dob, gender, address, city, state, country, skills, education, experience)
            VALUES 
            ($user_id, '$fullname', '$email', '$mobile', '$dob', '$gender', '$address', '$city', '$state', '$country', '$skills', '$education', '$experience')
        ");
    }
    ?>
    <!-- SweetAlert2 Success -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Profile Saved!',
        text: 'Your profile has been saved successfully.',
        confirmButtonColor: '#007bff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'profile.php';
        }
    });
    </script>
    <?php
}
?>

<div class="dashboard-container">

  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="card">
      <div class="profile-header">
        <h1><i class="fa fa-user-circle"></i> My Profile</h1>
      </div>
      <form method="POST">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="fullname" class="form-control" value="<?php echo $profile['fullname']; ?>" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $profile['email']; ?>" required>
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" name="mobile" class="form-control" value="<?php echo $profile['mobile']; ?>" required>
        </div>
        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" class="form-control" value="<?php echo $profile['dob']; ?>">
        </div>
        <div class="form-group">
          <label>Gender</label>
          <select name="gender" class="form-control">
            <option value="">Select Gender</option>
            <option value="Male" <?php if($profile['gender']=='Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($profile['gender']=='Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if($profile['gender']=='Other') echo 'selected'; ?>>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea name="address" class="form-control"><?php echo $profile['address']; ?></textarea>
        </div>
        <div class="form-group">
          <label>City</label>
          <input type="text" name="city" class="form-control" value="<?php echo $profile['city']; ?>">
        </div>
        <div class="form-group">
          <label>State</label>
          <input type="text" name="state" class="form-control" value="<?php echo $profile['state']; ?>">
        </div>
        <div class="form-group">
          <label>Country</label>
          <input type="text" name="country" class="form-control" value="<?php echo $profile['country']; ?>">
        </div>
        <div class="form-group">
          <label>Skills</label>
          <textarea name="skills" class="form-control"><?php echo $profile['skills']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Education</label>
          <textarea name="education" class="form-control"><?php echo $profile['education']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Experience</label>
          <textarea name="experience" class="form-control"><?php echo $profile['experience']; ?></textarea>
        </div>
        <button type="submit" name="save_profile" class="btn-action">Save Profile</button>
      </form>
    </div>
  </main>
</div>

<style>
.profile-header {
  text-align: center;
  margin-bottom: 30px;
}
.profile-header h1 {
  font-size: 32px;
  color: #00d4ff;
  position: relative;
  display: inline-block;
  font-weight: 700;
}
.profile-header h1 i {
  margin-right: 10px;
}
.profile-header h1::after {
  content: '';
  display: block;
  width: 113%;
  height: 4px;
  background: linear-gradient(to right, #00d4ff, #007bff);
  margin: 10px auto 0;
  border-radius: 2px;
}
.dashboard-container {
  display: flex;
  min-height: 100vh;
  background: #0f111a;
  font-family: 'Poppins', sans-serif;
}
.main-content {
  flex-grow: 1;
  padding: 40px;
}
.card {
  background: linear-gradient(145deg,#1e1e2f,#27293d);
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
  color: #fff;
}
.form-group {
  margin-bottom: 20px;
}
.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
}
.form-control {
  width: 100%;
  padding: 12px 15px;
  border-radius: 10px;
  border: none;
  outline: none;
  font-size: 14px;
}
textarea.form-control {
  min-height: 70px;
}
.btn-action {
  background: #00d4ff;
  color: #1a1f36;
  padding: 12px 25px;
  border-radius: 12px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
}
.btn-action:hover {
  background: #007bff;
  color: #fff;
}
@media (max-width: 900px){
  .dashboard-container{
    flex-direction: column;
  }
  .main-content{padding:20px;}
}
</style>

<?php include 'footer.php'; ?>
