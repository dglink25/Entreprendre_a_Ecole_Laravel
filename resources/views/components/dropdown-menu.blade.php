<!-- Accueil -->
<a href="{{ route('home') }}" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors {{ request()->routeIs('home') ? 'bg-blue-600 font-bold' : 'text-blue-100' }}">
    ACCUEIL
</a>

<!-- Programme EaE avec dropdown -->
<div class="relative group">
    <button class="nav-link flex items-center justify-between w-full py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors text-blue-100 group-hover:bg-blue-700 group-hover:text-white">
        <span>Programme EaE</span>
        <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    
    <!-- Menu déroulant -->
    <div class="absolute left-0 mt-1 w-full md:w-48 bg-white shadow-xl rounded-lg overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
        <a href="#" class="block py-3 px-6 text-gray-800 hover:bg-blue-50 hover:text-blue-700 border-b border-gray-100 transition-colors">
            Présentation
        </a>
        <a href="#" class="block py-3 px-6 text-gray-800 hover:bg-blue-50 hover:text-blue-700 transition-colors">
            Activité
        </a>
    </div>
</div>

<!-- Annonces -->
<a href="{{ route('annonces') }}" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors {{ request()->routeIs('annonces') ? 'bg-blue-600 font-bold' : 'text-blue-100' }}">
    ANNONCES
</a>

<!-- Entreprises créées -->
<a href="{{ route('entreprises') }}" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors {{ request()->routeIs('entreprises') ? 'bg-blue-600 font-bold' : 'text-blue-100' }}">
    ENTREPRISES CRÉÉES
</a>

<!-- Galeries -->
<a href="#" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors text-blue-100">
    GALERIES
</a>

<!-- Partenaires -->
<a href="#partenaires" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors text-blue-100">
    PARTENAIRES
</a>

<!-- Contacts -->
<a href="{{ route('contacts') }}" class="nav-link block py-3 px-6 md:py-2 md:px-4 rounded-lg hover:bg-blue-700 hover:text-white transition-colors {{ request()->routeIs('contacts') ? 'bg-blue-600 font-bold' : 'text-blue-100' }}">
    CONTACTS
</a>