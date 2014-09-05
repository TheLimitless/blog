<?php

class AdminController extends BaseController {

    public function getIndex() {

        $posts = Post::orderBy('id', 'desc')->get();
        $projects = Project::orderBy('id', 'desc')->get();

        return View::make('admin_dash')
            ->with(compact('posts'))
            ->with(compact('projects'))
            ->with(['title' => 'Панель управления администратора']);
    }

}