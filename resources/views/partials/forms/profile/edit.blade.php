<form action="{{route('profile.update')}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-ui.input name="name" label="Name" :value="$user->getName()"/>
        <x-ui.input name="email" label="Email" :value="old('email') ?? $user->getEmail()"/>
    </div>
    <x-ui.button type="submit" class="mt-4">Update profile information</x-ui.button>
</form>
