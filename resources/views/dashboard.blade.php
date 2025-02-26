<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-4">Mes annonces</h2>

                <div class="mb-4">
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Créer une annonce
                    </a>
                </div>

                @if($userPosts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($userPosts as $post)
                            <div class="border rounded-lg shadow-sm p-4">
                                <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                                <p class="text-sm text-gray-500 mb-2">
                                    <span class="inline-block px-2 py-1 rounded {{ $post->type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $post->type === 'lost' ? 'Perdu' : 'Trouvé' }}
                                    </span>
                                    • {{ $post->created_at->format('d/m/Y') }}
                                </p>
                                <p class="mb-2 text-gray-700">{{ Str::limit($post->description, 100) }}</p>
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">Voir</a>
                                    <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 hover:underline">Modifier</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Vous n'avez pas encore publié d'annonces.</p>
                @endif
            </div>
        </div>
    </div>
</div>
