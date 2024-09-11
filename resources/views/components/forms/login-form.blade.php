<form class="space-y-6" action="{{ route('login.submit') }}" method="POST">
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

    <div>
        <x-ui.primary-button type="submit">
            Sign in
        </x-ui.primary-button>
    </div>
</form>
