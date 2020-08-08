<?php

class About extends Controller {
    public function index($name = 'afdolsing', $job = 'jr. programmer')
    {
        $data['judul'] = 'About';
        $data['name'] = $name;
        $data['job'] = $job;
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}