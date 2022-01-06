<?php

class Home extends Controllers{
    public function __construct() {
        parent::__construct();
    }

    public function home() {
        $data['page_id'] = 1;
        $data['tag_page'] = "Home";
        $data['page_title'] = "Pagina principal";
        $data['page_name'] = "home";
        $data['page_content'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque rerum ipsam laudantium enim similique optio numquam quis. Rerum nesciunt architecto, officiis aut et molestiae atque! Adipisci ducimus magnam neque fuga!";

        $this->views->getView($this,"home",$data);
    }

    public function insertUser(){
        $data = $this->model->setUser("wilmer",25);
        print_r ($data);
    }

    public function verUser($id){
        $data = $this->model->getUser($id);
        print_r ($data);
    }

    public function updateUser(){
        $data = $this->model->updateUser(1,"Roberto",30);
        print_r ($data);
    }

    public function verUsers(){
        $data = $this->model->getUsers();
        print_r ($data);
    }

    public function deleteUser($id){
        $data = $this->model->deleteUser($id);
        print_r ($data);
    }
}
