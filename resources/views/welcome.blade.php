<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Mailer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <!-- <div class="preloader-wrapper">
            <div class="spinner-grow" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> -->

        <div class="container">


            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                @if (Route::has('login'))
                    <div class="hidden fixed text-right px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <div class="flex justify-center">

                <h1>Laravel Mailer</h1>

                <form action="{{route('store')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input  type="text" name="name" class="question" id="name" required autocomplete="off" />
                        <label for="name"><span>What's your name?</span></label>
                    </div>

                    <div class="mb-4">
                        <input type="text" name="email" class="question" id="email" required autocomplete="off" />
                        <label for="email"><span>What's your email?</span></label>
                    </div>

                    <div class="mb-4">
                    <textarea name="message" rows="2" class="question" id="msg" required autocomplete="off"></textarea>
                    <label for="msg"><span>What's your message?</span></label>
                    <!-- <input type="submit" value="Submit!" /> -->
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-outline-secondary btn-lg" type="submit">Send</button>
                    </div>
                </form>

            </div>
        </div>

        <script src="{{ asset('js/app.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>

    </body>
</html>
