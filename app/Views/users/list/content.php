<div class="container py-3 py-md-5">
  <div class="row g-3">
    <div class="col-12">
      <?php

      use CodeIgniter\I18n\Time;

      if (!empty($users)) : ?>
        <div class="card border-0 shadow">
          <div class="card-header bg-transparent">
            <h5 class="card-title my-2 fs-4">Users</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th>Added On</th>
                    <th>Updated On</th>
                  </tr>
                <tbody>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td>
                        <a title="Edit User" data-bs-toggle="tooltip" class="link-info text-decoration-none mx-1" href="/users/edit/<?= $user->id ?>">
                          <i class="fa-solid fa-user-pen"></i>
                        </a>
                        <a title="Delete User" data-bs-toggle="tooltip" class="link-danger text-decoration-none mx-1 btn-delete" href="#" data-userid="<?= $user->id ?>">
                          <i class="fa-solid fa-user-xmark"></i>
                        </a>
                      </td>
                      <td><?= $user->id ?></td>
                      <td><?= $user->name ?></td>
                      <td><?= $user->email ?></td>
                      <td><?= $user->mobile ?></td>
                      <td><?= $user->gender === "M" ? "Male" : "Female" ?></td>
                      <td><?= $user->state ?></td>
                      <td>
                        <?php
                        $time = Time::createFromTimestamp(strtotime($user->add_date), app_timezone(), 'en_IN');
                        echo $time->toLocalizedString('d-MM-Y hh:mm aa');
                        ?>
                      </td>
                      <td>
                        <?php
                        $time = Time::createFromTimestamp(strtotime($user->update_date), app_timezone(), 'en_IN');
                        echo $time->toLocalizedString('d-MM-Y hh:mm aa');
                        ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                </thead>
              </table>
            </div>
          </div>
          <div class="card-footer bg-transparent py-3">
            <?php
            if (count($users) > 0) {
              $pager->links();
            }
            ?>
          </div>
        </div>
      <?php else : ?>
        <h4 class="text-center text-danger fw-bold">No data found</h4>
      <?php endif ?>
    </div>
  </div>
</div>