<?php

class BlogController extends BaseController {

    public function __construct() {

    }

    public function getIndex() {
        $recentPost = Post::orderBy('id', 'desc')->first();
        $recentProject = Project::orderBy('id', 'desc')->first();

        if ($recentPost === NULL || $recentProject === NULL) {
            return View::make('index')
                ->with(['title' => 'Евгений Потапов']);
        }

        $recentPost["created_at_rus"] = Locale::rus_date("j F Y", strtotime($recentPost->created_at));
        $recentProject["created_at_rus"] = Locale::rus_date("j F Y", strtotime($recentProject->created_at));

        return View::make('index')
            ->with(compact('recentPost'))
            ->with(compact('recentProject'))
            ->with(['title' => 'Евгений Потапов']);
    }

    public function getBlog($catName = NULL) {

        if (isset($catName)) {
            $pageTitle = $catName;
            $category = Category::where('name', '=', $catName)->first();
            $posts = $category->posts()->orderBy('id', 'desc')->paginate(10);
        } else {
            $pageTitle = "Все записи";
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        foreach ($posts as $post) {
            $post["created_at_rus"] = Locale::rus_date("j F Y", strtotime($post->created_at));
            $post["categories"] =  $post->categories()->get();
        }

        $recentPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::get();

        return View::make('blog')
            ->with(compact('posts'))
            ->with(compact('recentPosts'))
            ->with(compact('categories'))
            ->with(['title' => 'Блог веб-разработчика', 'pageTitle' => $pageTitle]);
    }

    public function getSearch() {
        $searchTerm = Input::get('s');
        $pageTitle = "Результаты поиска: ".$searchTerm;

        $posts = Search::whereRaw('match(title, content) against (? in boolean mode)',
            [$searchTerm])->paginate(10);
        $posts->appends(['s'=>$searchTerm]);

        foreach ($posts as $post)
            $post["created_at_rus"] = Locale::rus_date("j F Y", strtotime($post->created_at));

        $recentPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::get();
        return View::make('blog')
            ->with(compact('posts'))
            ->with(compact('recentPosts'))
            ->with(compact('categories'))
            ->with(['title' => 'Блог веб-разработчика', 'pageTitle' => $pageTitle]);
    }

    public function getProjects() {
        $projects = Project::orderBy('id', 'desc')->paginate(9);
        foreach ($projects as $project)
            $project["created_at_rus"] = Locale::rus_date("j F Y", strtotime($project->created_at));

        return View::make('projects')
            ->with(compact('projects'))
            ->with(['title' => 'Проекты']);
    }

    public function getLogin() {
        return View::make('login')
            ->with(['title' => 'Вход в панель управления']);
    }

    public function postLogin() {
        $credentials = [
            'username'=>Input::get('username'),
            'password'=>Input::get('password')
        ];
        $rules = [
            'username' => 'required',
            'password'=>'required'
        ];
        $messages = [
            'username.required' => 'Введите имя пользователя',
            'password.required' => 'Введите пароль'
        ];
        $validator = Validator::make($credentials, $rules, $messages);
        if ($validator->passes()) {
            if (Auth::attempt($credentials))
                return Redirect::route('dash');
            return Redirect::back()->withInput()->with('failure', 'Данные неверные!');
        } else
            return Redirect::back()->withErrors($validator)->withInput();
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }

}