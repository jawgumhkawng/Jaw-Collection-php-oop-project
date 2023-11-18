<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\AuthAd;

$table = new UsersTable(new MySQL());
$all = $table->getPrd();

$auth = AuthAd::check();
?>
<?php include ('header.php'); ?>
 
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Products List</h2>

              <?php if ( isset($_GET['prdadd']) ) : ?>
                    <div class="alert alert-info">
                    Product Add Success!
                    </div>
                <?php endif ?>

              <?php if ( isset($_GET['prdDelete']) ) : ?>
                    <div class="alert alert-danger">
                    Product Deleted!
                    </div>
                <?php endif ?>
              
            </div>
          </div>
          <div class="col-md-12">
          <a href="products_add.php" class="btn btn-primary mb-3">+ Add Product</a>
            <div class="contact-form">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">NAME</th>
                  <th scope="col">DESC.</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col">QUANTITY</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">CREATED_AT</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $i = 1; ?>
                <?php  foreach($all as $prd) : ?>
                  <td><?= $i ?></td>
                  <td><img src="../_actions/photos/<?= $prd->image ?>" width="35px" height="35px" class="rounded-circle shadow-lg " style="border: 1px solid gray; bottom:10px"></td>
                  <td><?= $prd->name ?></td>
                  <td><?= $prd->description ?></td>
                  <td><?= $prd->category ?></td>
                  <td><?= $prd->quantity ?></td>
                  <td><?= $prd->price ?></td>
                  <td><?= $prd->created_at ?></td>
                  <td class="btn-group">
                  <a href="#" type="button" class="btn btn-warning"> <i class="fa fa-cog" aria-hidden="true"></i></a>
                  <a href="../_actions/prd_delete.php?id=<?= $prd->id ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure! You want to delete this product ( <?= $prd->name ?>  )!')">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>
                  
                </tr>
                <?php $i++; ?>
               <?php endforeach ?>
              </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="col-md-4">
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
          </div> -->
        </div>
      </div>
    </div>

    <?php include ('footer.php'); ?>
