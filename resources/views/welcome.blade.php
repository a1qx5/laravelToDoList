<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-emerald-950">

    <div class="flex flex-row min-h-screen py-4 sm:pt-0">
        <div class="w-1/2 flex flex-col items-center justify-center">
            <h1 class="text-5xl text-white pb-5">To do list</h1>

            <label for="listItem" class="text-white">New To Do Item</label> <br>
            <form method="post" action="{{ route('saveItem') }}">
                @csrf
                <input type="text" name="listItem" class="bg-white"><br><br><br>
                <button type="submit" class="rounded-2xl bg-white cursor-pointer"><span class="px-2 py-2">Save</span></button>
            </form>
        </div>
        <div class="w-1/2 flex flex-col items-right justify-center">
            @foreach ($items as $item)
                <div class="py-2">

                    <div name="item" class="bg-emerald-900 px-4 rounded-2xl flex items-center justify-between">
                        <span class="text-white">{{ $item->text }}</span>
                        <form method="POST" action="{{ route('items.complete', $item->id) }}" class="ml-4">
                            @csrf
                            <button type="submit" class="text-white whitespace-nowrap">
                                Mark as complete⬇️
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
