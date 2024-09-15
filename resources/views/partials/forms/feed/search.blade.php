<form class="border-neutral-300 rounded-md mb-10 max-w-xl relative" method="GET" action="{{ route('posts.search') }}">
    <div class="flex flex-col gap-4">
        <div class="flex gap-4 items-center justify-center">
            <x-ui.input
                name="term"
                placeholder="Search Posts"
                class="text flex-1"
                value="{{ old('term', request('term')) }}"
            />
            <x-ui.button type="submit" class="px-10">
                Search
            </x-ui.button>
        </div>
        @error('term')
        <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror
    </div>
</form>
