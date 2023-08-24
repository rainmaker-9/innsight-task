<div class="container py-3 py-md-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-0 shadow">
        <div class="card-header bg-transparent">
          <h5 class="card-title my-2 fs-4">Create a new user</h5>
        </div>
        <div class="card-body">
          <form id="FrmAddUser">
            <div class="row g-3">
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control text-alphabets" id="username" name="username" placeholder="Enter your name" maxlength="255" required />
                  <label for="name">Name</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="email" class="form-control text-email" id="email" name="email" placeholder="Enter your email address" maxlength="255" required />
                  <label for="email">Email address</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <input type="text" class="form-control text-numeric" inputmode="numeric" id="mobile" name="mobile" placeholder="Enter your mobile number" minlength="10" maxlength="10" required />
                  <label for="mobile">Mobile</label>
                </div>
              </div>
              <div class="col-12">
                <label class="mb-2" for="gender">Gender</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="male" name="gender" value="M" required />
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="female" name="gender" value="F" />
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <select class="form-select form-select-lg fs-6" aria-label="State select" id="state" name="state" required>
                  <option selcted value="">Select State</option>
                  <?php foreach ($states as $state) : ?>
                    <option value="<?= $state ?>"><?= $state ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-12 text-center">
                <button class="btn btn-success btn-lg rounded-1">
                  <i class="fa-solid fa-plus me-1"></i>
                  <span>Add</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>