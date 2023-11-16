<?php 
include('../vendor/autoload.php'); 

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;


$table = new UsersTable(new MySQL());

$prdId = $_GET['id'];

$products = $table->getPrdId($prdId);

$categories = $table->getCat();

$auth = Auth::check();

?>
<?php include ('header.php'); ?>


    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Edit Products</h2>
            </div>
          </div>
          <div class="col-md-8">
                  <?php if(isset($_GET['error'])) : ?>
                        <div class="alert alert-warning">
                            <h4>Cannot add product.Please try again!</h4>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_GET['Prderror'])) : ?>
                        <div class="alert alert-warning">
                            <h4>image must be png!!</h4>
                        </div>
                    <?php endif ?>

            <div class="contact-form">
              <form id="contact" action="../_actions/prd_edit.php" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <img src="../_actions/photos/<?= $products->image ?>" width="100px" height="100px" class="rounded-1 shadow-lg mb-3" style="border: 1px solid gray; bottom:10px">
                    <fieldset>
                      <input name="image" type="file" class="form-control" value="<?= $products->image ?>"  placeholder="Product Image" >
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" value="<?= $products->name ?>" placeholder="Name"  required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="description" type="text" class="form-control" value="<?= $products->description ?>" placeholder="Description"  required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <fieldset>
                      <label for="">category</label>
                    <select class="form-control" name="category_id" >
                    <!-- <option >Select Category</option> -->
                      <?php foreach ($categories as $category) : ?>
                        <?php if($products->category_id == $category->cat_id) : ?>
                          <option value="<?= $category->cat_id ?>" selected><?= $category->name ?></option>
                        <?php else : ?>
                          <option value="<?= $category->cat_id ?>"><?= $category->name ?></option>
                         <?php endif ?>
                        <?php endforeach ?>
                      </select>                    
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="quantity" type="number" class="form-control" value="<?= $products->quantity ?>"  placeholder="Quantity" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="price" type="number" class="form-control" value="<?= $products->price ?>" placeholder="Price" required="">
                    </fieldset>
                  </div>
               
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button float-right">Submit</button>
                      <a href="index.php" id="form-submit" class="filled-button bg-info">Back</a>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="accordion">
              <li>
                  <a>Accordion Title One</a>
                  <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                  </div>
              </li>
              <li>
                  <a>Second Title Here</a>
                  <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                  </div>
              </li>
              <li>
                  <a>Accordion Title Three</a>
                  <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                  </div>
              </li>
              <li>
                  <a>Fourth Accordion Title</a>
                  <div class="content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti elite.</p>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Happy Customers</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel">
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="1">
              </div>
              
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="2">
              </div>
              
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="3">
              </div>
              
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="4">
              </div>
              
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="5">
              </div>
              
              <div class="client-item">
                <img src="../assets/images/client-01.png" alt="6">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
