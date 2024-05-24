<nav x-data="{ open: false }" class="bg-hackerBg border-b border-hackerViolet">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/Logo LaraEduca.webp') }}" class="block h-9 w-auto" alt="Logo Lareduca" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <!-- Courses -->
                    <x-nav-link href="{{ route('courses') }}" :active="request()->routeIs('courses')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Courses') }}
                    </x-nav-link>
                    <!-- Assignments -->
                    <x-nav-link href="{{ route('assignments') }}" :active="request()->routeIs('assignments')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Assignments') }}
                    </x-nav-link>
                    <!-- Users -->
                    @if(Auth::user()->role === 'admin')
                    <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Users') }}
                    </x-nav-link>
                    @endif
                    <!-- Assignment Submissions -->
                    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'teacher')
                    <x-nav-link href="{{ route('assignment.submissions', ['assignmentId' => 1]) }}" :active="request()->routeIs('assignment.submissions')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Assignment Submissions') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('enrollments') }}" :active="request()->routeIs('enrollments')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Course Enrollments') }}
                    </x-nav-link>
                    @elseif(Auth::user()->role === 'student')
                    <x-nav-link href="{{ route('enrollments') }}" :active="request()->routeIs('enrollments')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Course Enrollments') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('games') }}" :active="request()->routeIs('games')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Games') }}
                    </x-nav-link>
                    @endif

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-hackerBlue bg-hackerBg hover:text-hackerPurple focus:outline-none focus:bg-hackerBg active:bg-hackerBg transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-hackerBlue">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="text-hackerViolet hover:text-hackerPurple">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}" class="text-hackerViolet hover:text-hackerPurple">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-hackerBlue"></div>

                                        <div class="block px-4 py-2 text-xs text-hackerBlue">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" component="responsive-nav-link" class="text-hackerViolet hover:text-hackerPurple" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-hackerPurple transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-hackerBlue bg-hackerBg hover:text-hackerPurple focus:outline-none focus:bg-hackerBg active:bg-hackerBg transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-hackerBlue">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}" class="text-hackerViolet hover:text-hackerPurple">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}" class="text-hackerViolet hover:text-hackerPurple">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-hackerBlue"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();" class="text-hackerViolet hover:text-hackerPurple">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-hackerBlue hover:text-hackerPurple hover:bg-hackerBg focus:outline-none focus:bg-hackerBg focus:text-hackerPurple transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-hackerBg">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-hackerViolet hover:text-hackerPurple">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <!-- Courses -->
            <x-responsive-nav-link href="{{ route('courses') }}" :active="request()->routeIs('courses')" class="text-hackerViolet hover:text-hackerPurple">
                {{ __('Courses') }}
            </x-responsive-nav-link>
            <!-- Assignments -->
            <x-responsive-nav-link href="{{ route('assignments') }}" :active="request()->routeIs('assignments')" class="text-hackerViolet hover:text-hackerPurple">
                {{ __('Assignments') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-hackerBlue">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-hackerViolet">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-hackerBlue">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-hackerViolet hover:text-hackerPurple">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-hackerBlue"></div>

                    <div class="block px-4 py-2 text-xs text-hackerBlue">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')" class="text-hackerViolet hover:text-hackerPurple">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')" class="text-hackerViolet hover:text-hackerPurple">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-hackerBlue"></div>

                        <div class="block px-4 py-2 text-xs text-hackerBlue">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" class="text-hackerViolet hover:text-hackerPurple" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
