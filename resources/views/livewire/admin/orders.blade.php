<div class="flex-1 flex" >
    <main class="flex-1 overflow-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-[#FF4D30]">
                    All Orders
                </h2>

                <div class="flex items-center space-x-4">

                    <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer">
                        <select
                            wire:model.live="payment_status"
                            class="block py-2.5 px-0 w-full min-w-50 text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                        >
                            <option value="" selected class="font-bold">
                                Payment Status
                            </option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                        </select>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </div>


                    <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer">
                        <select
                            wire:model.live="status"
                            class="block py-2.5 px-0 w-full min-w-50 text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                        >
                            <option selected class="font-bold">
                                Order Status
                            </option>
                            <option value="pending">Pending</option>
                            <option value="delivering">Delivering</option>
                            <option value="delivered">Delivered</option>
                        </select>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </div>

                    <button
                        wire:click="resetFilters"
                        @disabled(!($this->payment_status || $this->status))
                        class="text-base px-3 py-2 rounded-lg cursor-pointer transition text-white bg-[#0D1B2A] hover:bg-slate-900 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Reset Filters
                    </button>

                </div>
            </div>

            <div class="my-4">
                {{$orders->links()}}
            </div>

            <div
                x-data="{ selected: null }"
                class="bg-gray-200 border border-[#0D1B2A] rounded-lg overflow-x-scroll xl:overflow-x-hidden overflow-y-hidden"
            >
                <table class="w-full">
                    <thead class="border-b border-[#0D1B2A]">
                        <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Order ID
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Name
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Phone Number
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Email
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Address
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Date
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Payment Method
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Payment Status
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Order Status
                        </th>

                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Order Details
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700">
                    @forelse($orders as $order)
                        <tr
                            class="hover:bg-gray-300 transition-colors"
                        >

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                #{{ $order->id }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $order->user->name }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                <a
                                    href="https://wa.me/{{ preg_replace('/\D+/', '', $order->user->phone_number) }}"
                                    target="_blank"
                                    class="text-[#0D1B2A] rounded-lg hover:underline hover:text-[#FF4D30]"
                                >
                                    {{ $order->user->phone_number }}
                                </a>

                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ Str::limit($order->user->email, 30) }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $order->address['city'] }} , {{ $order->address['street'] }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $order->created_at->toDateString() }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $order->payment_method }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm font-semibold"
                            >
                                <div x-data="{ paymentStatus: '{{ $order->payment_status }}' }">
                                    <select
                                        x-model="paymentStatus"
                                        @change="$wire.updatePaymentStatus({{ $order->id }}, paymentStatus)"
                                        :class="{
                                                    'text-red-600': paymentStatus === 'Pending',
                                                    'text-green-600': paymentStatus === 'Paid',
                                                    'border-2 rounded px-2 py-1 cursor-pointer': true
                                                }"
                                    >
                                        <option value="Pending">Pending</option>
                                        <option value="Paid">Paid</option>
                                    </select>
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm font-semibold"
                            >
                                <div x-data="{ status: '{{ $order->status }}' }">
                                    <select
                                        x-model="status"
                                        @change="$wire.updateOrderStatus({{ $order->id }}, status)"
                                        :class="{
                                                    'text-red-600': status === 'Pending',
                                                    'text-amber-600': status === 'Delivering',
                                                    'text-green-600': status === 'Delivered',
                                                    'border-2 rounded px-2 py-1 cursor-pointer': true
                                                }"
                                >
                                    <option
                                        value="Pending"
                                        @if($order->status === 'Pending')
                                            selected
                                        @endif
                                        class="text-red-600"
                                    >
                                        Pending
                                    </option>

                                    <option
                                        value="Delivering"
                                        @if($order->status === 'Delivering')
                                            selected
                                        @endif
                                        class="text-amber-600"
                                    >
                                        Delivering
                                    </option>

                                    <option
                                        value="Delivered"
                                        @if($order->status === 'Delivered')
                                            selected
                                        @endif
                                        class="text-green-600"
                                    >
                                        Delivered
                                    </option>


                                </select>
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm font-semibold"
                            >
                                <a
                                    href="{{ route('order', $order) }}"
                                    wire:navigate
                                    class="px-4 py-2 text-white bg-[#0D1B2A] rounded-lg hover:bg-slate-900"
                                >
                                    Details
                                </a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-4 text-sm text-center text-[#0D1B2A] font-semibold">
                                No orders found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

            </div>

            <div class="my-4">
                {{$orders->links()}}
            </div>
        </div>
    </main>
</div>







