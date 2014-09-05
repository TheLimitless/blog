<?php

class PostController extends BaseController {

    public function showPost(Post $post) {

        $post["created_at_rus"] = Locale::rus_date("j F Y", strtotime($post->created_at));
        $post["categories"] =  $post->categories()->get()->all();

        return View::make('posts_single')
        ->with(compact('post'))
        ->with(['title' => 'Блог веб-разработчика']);
    }

    public function newPost() {
        return View::make('admin_new_blog')
            ->with(['title' => 'Создать новую запись']);
    }

    public function editPost(Post $post) {
        $categories =  $post->categories()->get();
        $post['categories'] = "";
        foreach ($categories as $category)
            $post['categories'] .= $category->name . " ";

        return View::make('admin_edit_blog')
            ->with(compact('post'))
            ->with(['title' => 'Редактировать статью']);
    }

    public function deletePost(Post $post) {
        $post->delete();
        return Redirect::route('dash')->with('success', 'Статья удалена!');
    }

    public function savePost() {
        $postInput = [
            'title' => Input::get('title'),
            'categories' => trim(Input::get('categories')),
            'content' => Input::get('content'),
        ];

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $messages = [
            'title.required' => 'Введите название статьи',
            'content.required' => 'Введите содержание статьи',
        ];
        $valid = Validator::make($postInput, $rules, $messages);
        if ($valid->passes()) {

            $post = new Post;
            $post->title = $postInput['title'];
            $post->content = $postInput['content'];
            $post->beginning = (strlen($postInput['content']) > 750)
                ? substr($postInput['content'], 0, 750)
                : $postInput['content'];
            $post->save();

            if (!empty($postInput['categories'])) {
                $categories = explode(' ', $postInput['categories']);
                foreach($categories as $category) {
                    $foundCategory = Category::where('name', '=', $category)->first();
                    if (isset($foundCategory->id)) {
                        $post->categories()->save($foundCategory);
                    } else {
                        $newCat = new Category();
                        $newCat->name = $category;
                        $newCat->save();
                        $post->categories()->save($newCat);
                    }
                }
            }
            return Redirect::route('dash')->with('success', 'Статья добавлена!');
        } else
            return Redirect::back()->withErrors($valid)->withInput();
    }

    public function updatePost(Post $post) {
        $postInput = [
            'title' => Input::get('title'),
            'categories' => trim(Input::get('categories')),
            'content' => Input::get('content'),
        ];

        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $messages = [
            'title.required' => 'Введите название статьи',
            'content.required' => 'Введите содержание статьи',
        ];
        $valid = Validator::make($postInput, $rules, $messages);
        if ($valid->passes()) {

            $post->title = $postInput['title'];
            $post->content = $postInput['content'];
            $post->beginning = (strlen($postInput['content']) > 750)
                ? substr($postInput['content'], 0, 750)
                : $postInput['content'];
            if (count($post->getDirty()) > 0) {
                $post->save();
            }


            if ($post->categories()->count() > 0) {
                $post->categories()->detach();
                $allCategories = Category::all();
                foreach ($allCategories as $category)
                    if ($category->posts()->count() === 0)
                        $category->delete();
            }

            if (!empty($postInput['categories'])) {
                $categories = explode(' ', $postInput['categories']);
                foreach($categories as $category) {
                    $foundCategory = Category::where('name', '=', $category)->first();
                    if (isset($foundCategory->id)) {
                        $post->categories()->save($foundCategory);
                    } else {
                        $newCat = new Category();
                        $newCat->name = $category;
                        $newCat->save();
                        $post->categories()->save($newCat);
                    }
                }
            }
            return Redirect::route('dash')->with('success', 'Статья обновлена!');
        } else
            return Redirect::back()->withErrors($valid)->withInput();
    }
}