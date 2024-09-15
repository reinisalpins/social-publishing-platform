<header class="w-full text-gray-700 bg-white">
    <div class="flex px-4 max-w-[1440px] flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{route('posts.index')}}"
               class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">Social Publishing Platform</span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <a href="{{route('posts.index')}}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Feed</a>
                @foreach($categories as $category)
                    <a href="{{ route('posts.category', $category->slug) }}"
                       class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">
                        {{ $category->getName() }}
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
            <a href="{{route('profile.index')}}"
               class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                Profile
            </a>
            <a href="{{route('posts.manage')}}"
               class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                Manage posts
            </a>
            @include('partials.forms.auth.logout')
        </div>
    </div>
</header>
