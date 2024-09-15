<form method="POST" action="{{route('profile.password.update')}}">
    @csrf
    @method('PATCH')
    <div class="block md:grid space-y-4 md:space-y-0 md:grid-cols-2 gap-4">
        <div class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-ui.input name="current_password" label="Current password" type="password"/>
        </div>
        <x-ui.input name="new_password" label="New Password" type="password"/>
        <x-ui.input name="new_password_confirmation" type="password" label="Confirm New Password"/>
    </div>
    <x-ui.button type="submit" class="mt-4">Update password</x-ui.button>
</form>
