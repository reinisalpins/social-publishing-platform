<x-layouts.authenticated>
    <h1 class="font-bold text-2xl mb-7">Profile</h1>

    <div class="border-b pb-[35px]">
        <h1 class="font-bold text-xl mb-7">Update profile information</h1>
        @include('partials.forms.profile.edit', ['user' => $user])
        @if($errors->profileUpdate->any())
            <x-ui.alert class="mt-5" type="error">
                <x-slot:title>
                    There were some errors with your profile update
                </x-slot:title>
                <ul class="flex flex-col gap-2">
                    @foreach ($errors->profileUpdate->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert>
        @endif
        @if(session('updateProfileSuccess'))
            <x-ui.alert type="success" title="Success" class="mt-5">
                {{session('updateProfileSuccess')}}
            </x-ui.alert>
        @endif
    </div>

    <div class="mt-[35px]">
        <h1 class="font-bold text-xl mb-7">Update password</h1>
        @include('partials.forms.profile.editPassword')
        @if($errors->passwordUpdate->any())
            <x-ui.alert class="mt-5" type="error">
                <x-slot:title>
                    There were some errors with your password update
                </x-slot:title>
                <ul class="flex flex-col gap-2">
                    @foreach ($errors->passwordUpdate->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert>
        @endif
        @if(session('updatePasswordSuccess'))
            <x-ui.alert type="success" title="Success" class="mt-5">
                {{session('updatePasswordSuccess')}}
            </x-ui.alert>
        @endif
    </div>
</x-layouts.authenticated>
