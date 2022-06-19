<?php include_once('./inc/header.php') ?>

<?php 
  $sql = 'SELECT * FROM feedbacks';
  $result = mysqli_query($connection, $sql);
  $feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<main>
  <div class="container d-flex flex-column align-items-center">
   
    <h2>Feedback</h2>

    <?php if(empty($feedbacks)): ?>
      <p class="lead mt-3">There is no feedback</p>
    <?php else: ?>
      <?php foreach($feedbacks as $item): ?>
        <div class="card my-3 w-75">
          <div class="card-body text-center">
            <?php echo $item['body'] ?>
            <div class="text-secondary mt-2">
              By <?php echo $item['name'] ?> on <?php echo $item['date'] ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php endif ?>
</main>

<?php include_once('./inc/footer.php') ?>

