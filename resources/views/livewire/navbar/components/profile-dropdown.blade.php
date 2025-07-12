<div x-data="{ drop: false }">
    <div class="dropdown relative">
        <img
            src="{{ $profileURL }}"
            class="object-cover w-11 h-11 rounded-full cursor-pointer"
            x-on:click="drop = !drop"
        />

        <div
            class="absolute right-0 lg:w-48 max-w-32 mt-2 bg-white border border-stone-200 rounded-lg shadow-sm p-5 z-10 flex flex-col items-center gap-2"
            x-show="drop"
            x-on:click.outside="drop = false"
            x-transition.duration.500ms
        >
            <livewire:auth.logout />

        </div>

    </div>
</div>
