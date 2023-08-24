<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
  public function getIndex(): string
  {
    $usersModel = new UsersModel();
    $usersModel->getAllUsers();
    $content = ['users' => $usersModel->paginate(10), 'pager' => $usersModel->pager];
    $data['pageTitle'] = 'Users';
    $data['pageContent'] = view('users/list/content', $content);
    $data['renderScripts'] = view('users/list/scripts');
    return view('render', $data);
  }

  public function addUser(): string
  {
    $content = [];
    $content['states'] = INDIAN_STATE_LIST;
    $data['pageTitle'] = 'Add User';
    $data['pageContent'] = view('users/add/content', $content);
    $data['renderScripts'] = view('users/add/scripts');
    return view('render', $data);
  }

  public function addUserPost()
  {
    $req = $this->request;
    if ($req->is('post')) {
      if (
        !empty($req->getPost('username')) && !empty($req->getPost('email')) && !empty($req->getPost('mobile')) &&
        !empty($req->getPost('gender')) && !empty($req->getPost('state'))
      ) {

        $username = $req->getPost('username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = $req->getPost('email', FILTER_VALIDATE_EMAIL);
        $mobile = $req->getPost('mobile', FILTER_VALIDATE_INT);
        $gender = $req->getPost('gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $state = $req->getPost('state', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!$this->isAlphabetValue($username)) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Name must contain letters and spaces only.'));
        } else if (!$this->isNumericValue($mobile)) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Mobile Number must contain numbers only.'));
        } else if (!$this->isAlphabetValue($state)) {
          return $this->response->setJSON(array('status' => false, 'message' => 'State name is not valid.'));
        }

        if ($this->validateStringLength($username, 255, '>')) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Name can have maximum 255 characters.'));
        } else if ($this->validateStringLength($email, 255, '>')) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Email can have maximum 255 characters.'));
        } else if (!$this->validateStringLength($mobile, 10)) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Mobile number must be 10 digits.'));
        } else if (!$this->validateStringLength($gender, 1)) {
          return $this->response->setJSON(array('status' => false, 'message' => 'Gender value is not valid.'));
        } else if ($this->validateStringLength($state, 255, '>')) {
          return $this->response->setJSON(array('status' => false, 'message' => 'State can have maximum 255 characters.'));
        }

        if (!empty($username) && !empty($email) && !empty($mobile) && !empty($gender) && !empty($state)) {
          $insertData = ['user_name' => $username, 'user_email' => $email, 'user_mobile' => $mobile, 'user_gender' => $gender, 'user_state' => $state];
          $usersModel = new UsersModel();
          $usersModel->insert($insertData);
          if ($usersModel->affectedRows() === 1) {
            $id = $usersModel->getInsertID();
            return $this->response->setJSON(array('status' => true, 'message' => 'User created successfully with ID: ' . $id));
          } else {
            return $this->response->setJSON(array('status' => false, 'message' => 'Failed to create new user.'));
          }
        } else {
          return $this->response->setJSON(array('status' => false, 'message' => 'Something went wrong!'));
        }
      }
    } else {
      return $this->response->setStatusCode(403)->setJSON(array('status' => false, 'message' => 'Invalid request.'));
    }
  }

  public function editUser($id)
  {
    if (!empty($id)) {
      $content = [];
      $usersModel = new UsersModel();
      $content['user'] = $usersModel->getUserByID($id);
      $content['states'] = INDIAN_STATE_LIST;
      $data['pageTitle'] = 'Edit User';
      $data['pageContent'] = view('users/edit/content', $content);
      $data['renderScripts'] = view('users/edit/scripts');
      return view('render', $data);
    } else {
      return redirect('/users');
    }
  }

  public function editUserPost()
  {
    $req = $this->request;
    if ($req->is('post')) {
      if (
        !empty($req->getPost('userid')) && !empty($req->getPost('username')) && !empty($req->getPost('email')) &&
        !empty($req->getPost('mobile')) && !empty($req->getPost('gender')) && !empty($req->getPost('state'))
      ) {
        $id = $req->getPost('userid', FILTER_SANITIZE_NUMBER_INT);
        $usersModel = new UsersModel();
        $user = $usersModel->find($id);
        if (!empty($user)) {
          $username = $req->getPost('username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $email = $req->getPost('email', FILTER_VALIDATE_EMAIL);
          $mobile = $req->getPost('mobile', FILTER_VALIDATE_INT);
          $gender = $req->getPost('gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $state = $req->getPost('state', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

          if (!$this->isAlphabetValue($username)) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Name must contain letters and spaces only.'));
          } else if (!$this->isNumericValue($mobile)) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Mobile Number must contain numbers only.'));
          } else if (!$this->isAlphabetValue($state)) {
            return $this->response->setJSON(array('status' => false, 'message' => 'State name is not valid.'));
          }

          if ($this->validateStringLength($username, 255, '>')) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Name can have maximum 255 characters.'));
          } else if ($this->validateStringLength($email, 255, '>')) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Email can have maximum 255 characters.'));
          } else if (!$this->validateStringLength($mobile, 10)) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Mobile number must be 10 digits.'));
          } else if (!$this->validateStringLength($gender, 1)) {
            return $this->response->setJSON(array('status' => false, 'message' => 'Gender value is not valid.'));
          } else if ($this->validateStringLength($state, 255, '>')) {
            return $this->response->setJSON(array('status' => false, 'message' => 'State can have maximum 255 characters.'));
          }

          if (!empty($username) && !empty($email) && !empty($mobile) && !empty($gender) && !empty($state)) {
            $updateData = ['user_name' => $username, 'user_email' => $email, 'user_mobile' => $mobile, 'user_gender' => $gender, 'user_state' => $state];
            $usersModel = new UsersModel();
            $updateResult = $usersModel->update($id, $updateData);
            if ($updateResult) {
              if ($usersModel->affectedRows() === 1) {
                return $this->response->setJSON(array('status' => true, 'message' => 'User info updated.'));
              } else {
                return $this->response->setJSON(array('status' => false, 'message' => 'There is no change to update.'));
              }
            } else {
              return $this->response->setJSON(array('status' => false, 'message' => 'Failed to update user info.'));
            }
          } else {
            return $this->response->setJSON(array('status' => false, 'message' => 'Something went wrong!'));
          }
        } else {
          return $this->response->setJSON(array('status' => false, 'message' => 'User not found!'));
        }
      }
    } else {
      return $this->response->setStatusCode(403)->setJSON(array('status' => false, 'message' => 'Invalid request.'));
    }
  }

  public function deleteUserPost()
  {
    $req = $this->request;
    if ($req->is('post')) {
      if (!empty($req->getPost('userid'))) {
        $id = $req->getPost('userid', FILTER_SANITIZE_NUMBER_INT);
        $usersModel = new UsersModel();
        $user = $usersModel->find($id);
        if (!empty($user)) {
          $deleteResult = $usersModel->delete($id);
          if ($deleteResult && $usersModel->affectedRows() === 1) {
            return $this->response->setJSON(array('status' => true, 'message' => 'User info deleted.'));
          } else {
            return $this->response->setJSON(array('status' => false, 'message' => 'Failed to delete user info.'));
          }
        } else {
          return $this->response->setJSON(array('status' => false, 'message' => 'User not found!'));
        }
      }
    } else {
      return $this->response->setStatusCode(403)->setJSON(array('status' => false, 'message' => 'Invalid request.'));
    }
  }

  private function isAlphabetValue($var)
  {
    return ctype_alpha(str_replace(array("\n", "\r\n", "\t", ' '), '', $var));
  }

  private function isNumericValue($var)
  {
    return ctype_digit($var);
  }

  private function validateStringLength($str, $len, $comparator = '==')
  {
    return version_compare(strlen($str), $len, $comparator);
  }
}
