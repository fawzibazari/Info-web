  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
    <div class="row active" style="border: 1px solid #fff; background-color: #ced4da;">
      <div class="col-md-4">
        <h5>Services</h5>
        <p>News-letter</p>
        <?require'newsletter.php';?>
    
      </div>
      <div class="col-md-4">
        <h5>Contact</h5>

      </div>
      <div class="col-md-4">
      <h5>Navigation</h5>
      <ul class="list-unstyled text-small">
         <?php
         include_once "./function.php";
          //  nav_menu("list-group-item");
         ?>
      </ul>
      </div>
    </div>
    <?php// require_once './data/data.php'; ajouter_vue() ?>

      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</body>

</html>
