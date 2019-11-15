<?php
include_once '../includes/header.php';

if ($isAdmin) {
  ?>

  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <p class="h4 my-1 text-center">Registre un <strong>Enfermero</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } else include_once 'templates/instAdmin.html';
include_once '../includes/footer.php';
?>