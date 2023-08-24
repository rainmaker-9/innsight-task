<nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue">
  <div class="container py-3">
    <a class="navbar-brand" href="/">INNSight</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-nav-menu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">
            <i class="fa-solid fa-home me-1"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-users me-1"></i>
            <span>Users</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="usersDropdown">
            <li>
              <a class="dropdown-item" href="/users">
                <i class="fa-solid fa-list fa-fw me-1"></i>
                <span>List</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/users/add">
                <i class="fa-solid fa-user-plus fa-fw me-1"></i>
                <span>Add</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasMenuLabel">Main Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="list-group list-group-flush">
      <a href="/" class="list-group-item list-group-item-action">
        <i class="fa-solid fa-home fa-fw me-1"></i>
        <span>Home</span>
      </a>
      <a href="/users" class="list-group-item list-group-item-action">
        <i class="fa-solid fa-list fa-fw me-1"></i>
        <span>Users List</span>
      </a>
      <a href="/users/add" class="list-group-item list-group-item-action">
        <i class="fa-solid fa-user-plus fa-fw me-1"></i>
        <span>Add User</span>
      </a>
    </div>
  </div>
</div>