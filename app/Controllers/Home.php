<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex(): string
    {
        $content = [];
        $data['pageTitle'] = 'Home';
        $data['pageContent'] = view('home/content', $content);
        //$data['renderStyles'] = view('home/styles');
        //$data['renderScripts'] = view('home/scripts');
        return view('render', $data);
    }
}
