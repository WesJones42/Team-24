<?php
class Controller_Cont extends Controller_Template{

public $template = 'T24Template';


public function action_index()
    {
        
        $data = array();
        $this->template->title = 'Home Page';
        $this->template->header = "Freaky Four";
        $this->template->content = View::forge('T24/Home.php', $data);
        $this->template->css = "Home.css";
    }




}