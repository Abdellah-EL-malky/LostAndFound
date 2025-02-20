<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<!-- Navbar -->
<nav class="bg-white border-b fixed w-full top-0 z-50">
    <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-xl font-bold">Lost & Found</div>

    </div>
</nav>

<!-- Main Content -->
<main class="max-w-2xl mx-auto pt-16 pb-8">
    <!-- Post -->
    <article class="bg-white border rounded-sm my-4">
        <!-- Post Header -->
        <div class="flex items-center p-4">
            <div class="ml-3 mt-4">
                <span class="font-semibold text-sm">Trouvé</span>
            </div>
        </div>
            <hr class="border-t mt-4 pt-4">


        <!-- Post Image -->

        <img  src="data:image/jpeg;base64,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" class="w-full" alt="Post image">



            <!-- Comments -->
            <div class="space-y-2">
                <div class="text-sm">
                    <p class="text-xs text-gray-500 ml-3">Description:</p>
                    <span class="font-semibold ml-5 cursor-pointer hover:text-blue-500 group">jean_martin:
                    Je les ai trouvés au Centre Ville</span>
                </div>
            </div>

            <!-- Add Comment -->
            <div class="border-t mt-10 pt-4">
                <form class="flex items-center">
                    <input type="text" placeholder="Add a comment..." class="flex-1 outline-none text-sm focus:ring-0 ml-4 mb-5">
                    <button type="submit" class="text-blue-500 font-semibold text-sm ml-4 hover:text-blue-600 disabled:opacity-50 disabled:hover:text-blue-500 mr-5 mb-5">Post</button>
                </form>
            </div>
        <div class="text-sm border-t ">
            <p class="text-xs text-gray-500 mt-3 ml-3">Commentaires:</p>
            <span class="font-semibold ml-5">sophie_bernard</span>
            Elles sont à moi
            <p class="mb-5"></p>
        </div>
        </div>
    </article>

    <!-- Additional Posts would go here -->

    <div id="formModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl w-full max-w-lg mx-4 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Ajouter une annonce</h2>
                <button onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form class="space-y-6">
                <!-- Upload Photo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-gray-400 transition-colors cursor-pointer">
                        <input type="file" accept="image/*" class="hidden" id="photoInput">
                        <label for="photoInput" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-1 text-sm text-gray-600">Cliquez pour ajouter une photo</p>
                        </label>
                    </div>
                </div>

                <!-- Type Select -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type d'annonce</label>
                    <select id="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0095F6] focus:border-transparent">
                        <option value="" hidden>Sélectionnez un type</option>
                        <option value="lost">Perdu</option>
                        <option value="found">Trouvé</option>
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0095F6] focus:border-transparent" placeholder="Décrivez l'objet, le lieu, la date..."></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#0095F6] text-white py-2 rounded-lg hover:bg-[#1AA1F6] transition-colors duration-200">
                    Publier
                </button>
            </form>
        </div>
    </div>

    <!-- Plus Button -->
    <button onclick="toggleModal()" class="fixed bottom-8 right-8 w-16 h-16 bg-[#0095F6] rounded-xl flex items-center justify-center shadow-lg hover:bg-[#1AA1F6] transition-colors duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
    </button>

    <script>
        function toggleModal() {
            const modal = document.getElementById('formModal');
            modal.classList.toggle('hidden');
        }

        // Fermer le modal en cliquant à l'extérieur
        document.getElementById('formModal').addEventListener('click', function(e) {
            if (e.target === this) {
                toggleModal();
            }
        });
    </script>
</main>
</body>
</html>


