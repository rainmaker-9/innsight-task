<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';

  protected $primaryKey = 'user_id';

  protected $allowedFields = ['user_name', 'user_email', 'user_mobile', 'user_gender', 'user_state'];

  protected $returnType = 'object';

  protected $createdField = 'created_on';

  protected $updatedField = 'updated_on';

  public function getAllUsers()
  {
    $this->select('user_id as id, user_name as name, user_email as email, user_mobile as mobile, user_gender as gender, user_state as state, added_on as add_date, updated_on as update_date');
    return $this;
  }

  public function getUserByID(int $id)
  {
    $this->select('user_id as id, user_name as name, user_email as email, user_mobile as mobile, user_gender as gender, user_state as state');
    return $this->doFind(true, $id);
  }
}
