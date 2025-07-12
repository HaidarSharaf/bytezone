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
                            wire:model.live="orders_time"
                            class="block py-2.5 px-0 w-full min-w-50 text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                        >
                            <option value="" selected class="font-bold">
                                All Orders
                            </option>
                            <option value="this_week">This Week</option>
                            <option value="this_month">This Month</option>
                        </select>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </div>

                </div>
            </div>

            <div class="my-4">
                {{$orders->links()}}
            </div>

            <div
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
                            Order Price
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
                                <div>
                                    <button
                                        @class([
                                            'bg-red-600' => $order->payment_status === 'Pending',
                                            'bg-green-600' => $order->payment_status === 'Paid',
                                            'border-2 rounded-lg px-3 py-2 text-white'
                                        ])
                                    >
                                        {{ $order->payment_status }}
                                    </button>
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm font-semibold"
                            >
                                <div>
                                    <button
                                        @class([
                                            'bg-red-600' => $order->status === 'Pending',
                                            'bg-amber-600' => $order->status === 'Delivering',
                                            'bg-green-600' => $order->status === 'Delivered',
                                            'border-2 rounded-lg px-3 py-2 text-white'
                                        ])
                                    >
                                        {{ $order->status }}
                                    </button>
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                $ {{ number_format($order->total_price, 2) }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-sm text-center text-[#0D1B2A] font-semibold">
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







