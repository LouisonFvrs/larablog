<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Message flash -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Message flash -->
            @if (session('successDelete'))
                <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                    {{ session('successDelete') }}
                </div>
            @endif
            <div class="bg-gray-50 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Articles -->
                @foreach ($articles as $article)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-4 flex justify-between">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                            <p class="text-gray-700 dark:text-gray-300">{{ substr($article->content, 0, 30) }}...</p>
                            @foreach($article->categories as $c)
                                <x-badge> {{$c->name}} </x-badge>
                            @endforeach
                        </div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <x-primary-button>
                                <a href="{{ route('articles.edit', $article->id) }}" class="text-white-500 hover:text-white-700"><i class="fa-solid fa-pen"></i></a>
                            </x-primary-button>
                            <x-danger-button>
                                <a href="{{ route('articles.delete', $article->id) }}" class="text-white-500 hover:text-white-700"><i class="fa-regular fa-trash-can"></i></a>
                            </x-danger-button>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
