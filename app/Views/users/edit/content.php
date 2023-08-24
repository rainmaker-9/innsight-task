<div class="container py-3 py-md-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-0 shadow">
        <div class="card-header bg-transparent">
          <h5 class="card-title my-2 fs-4">Edit user</h5>
        </div>
        <div class="card-body">
          <form id="FrmEditUser">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control text-alphabets" id="username" name="username" placeholder="Enter your name" maxlength="255" value="<?= $user->name ?>" required />
                  <label for="name">Name</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="email" class="form-control text-email" id="email" name="email" placeholder="Enter your email address" maxlength="255" value="<?= $user->email ?>" required />
                  <label for="email">Email address</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control text-numeric" inputmode="numeric" id="mobile" name="mobile" placeholder="Enter your mobile number" minlength="10" maxlength="10" value="<?= $user->mobile ?>" required />
                  <label for="mobile">Mobile</label>
                </div>
              </div>
              <div class="col-12">
                <label class="mb-2" for="gender">Gender</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="M" <?php if ($user->gender === 'M') {
                                                                                                      echo "checked";
                                                                                                    } ?> required />
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="F" <?php if ($user->gender === 'F') {
                                                                                                        echo "checked";
                                                                                                      } ?> />
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <select class="form-select form-select-lg fs-6" aria-label="State select" id="state" name="state" required>
                  <option disabled value="">Select State</option>
                  <?php foreach ($states as $state) : ?>
                    <?php if ($user->state === $state) : ?>
                      <option value="<?= $state ?>" selected><?= $state ?></option>
                    <?php else : ?>
                      <option value="<?= $state ?>"><?= $state ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <input type="hidden" name="userid" value="<?= $user->id ?>">
              <div class="col-12 text-center">
                <button class="btn btn-success btn-lg rounded-1">
                  <i class="fa-solid fa-save me-1"></i>
                  <span>Save</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>