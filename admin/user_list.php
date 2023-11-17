<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getUser();

$auth = Auth::check();
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

              <?php if ( isset($_GET['UserDelete']) ) : ?>
                    <div class="alert alert-danger">
                    User Deleted!
                    </div>
                <?php endif ?>
              <?php if ( isset($_GET['changeRole']) ) : ?>
                    <div class="alert alert-success">
                    Role Set Successfully!
                    </div>
                <?php endif ?>
              
            </div>
          </div>
          <div class="col-md-12">
          <a href="#" class="btn btn-primary mb-3">+ Add New User</a>
            <div class="contact-form">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">IMAGE</th>
                  <th scope="col">NAME</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">PHONE</th>
                  <th scope="col">ADDRESS</th>
                  <th scope="col">ROLE</th>
                  <th scope="col">CREATED_AT</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $i = 1; ?>
                <?php  foreach($all as $user) : ?>
                  <td><?= $i ?></td>
                  <td><img src="../profile/<?= $user->photo ?>" width="35px" height="35px" class="rounded-circle shadow-lg " style="border: 1px solid gray; bottom:10px"></td>
                  <td><?= $user->name ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->phone ?></td>
                  <td><?= $user->address ?></td>
                  <td>
                  <?php if($user->value == 2) : ?>
                        <span class="badge bg-secondary position-relative text-white"><?= $user->role ?></span>
                    <?php else : ?>
                        <span class="badge bg-success position-relative text-white"><?= $user->role ?></span>
                    <?php endif ?>
                  </td>   
                  <td><?= $user->created_at ?></td>
                  <td class="">
                  <div class="btn-group">
                    <div class="dropdown ">
                        <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                        Offset
                        </button>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item " href="../_actions/role.php?id=<?= $user->id ?>&role_id=1">Admin</a>
                        <a class="dropdown-item" href="../_actions/role.php?id=<?= $user->id ?>&role_id=2">User</a>
                        
                        </div>
                     </div>
                  
                  <a href="#" type="button" class="btn btn-warning"> <i class="fa fa-cog" aria-hidden="true"></i></a>
                  <a href="../_actions/delete_user.php?id=<?= $user->id ?>" type="button" class="btn btn-danger" onclick="return confirm('Are you sure! You want to delete this product ( <?= $user->name ?>  )!')">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
                  </div>
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
