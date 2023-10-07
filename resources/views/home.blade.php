<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    @auth
    <p>Congratulations, You are LoggedIn...</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    <div style="border: 3px solid black;">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Post Title">
        <textarea name="body" placeholder="Body Content"></textarea>
        <button>Save Post</button>
        <br>
    </form>
    </div>

    <div style="border: 3px solid black;">
    <h2>All Posts</h2>
    @foreach($posts as $post)
    <div style="background-color: gray; padding: 10px; margin: 10px;">
    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
    {{$post['body']}}
    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
    <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    </div>
    @endforeach
    </div>
    @else
    <div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name" autocomplete="off">
        <input type="text" placeholder="email" name="email" autocomplete="off">
        <input type="password" placeholder="password" name="password" autocomplete="off">
        <button>Register</button>
    </form>
    <br>
    </div>
    <br>
    <div style="border: 3px solid black;">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="text" placeholder="name" name="login_name" autocomplete="off">
        <input type="password" placeholder="password" name="login_password" autocomplete="off">
        <button>Log in</button>
    </form>
    <br>
    </div>
    @endauth
</body>
</html>