<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Annonces d\'objets perdus et trouvés') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Filtres et recherche -->
                <div class="mb-6">
                    <form action="{{ route('posts.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Tous</option>
                                <option value="lost" {{ request('type') === 'lost' ? 'selected' : '' }}>Objets perdus</option>
                                <option value="found" {{ request('type') === 'found' ? 'selected' : '' }}>Objets trouvés</option>
                            </select>
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Toutes les catégories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lieu</label>
                            <input type="text" name="location" id="location" value="{{ request('location') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Entrez un lieu...">
                        </div>

                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Recherche</label>
                            <div class="flex">
                                <input type="text" name="search" id="search" value="{{ request('search') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Rechercher...">
                                <button type="submit" class="ml-2 mt-1 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Bouton de création -->
                <div class="mb-6">
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Publier une annonce
                    </a>
                </div>

                <!-- Liste des annonces -->
                @if($posts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($posts as $post)
                            <div class="border rounded-lg shadow-sm overflow-hidden">
                                @if($post->image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="inline-block px-2 py-1 text-xs rounded {{ $post->type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $post->type === 'lost' ? 'Perdu' : 'Trouvé' }}
                                        </span>
                                        <span class="text-sm text-gray-500">{{ $post->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                                    <p class="text-sm text-gray-500 mb-2">
                                        Catégorie: {{ $post->category->name }} |
                                        Lieu: {{ $post->location }}
                                    </p>
                                    <p class="mb-4 text-gray-700 text-sm">{{ Str::limit($post->description, 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            {{ $post->views }}
                                        </span>
                                        <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">
                                            Voir plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune annonce trouvée</h3>
                        <p class="mt-1 text-sm text-gray-500">Aucune annonce ne correspond à vos critères de recherche.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
