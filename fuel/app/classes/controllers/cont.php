<?php
class Controller_Cont extends Controller_Template{

public $template = 'T24Template';


public function action_Home()
    {
        
        $data = array();
        $this->template->title = 'Home Page';
        $this->template->header = "Freaky Four";
        $this->template->content = View::forge('T24/Home.php', $data);
        $this->template->css = "Home.css";
    }
    
public function action_About()
    {
        
        $data = array();
        $this->template->title = 'About Page';
        $this->template->header = "Freaky Four";
        $this->template->content = View::forge('T24/About.php', $data);
        $this->template->css = "Home.css";
    }
    
    public function action_colorcoordinates()
    {
        $data = array();
        $this->template->title = 'Color Coordinate Generation';
        $this->template->header = "Freaky Four";
        $this->template->content = View::forge('T24/colorcoordinates.php', $data);
        $this->template->css = "Home.css";
    }

    
}