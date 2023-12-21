<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-dark-200 leading-tight">
            Créer un article
        </h2>
    </x-slot>

    <form method="post" action="{{ route('articles.store') }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-dark-900 text-dark-100">
                    <select name="categories[]" id="categories[]" multiple style="width: 200px;">
                        <?php foreach ($categories as $categorie) { ?>
                        <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="p-6 text-dark-900 text-dark-100">
                    <!-- Input de titre de l'article -->
                    <input type="text" name="title" id="title" placeholder="Titre de l'article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="p-6 pt-0 text-gray-900 text-dark-100">
                    <!-- Contenu de l'article -->
                    <textarea rows="30" name="content" id="content" placeholder="Contenu de l'article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                    <!-- Action sur le formulaire -->
                    <div class="grow">
                        <input type="checkbox" name="draft" id="draft" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label for="draft" class="text-dark-200">Article en brouillon</label>
                    </div>
                    <div>
                        <x-primary-button type="submit">
                            Créer l'article
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script>
            new MultiSelectTag('categories[]')  // id
        </script>
</x-app-layout>
