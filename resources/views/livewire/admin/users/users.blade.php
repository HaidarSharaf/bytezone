<div class="flex-1 flex" >
    <main class="flex-1 overflow-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-[#FF4D30]">
                    All Users
                </h2>
            </div>

            <div class="flex items-center justify-evenly mb-6 flex-wrap gap-3">

                <div class="flex items-center space-x-2">
                    <label class="text-[#0D1B2A] sm:text-base text-sm font-semibold">Search:</label>
                    <input
                        wire:model.live="text"
                        type="text"
                        class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 sm:py-2 py-1 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                    />
                </div>

                <div>

                    <button @class([
                        "text-white bg-[#0D1B2A] p-2 rounded-lg cursor-pointer",
                        'bg-red-600' => $showRestricted,
                        'bg-red-300' => !$showRestricted
                    ])
                            wire:click="toggleRestricted"
                    >
                        Restricted Users
                    </button>

                </div>

                <button
                    wire:click="resetFilters"
                    @disabled(!($this->text || $this->showRestricted === true))
                    class="text-base px-3 py-2 rounded-lg cursor-pointer transition text-white bg-[#0D1B2A] hover:bg-slate-900 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Reset Filters
                </button>
            </div>


            <div class="my-4">
                {{$users->links()}}
            </div>

            <div
                x-data="{ selected: null, selectedUser: null }"
                class="bg-gray-200 border border-[#0D1B2A] rounded-lg overflow-x-scroll lg:overflow-x-hidden overflow-y-hidden"
            >
                <table
                    class="w-full"
                >
                    <thead class="border-b border-[#0D1B2A]">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Email
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Phone Number
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Restrict
                        </th>
                    </tr>
                    </thead>

                    <tbody
                        class="divide-y divide-gray-700"
                    >
                    @forelse($users as $user)
                        <tr
                            class="hover:bg-gray-300 transition-colors"
                            wire:key="{{ $user->id }}"
                        >
                            <td class="px-6 py-4 whitespace-nowrap flex items-center gap-2">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded">
                                        <img src=" {{ asset('storage/avatars/' . $user->avatar) }}">
                                    </div>
                                </div>
                                <span class="text-base text-[#0D1B2A] font-semibold">{{ $user->name }}</span>
                            </td>

                            <td
                                class="px-6 py-4 text-base text-[#0D1B2A] font-semibold"
                            >
                                {{ Str::limit($user->email, 30) }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                <a
                                    href="https://wa.me/{{ preg_replace('/\D+/', '', $user->phone_number) }}"
                                    target="_blank"
                                    class="px-4 py-2 text-[#0D1B2A] rounded-lg hover:underline hover:text-[#FF4D30]"
                                >
                                    {{ $user->phone_number }}
                                </a>
                            </td>


                            <td
                                    class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                                >
                                    <button
                                        @click="selected = {{ $user->id }}, selectedUser = @js($user)"
                                        @class([
                                            'px-4 py-2 text-white rounded-lg cursor-pointer',
                                            'bg-green-600 hover:bg-green-700' => $user->deleted_at,
                                            'bg-red-600 hover:bg-red-700' => $user->deleted_at === null
                                        ])
                                    >
                                        {{ $user->deleted_at ? 'Restore' : 'Restrict' }}
                                    </button>
                                </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div
                    x-show="selected !== null"
                    x-transition.opacity
                    x-cloak
                    class="fixed inset-0 bg-white/30 backdrop-blur-md z-40"
                ></div>

                <div
                    x-show="selected !== null"
                    x-cloak
                    x-transition
                    class="overflow-y-auto overflow-x-hidden fixed z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm">
                            <button
                                type="button"
                                @click="selected = null"
                                class="absolute top-3 end-2.5 text-[#0D1B2A] bg-transparent cursor-pointer hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            >
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>

                            <div class="p-4 md:p-5 text-center">
                                <svg
                                    :class="
                                        selectedUser?.deleted_at
                                            ? 'text-green-500'
                                            : 'text-red-500'
                                    "
                                    class="mx-auto mb-4 w-12 h-12"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>

                                <h3
                                    class="mb-5 text-lg font-semibold text-[#0D1B2A]"
                                >
                                    <template x-if="selectedUser?.deleted_at !== null">
                                        <span>Are you sure you want to restore this user?</span>
                                    </template>

                                    <template x-if="selectedUser?.deleted_at === null">
                                        <span>Are you sure you want to restrict this user?</span>
                                    </template>
                                </h3>

                                <button
                                    type="button"
                                    @click="
                                            if(selectedUser?.deleted_at !== null)
                                                $wire.restoreUser(selected);
                                            else
                                                $wire.restrictUser(selected);
                                            selected = null;
                                            selectedUser = null;
                                        "
                                    :class="selectedUser?.deleted_at
                                                ? 'bg-green-600 hover:bg-green-700 focus:ring-green-300'
                                                : 'bg-red-600 hover:bg-red-700 focus:ring-red-300'
                                            "
                                    class="text-white focus:ring-4 cursor-pointer focus:outline-none font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                >
                                    Yes, I'm sure
                                </button>

                                <button
                                    type="button"
                                    @click="selected = null"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-[#0D1B2A] cursor-pointer focus:outline-none bg-white hover:bg-gray-200 rounded-lg border border-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-100"
                                >
                                    No, cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="my-4">
                {{$users->links()}}
            </div>

        </div>
    </main>
</div>






