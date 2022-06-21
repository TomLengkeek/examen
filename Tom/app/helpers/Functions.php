<?php

//file for general functions
function sanitize($value)
{
  $value = htmlspecialchars($value);
  $value = trim($value);
  return $value;
}


//show a message and then refresh the page to remove it
function show_message(string $link, $message)
{
  if (!empty($message)) {
    echo $message;
    header("Refresh: 2; url=" . URLROOT . $link);
  }
}

//check if we have the right role
function validate_role(array $role)
{
  $validated = false;
  foreach ($role as $value) {
    if ($_SESSION["role"] == $value) {
      $validated = true;
      break;
    }
  }
  return $validated;
}

//creates a bootstrap navbar based on the roles
function getNavbar()
{
  $navbar = '';
  switch ($_SESSION["role"]) {
    case "User":
      $navbar = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="' . URLROOT . '/user/Vindex">PaasHaas</a>
              <div class="navbar" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="d-flex ">
                    <a href="' . URLROOT . '/home/logout"><button class="btn btn-outline-danger" >Log out</button><a>
                </div>
              </div>
            </div>
          </nav>';
      break;
    case "Admin":
      $navbar = '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="' . URLROOT . '/admin/Vindex">PaasHaas</a>
              <div class="navbar" id="navbarSupportedContent" style="margin-left: auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="col">
                  <div class="d-flex " style="" >
                      <a href="' . URLROOT . '/home/logout"><button class="btn btn-outline-danger" >Log out</button><a>
                  </div>
                </div>
              </div>
            </div>
          </nav>';
      break;
  }
  return $navbar;
}
