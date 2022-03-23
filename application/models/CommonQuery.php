<?php

class CommonQuery extends CI_Model 
{
    public function menuDetails($value='')
    {
        $query = $this->db->get_where('menu_details',array('status' => 'Y'));
        $result = $this->objectToArray($query->result());
        foreach ($result as $key => $value) {
            if ($value['parent_menu'] == 0) {
                $menu['menu'][$value['id']] = $value;
            }else{
                $menu['menu'][$value['parent_menu']]['sub_menu'][] = $value;
            }
        }
        return $menu;
    }
    public function ctrlDetails($value='')
    {
        $query = $this->db->get('controller');
        // $menu['ctrl'] = '';
        $result = $this->objectToArray($query->result());
        foreach ($result as $key => $value) {
            if ($value['status'] == 'Y') {
                $menu['ctrl'][] = $value;
            }
        }
        return $menu;
    }

    public function objectToArray($data)
    {
        return json_decode(json_encode($data),1);
    }
    public function userLogin($value)
    {
        $query = $this->db->get_where('user_details',array('email_id' => $value['email']));
        // print_r($query->result());exit;
        $userResults = $this->objectToArray($query->result());
        if (count($userResults) > 0) {
            if (count($userResults) < 2 ) {
                $menu['userResult'] = $userResults[0];
                $queryPwd = $this->db->get_where('user_pwd_details',array('user_id' => $menu['userResult']['id']));
                $menu['pwdResult'] = $this->objectToArray($queryPwd->result())[0];
            }
        }else{
            return "No User Found";
        }
        
        return $menu;
    }
    public function insertUser($value)
    {
        $data = $this->db->insert('user_details', $value);
        $datas = $this->db->insert_id();
        return $datas;
    }
    public function insertUserPwd($value)
    {
        $data = $this->db->insert('user_pwd_details', $value);
        return $data;
    }
}

?>