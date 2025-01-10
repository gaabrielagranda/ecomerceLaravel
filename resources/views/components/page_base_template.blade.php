<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}} || Ecommerce</title> <!-- the title variable is represented in double curly braces because it is a variable and it is being passed from the view that extends this template -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- the @vite directive is used to load the css and js files that are compiled by vite -->
</head>
<body>
<nav>
    <a href="{{ route('products.index') }}">Products</a> <!-- the route helper is used to generate the url for the products index page -->
    <a href="{{ route('categories.index') }}">Categories</a>
    @auth <!-- the @auth directive is used to check if the user is authenticated -->
    <a href="{{ route('cart.index') }}">Cart</a>
    <div class="text-sm text-gray-500"> <!-- the text-sm and text-gray-500 classes are tailwind css classes that are used to style the text -->
        <form action="{{ route('logout') }}" method="post"> <!-- the form is used to create a logout button and the action attribute is used to specify the url that the form should be submitted to and the method attribute is used to specify the http method that should be used to submit the form -->
            @csrf <!-- the @csrf directive is used to generate a csrf token and a csrf token is used to protect the application from cross-site request forgery attacks -->
            <button type="submit">Logout</button>
        </form>
        @else <!-- the @else directive is used to specify what should be displayed if the user is not authenticated -->
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        @endauth <!-- the @endauth directive is used to end the @auth directive -->
    </div>
</nav>
<hr>
<div>
    @if(session('message')) <!-- the session helper is used to get the value of the message key in the session and the session helper is used to store data in the session and the message key is used to store a message in the session -->
    <div>{{session('message')}}</div>
    @endif
</div>
{{$slot}} <!-- the $slot variable is used to represent the content that is passed to the component that extends this template -->
</body>
<hr>
<footer>MMXXV</footer>
</html>
