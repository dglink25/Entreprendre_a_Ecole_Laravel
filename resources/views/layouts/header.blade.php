<header class="bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white shadow-lg">
    <!-- Barre supérieure -->
    <div class="bg-blue-950 py-2 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                <!-- Liens rapides -->
                <div class="flex items-center space-x-4 text-sm">
                    <a href="#" class="flex items-center hover:text-blue-300 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                        Accès rapide
                    </a>
                    <span class="hidden sm:inline">|</span>
                    <a href="#" class="flex items-center hover:text-blue-300 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237L1.124 4.3a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.237.883a.5.5 0 1 1-.966.258l-.495-1.849L8.5 8.866v3.927l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                        </svg>
                        Observatoire
                    </a>
                    <span class="hidden sm:inline">|</span>
                    <a href="#" class="flex items-center hover:text-blue-300 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        Nous écrire
                    </a>
                </div>
                
                <!-- Logo mobile -->
                <div class="sm:hidden flex items-center space-x-2">
                    <img src="{{ asset('images/0 2.png') }}" alt="Logo INSTI" class="w-8 h-8 bg-white p-1 rounded">
                    <span class="font-bold">INSTI</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- En-tête principal -->
    <div class="py-4 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Logo et titre -->
                <div class="flex items-center space-x-4 mb-4 md:mb-0">
                    <div class="bg-white p-2 rounded-lg shadow">
                        <img src="{{ asset('images/0 2.png') }}" alt="Logo INSTI" class="w-16 h-16">
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-2xl md:text-3xl font-bold tracking-tight">INSTI</h1>
                        <p class="text-sm md:text-base text-blue-100">
                            Institut National Supérieur de Technologie Industrielle<br class="hidden md:block">
                            de Lokossa
                        </p>
                    </div>
                </div>
                
                <!-- Logo droit -->
                <div class="bg-white p-2 rounded-lg shadow hidden md:block">
                    <img src="{{ asset('images/logoINSTI 1.png') }}" alt="Logo INSTI" class="w-16 h-16">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation principale -->
    <nav class="bg-blue-800 shadow-inner">
        <div class="container mx-auto px-4">
            <!-- Bouton menu mobile -->
            <button id="menuToggle" class="md:hidden w-full text-left py-3 px-4 bg-blue-700 hover:bg-blue-600 rounded-lg flex items-center justify-between">
                <span class="font-semibold">☰ Menu</span>
                <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            
            <!-- Menu navigation -->
            <div id="navMenu" class="hidden md:flex flex-col md:flex-row justify-center space-y-1 md:space-y-0 md:space-x-1 py-2">
                @include('components.dropdown-menu')
            </div>
        </div>
    </nav>
</header>