<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit"
            class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
        Logout
    </button>
</form>
