<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            create
        </x-slot>
        <body>
            <h1>Blog Name</h1>
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title__error" style="color=:red">{{ $errors->first('post.tilte') }}</p>
                </div>
                
                <div class="game">
                    <h2>Game</h2>
                    <input type="text" name="post[game]" placeholder="ゲーム" value="{{ old('post.game') }}"/>
                    <p class="game__error" style="color:red">{{ $errors->first('post.game') }}</p>
                </div>
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <select multiple name="category[]">
                     @foreach($categories as $category)
                        <option value={{ $category->id }}>
                             {{ $category->name }}
                        </option>
                     @endforeach
                </select>
                
                <input type="submit" value="保存"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>