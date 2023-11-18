<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\AuthAd;

$table = new UsersTable(new MySQL());
$all = $table->getCat();

$auth = AuthAd::check();
?>
<?php include ('header.php'); ?>
 
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Category  List</h2>

              <?php if ( isset($_GET['catadd']) ) : ?>
                    <div class="alert alert-info">
                    Category Add Success!
                    </div>
                <?php endif ?>
                <?php if ( isset($_GET['catDelete']) ) : ?>
                    <div class="alert alert-danger">
                    Category Deleted!
                    </div>
                <?php endif ?>
              
            </div>
          </div>
          <div class="col-md-12">
          <a href="categories_add.php" class="btn btn-primary mb-3">+ Add New Category</a>
            <div class="contact-form">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NAME</th>
                  <th scope="col">DESC.</th>
                  <th scope="col">CREATED_AT</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $i = 1; ?>
                <?php  foreach($all as $cat) : ?>
                  <td><?= $i ?></td>
                  <td><?= $cat->name ?></td>
                  <td><?= $cat->description ?></td>                
                  <td><?= $cat->created_at ?></td>
                  <td class="btn-group">
                  <a href="#" type="button" class="btn btn-warning"> <i class="fa fa-cog" aria-hidden="true"></i></a>
                  <a href="../_actions/cat_delete.php?id=<?= $cat->cat_id ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure! You want to delete this category( <?= $cat->name ?> )!')">
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
