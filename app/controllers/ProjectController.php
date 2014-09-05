<?php

class ProjectController extends BaseController {

    public function showProject(Project $project) {

        return View::make('projects_single')
            ->with(compact('project'))
            ->with(['title' => 'Просмотр проекта']);
    }

    public function newProject() {
        return View::make('admin_new_project')
            ->with(['title' => 'Создать новый проект']);
    }

    public function editProject(Project $project) {
        return View::make('admin_edit_project')
            ->with(compact('project'))
            ->with(['title' => 'Редактировать проект']);
    }

    public function deleteProject(Project $project) {
        $project->delete();
        return Redirect::route('dash')->with('success', 'Проект удален!');
    }

    public function saveProject() {
        $postInput = [
            'title' => Input::get('title'),
            'features' => Input::get('features'),
            'link' => Input::get('link'),
            'image-cover' => Input::file('image-cover'),
            'image-full' => Input::file('image-full'),
            'background' => Input::get('background'),
            'description' => Input::get('description'),
        ];
        $rules = [
            'title' => 'required',
            'image-cover' => 'required|image|max:5242',
            'image-full' => 'required|image|max:5242',
            'background' => 'required|size:6',
            'description' => 'required',
        ];
        $messages = [
            'title.required' => 'Введите название проекта',
            'image-cover.required' => 'Добавьте обложку проекта',
            'image-full.required' => 'Добавьте изображение проекта',
            'background.required' => 'Добавьте фон изображения проекта',
            'description.required' => 'Введите содержание проекта',
        ];
        $valid = Validator::make($postInput, $rules, $messages);
        if ($valid->passes()) {
            $project = new Project;
            $project->title = $postInput['title'];
            $project->features = $postInput['features'];
            $project->link = $postInput['link'];
            $project->background = $postInput['background'];
            $project->description = $postInput['description'];
            $project->save();

            $imageCoverName = "cover" . $project->id . "." . $postInput['image-cover']->guessExtension();
            $project->link_cover = $imageCoverName;
            $postInput['image-cover']->move(public_path().'/img/uploaded', $imageCoverName);

            $imageFullName = $project->id . "." . $postInput['image-full']->guessExtension();
            $project->link_background = $imageFullName;
            $postInput['image-full']->move(public_path().'/img/uploaded', $imageFullName);

            $project->save();

            return Redirect::route('dash')->with('success', 'Проект добавлен!');
        } else
            return Redirect::back()->withErrors($valid)->withInput();
    }

    public function updateProject(Project $project) {
        $postInput = [
            'title' => Input::get('title'),
            'features' => Input::get('features'),
            'link' => Input::get('link'),
            'image-cover' => Input::file('image-cover'),
            'image-full' => Input::file('image-full'),
            'background' => Input::get('background'),
            'description' => Input::get('description'),
        ];
        $rules = [
            'title' => 'required',
            'image-cover' => 'image|max:5242',
            'image-full' => 'image|max:5242',
            'background' => 'required|size:6',
            'description' => 'required',
        ];
        $messages = [
            'title.required' => 'Введите название проекта',
            'image-cover.required' => 'Добавьте обложку проекта',
            'image-full.required' => 'Добавьте изображение проекта',
            'background.required' => 'Добавьте фон изображения проекта',
            'description.required' => 'Введите содержание проекта',
        ];
        $valid = Validator::make($postInput, $rules, $messages);
        if ($valid->passes()) {
            $project->title = $postInput['title'];
            $project->features = $postInput['features'];
            $project->link = $postInput['link'];
            $project->background = $postInput['background'];
            $project->description = $postInput['description'];

            if (count($project->getDirty()) > 0) {
                $project->save();
            }
            if ($postInput['image-cover']) {
                unlink(public_path().'/img/uploaded/' . $project->link_cover);
                $imageCoverName = "cover" . $project->id . "." . $postInput['image-cover']->guessExtension();
                $project->link_cover = $imageCoverName;
                $postInput['image-cover']->move(public_path().'/img/uploaded', $imageCoverName);
                $project->save();
            }
            if ($postInput['image-full']) {
                unlink(public_path().'/img/uploaded/' . $project->link_background);
                $imageFullName = $project->id . "." . $postInput['image-full']->guessExtension();
                $project->link_background = $imageFullName;
                $postInput['image-full']->move(public_path().'/img/uploaded', $imageFullName);
                $project->save();
            }

            return Redirect::route('dash')->with('success', 'Проект обновлен!');
        } else
            return Redirect::back()->withErrors($valid)->withInput();
    }
}