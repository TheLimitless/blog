<?php

class PostTableSeeder extends Seeder {

    public function run() {
        $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                                        eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit.
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum.
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus,
                    mauris justo volutpat elit,
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue,
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris';

        for ($i = 1; $i <= 20; $i++) {
            $post = new Post;
            $post->title = "Post no $i";
            $post->beginning = substr($content, 0, 750);
            $post->content = $content;
            $post->save();
        }
    }
}