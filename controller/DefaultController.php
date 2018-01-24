<?php

class DefaultController
{
    public function indexAction()
    {
        return render('index');
    }

    public function categoriesAction()
    {
        $data['categories'] = [
            [
                'id' => 1,
                'name' => 'Интсрументы',
            ],
            [
                'id' => 2,
                'name' => 'Одежда',
            ],
        ];
        $data['categoriesCount'] = 18;
        return render('categories', $data);
    }

    public function postsAction()
    {
        $stmt = DB::getInstance()->getPdo()
            ->prepare('SELECT * FROM posts');
        $stmt->execute();
        $posts = [];
        foreach ($stmt->fetchAll() as $row) {
            /** @var $post Post */
            if ($row['is_ad']) {
                $post = new AbPost();
            } else {
                $post = new Post();
            }
            $post->title = $row['title'];
            $post->text = $row['text'];
            $posts[] = $post;
        }
        $data['posts'] = $posts;
        return render('posts', $data);
    }

    public function postAction()
    {
        require_once __DIR__ . '/../model/Post.php';
        $data['post'] = Post::getPost(DB::getInstance(),
            $_GET['id']);
        return render('post', $data);
    }

    public function jqueryAction()
    {
        return render('jquery');
    }

    public function ajaxAction()
    {
        $posts = [
            [
                'title' => 'Заголовок 3',
                'text' => 'Текст 3',
            ],
            [
                'title' => 'Заголовок 4',
                'text' => 'Текст 4',
            ],
            [
                'title' => 'Заголовок 5',
                'text' => 'Текст 5',
            ],
            [
                'title' => 'Заголовок 6',
                'text' => 'Текст 6',
            ],
        ];
        return $posts;
    }
}