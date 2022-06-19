<?php include_once('inc/header.php') ?>

<?php 
  $name = $email = $body = '';
  $name_error = $email_error = $body_error = '';

  // form submit
  if(isset($_POST['submit'])){
    // validate name
    if(empty($_POST['name'])){
      $name_error = 'name is required';
    } else{
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // validate email
    if(empty($_POST['email'])){
      $email_error = 'email is required';
    } else{
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    // validate body
    if(empty($_POST['body'])){
      $body_error = 'body is required';
    } else{
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
  }

  if(empty($name_error) && empty($email_error) && empty($body_error) && !empty($_POST['submit'])){
    $sql = "INSERT INTO feedbacks (name, email, body) VALUES ('$name', '$email', '$body')";
    if(mysqli_query($connection, $sql)){
      // success
      header('Location: feedback.php');
    } else{
      echo 'Error' . mysqli_error($connection);
    }
  }
?>

<main>
  <div class="container d-flex flex-column align-items-center">
    <img src="./img/logo.png" class="w-25 mb-3" alt="" style="max-width: 150px">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
    <form 
      class="mt-4 w-75"
      action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
      method="POST"
    >
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          placeholder="Enter your name"
          class="form-control <?php echo $name_error ? 'is-invalid' : null ?>" 
        />
        <?php if(!empty($name_error)): ?>
          <div class="invalid-feedback"><?php echo $name_error ?></div>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter your email"
          class="form-control <?php echo $email_error ? 'is-invalid' : null ?>" 
        />
        <?php if(!empty($email_error)): ?>
          <div class="invalid-feedback"><?php echo $email_error ?></div>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea 
          id="body" 
          name="body" 
          placeholder="Enter your feedback"
          class="form-control <?php echo $body_error ? 'is-invalid' : null ?>" 
        ></textarea>
        <?php if(!empty($body_error)): ?>
          <div class="invalid-feedback"><?php echo $body_error ?></div>
        <?php endif ?>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    </div>
</main>

<?php include_once('inc/footer.php') ?>
