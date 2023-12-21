<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon blog') }}
        </h2>
    </x-slot>
    <x-card>
        <div>
            <a href="{{ route('public.index', [$article->user_id]) }}"><i class="fa-solid fa-arrow-left"></i></a>
            <div class="relative">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ $article->title }}
                    </h2>

                    <div class="text-gray-500 text-sm">
                        Publié le {{ $article->created_at->format('d/m/Y') }} par <a
                            href="{{ route('public.index', $article->user->id) }}">{{ $article->user->name }}</a>
                    </div>
                    @foreach($article->categories as $c)
                        <x-badge> {{$c->name}} </x-badge>
                    @endforeach

                    <!-- Div du like en haut à droite -->
                    @auth
                        <div class="absolute top-0 right-0 p-2">
                            <a href="{{ route('article.like', $article->id) }}"
                               class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61"
                                          clip-rule="evenodd"/>
                                </svg>
                                <span>{{$article->like}}</span>
                            </a>
                        </div>
                    @endauth

                    <div>
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p class="text-gray-700 dark:text-gray-300">{{ $article->content }}</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-4">
                <hr class="mb-4">

                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 m-2">Commentaires</h3>

                <!-- Liste des commentaires existants -->
                @foreach ($article->comments as $comment)
                    <div class="mt-4 p-4 border rounded">
                        <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                        <div class="text-gray-500 text-sm">
                            Posté le {{ $comment->created_at->format('d/m/Y') }} par
                            <a href="{{ route('public.index', $comment->user->id) }}">{{ $comment->user->name }}</a>
                        </div>
                    </div>
                @endforeach

                <!-- Formulaire pour ajouter un commentaire -->
                @if(session('success'))
                    <div class="mt-2 text-green-500">{{ session('success') }}</div>
                @endif
                @auth
                    <form action="{{ route('comments.store', $article->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <textarea name="content" id="content" class="w-full p-2 border rounded"
                                  placeholder="Ajouter un commentaire"></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Publier</button>
                    </form>
                @endauth

            </div>
        </div>
    </x-card>
</x-app-layout>

