<aside class="border-r-2 border-slate-200 w-2xs h-dvh py-4 px-6">
    <ul>
        <li><a href="{{ route('projects.index') }}" class="{{ request()->is('projects*') ? "bg-black text-white" : "" }} flex w-full py-2 px-4 rounded-md transition-all hover:bg-zinc-800 hover:text-white">Projects</a></li>
        <li><a href="{{ route('issues.index') }}" class="{{ request()->is('issues*') ? "bg-black text-white" : "" }} flex w-full py-2 px-4 rounded-md transition-all hover:bg-zinc-800 hover:text-white">Issues</a></li>
        <li><a href="{{ route('tags.index') }}" class="{{ request()->is('tags*') ? "bg-black text-white" : "" }} flex w-full py-2 px-4 rounded-md transition-all hover:bg-zinc-800 hover:text-white">Tags</a></li>
    </ul>
</aside>
