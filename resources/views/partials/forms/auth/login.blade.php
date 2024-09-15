<form class="space-y-6" action="{{ route('login.store') }}" method="POST">
    @csrf
    <x-ui.input
        type="email"
        name="email"
        label="Email address"
        placeholder="Email"
        value="{{ old('email') }}"
        required
    />

    <x-ui.input
        type="password"
        name="password"
        label="Password"
        placeholder="Password"
        required
    />

    <div class="flex flex-col gap-2">
        <x-ui.button type="submit">
            Sign in
        </x-ui.button>

        <span class="text-sm">
            Don't have an account? <a class="underline" href="{{route('register.index')}}">Sign Up</a>
        </span>
    </div>
</form>
