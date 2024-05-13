<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>RECUPERA RS</title>
    </head>



    <body>
        <div class="container mx-auto px-4 pt-10 ">
            <div class="">
                @if (session('status'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <h1 class="my-10 text-xl font-bold">RECUPERA RS</h1>




            <div>
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 " href="/cadastrante">NOVO CADASTRANTE</a>
                <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 " href="/cadastro">NOVO CADASTRO</a>
            </div>

        </div>
    </body>
</html>
