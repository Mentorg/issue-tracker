<header class="border-b-2 border-slate-200 flex justify-end py-2 px-6">
    <nav class="flex flex-row gap-4">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-sm font-semibold transition-all hover:text-slate-600 hover:cursor-pointer">Logout</button>
        </form>
    </nav>
</header>
