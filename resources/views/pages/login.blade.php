<x-layouts.guest>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <x-forms.login-form/>
            @if($errors->any())
                <x-ui.alert class="mt-5" type="error">
                    <x-slot:title>
                        There were some errors
                    </x-slot:title>
                    <ul class="flex flex-col gap-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-ui.alert>
            @endif
        </div>
    </div>
</x-layouts.guest>
