<li>
    <a href="{{ $link }}"
        class="flex items-center rounded-xl px-4 py-3 space-x-4 {{ $active ? 'bg-gradient-to-r from-primary-bold to-primary-light text-white' : 'text-primary-extralight group' }}">
        <span class="group-hover:text-primary-bold">{{ $slot }}</span>
        <span>{{ $text }}</span>
    </a>
</li>
