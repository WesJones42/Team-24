<?php
class Controller_Cont extends Controller_Template
{

    public $template = 'T24Template';


    public function action_index()
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

    public function action_colorCoordinates()
    {
        $data = array();
        $this->template->title = 'Color Coordinate Generation';
        $this->template->header = "Freaky Four";
        $this->template->content = View::forge('view/colorcoordinates', $data);
        $this->template->css = "Home.css";
    }

    public function get_generate($rows = 0, $colors = 0)
    {
        $rows = Input::get('rows');
        $colors = Input::get('colors');

        if ($rows < 1 || $rows > 26 || $colors < 1 || $colors > 10) {
            Session::set_flash('error', 'Invalid input. Rows/columns must be between 1 and 26, and colors must be between 1 and 10.');
            Response::redirect('index/cont/colorcoordinates');
        }

        $this->template->title = 'Color Coordinate Genearation';
        $this->template->content = View::forge('view/generate', ['rows' => $rows, 'colors' => $colors]);
        $this->template->css = "Home.css";
        $this->template->header = "Freaky Four";
    }
}
