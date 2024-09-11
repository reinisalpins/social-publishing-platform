<form class="space-y-6" action="{{ route('register.submit') }}" method="POST">
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
        type="text"
        name="name"
        label="Name"
        placeholder="Name"
        value="{{ old('name') }}"
        required
    />

    <x-ui.input
        type="password"
        name="password"
        label="Password"
        placeholder="Password"
        required
    />

    <x-ui.input
        type="password"
        name="password_confirmation"
        label="Password Confirmation"
        placeholder="Password Confirmation"
        required
    />

    <div class="flex flex-col gap-2">
        <x-ui.primary-button type="submit">
            Sign Up
        </x-ui.primary-button>

        <span class="text-sm">
            Already have an account? <a class="underline" href="{{route('login')}}">Sign In</a>
        </span>
    </div>
</form>
