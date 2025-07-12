
<div class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col p-2 md:p-4 lg:p-6">

    <main
        class="mx-auto flex w-full flex-auto flex-col sm:max-w-2xl sm:rounded-xl md:max-w-3xl lg:max-w-5xl xl:max-w-7xl"
    >
        <h2 class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#FF4D30] mt-10 mb-4 ml-2">
            Admin Dashboard
        </h2>
        <div class="container mx-auto lg:p-8 xl:max-w-7xl">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 gap-6"
            >

                <a
                    href="{{ route('admin.all-products') }}"
                    wire:navigate
                    class="col-span-1 md:col-span-3 lg:col-span-4 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dt class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">{{ $products_count }}</dt>
                            <dd class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">Products</dd>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >
                            <svg viewBox="0 0 24 24" fill="none" class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17.5777 4.43152L15.5777 3.38197C13.8221 2.46066 12.9443 2 12 2C11.0557 2 10.1779 2.46066 8.42229 3.38197L6.42229 4.43152C4.64855 5.36234 3.6059 5.9095 2.95969 6.64132L12 11.1615L21.0403 6.64132C20.3941 5.9095 19.3515 5.36234 17.5777 4.43152Z" fill="#0D1B2A"></path> <path d="M21.7484 7.96435L12.75 12.4635V21.904C13.4679 21.7252 14.2848 21.2965 15.5777 20.618L17.5777 19.5685C19.7294 18.4393 20.8052 17.8748 21.4026 16.8603C22 15.8458 22 14.5833 22 12.0585V11.9415C22 10.0489 22 8.86558 21.7484 7.96435Z" fill="#0D1B2A"></path> <path d="M11.25 21.904V12.4635L2.25164 7.96434C2 8.86557 2 10.0489 2 11.9415V12.0585C2 14.5833 2 15.8458 2.5974 16.8603C3.19479 17.8748 4.27063 18.4393 6.42229 19.5685L8.42229 20.618C9.71524 21.2965 10.5321 21.7252 11.25 21.904Z" fill="#0D1B2A"></path> </g></svg>
                        </div>
                    </div>
                </a>

                <a
                    href="{{ route('admin.brands') }}"
                    wire:navigate
                    class="col-span-1 md:col-span-3 lg:col-span-4 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dt class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">{{ $brands_count }}</dt>
                            <dd class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">Brands</dd>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >
                            <svg viewBox="0 0 24 24" class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" id="meteor-icon-kit__solid-products" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 7H21C22.6569 7 24 8.34315 24 10V21C24 22.6569 22.6569 24 21 24H10C8.34315 24 7 22.6569 7 21V10C7 8.34315 8.34315 7 10 7ZM17 5H10C7.23858 5 5 7.23858 5 10V17H3C1.34315 17 0 15.6569 0 14V3C0 1.34315 1.34315 0 3 0H14C15.6569 0 17 1.34315 17 3V5Z" fill="#0D1B2A"></path></g></svg>
                        </div>
                    </div>
                </a>

                <a
                    href="{{ route('admin.categories') }}"
                    wire:navigate
                    class="col-span-1 md:col-span-3 lg:col-span-4 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dt class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">{{ $categories_count }}</dt>
                            <dd class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#0D1B2A]">Categories</dd>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >
                            <svg viewBox="0 0 24 24" class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M2 6.47762C2 5.1008 2 4.4124 2.22168 3.86821C2.52645 3.12007 3.12007 2.52645 3.86821 2.22168C4.4124 2 5.1008 2 6.47762 2V2C7.85443 2 8.54284 2 9.08702 2.22168C9.83517 2.52645 10.4288 3.12007 10.7336 3.86821C10.9552 4.4124 10.9552 5.1008 10.9552 6.47762V6.47762C10.9552 7.85443 10.9552 8.54284 10.7336 9.08702C10.4288 9.83517 9.83517 10.4288 9.08702 10.7336C8.54284 10.9552 7.85443 10.9552 6.47762 10.9552V10.9552C5.1008 10.9552 4.4124 10.9552 3.86821 10.7336C3.12007 10.4288 2.52645 9.83517 2.22168 9.08702C2 8.54284 2 7.85443 2 6.47762V6.47762Z" fill="#0D1B2A"></path><path d="M2 17.5224C2 16.1456 2 15.4572 2.22168 14.913C2.52645 14.1649 3.12007 13.5712 3.86821 13.2665C4.4124 13.0448 5.1008 13.0448 6.47762 13.0448V13.0448C7.85443 13.0448 8.54284 13.0448 9.08702 13.2665C9.83517 13.5712 10.4288 14.1649 10.7336 14.913C10.9552 15.4572 10.9552 16.1456 10.9552 17.5224V17.5224C10.9552 18.8992 10.9552 19.5876 10.7336 20.1318C10.4288 20.88 9.83517 21.4736 9.08702 21.7783C8.54284 22 7.85443 22 6.47762 22V22C5.1008 22 4.4124 22 3.86821 21.7783C3.12007 21.4736 2.52645 20.88 2.22168 20.1318C2 19.5876 2 18.8992 2 17.5224V17.5224Z" fill="#0D1B2A"></path><path d="M13.0449 17.5224C13.0449 16.1456 13.0449 15.4572 13.2666 14.913C13.5714 14.1649 14.165 13.5712 14.9131 13.2665C15.4573 13.0448 16.1457 13.0448 17.5225 13.0448V13.0448C18.8994 13.0448 19.5878 13.0448 20.1319 13.2665C20.8801 13.5712 21.4737 14.1649 21.7785 14.913C22.0002 15.4572 22.0002 16.1456 22.0002 17.5224V17.5224C22.0002 18.8992 22.0002 19.5876 21.7785 20.1318C21.4737 20.88 20.8801 21.4736 20.1319 21.7783C19.5878 22 18.8994 22 17.5225 22V22C16.1457 22 15.4573 22 14.9131 21.7783C14.165 21.4736 13.5714 20.88 13.2666 20.1318C13.0449 19.5876 13.0449 18.8992 13.0449 17.5224V17.5224Z" fill="#0D1B2A"></path><path clip-rule="evenodd" d="M16.7725 9.47766C16.7725 9.89187 17.1082 10.2277 17.5225 10.2277C17.9367 10.2277 18.2725 9.89187 18.2725 9.47766V7.22766H20.5225C20.9367 7.22766 21.2725 6.89187 21.2725 6.47766C21.2725 6.06345 20.9367 5.72766 20.5225 5.72766H18.2725V3.47766C18.2725 3.06345 17.9367 2.72766 17.5225 2.72766C17.1082 2.72766 16.7725 3.06345 16.7725 3.47766L16.7725 5.72766H14.5225C14.1082 5.72766 13.7725 6.06345 13.7725 6.47766C13.7725 6.89187 14.1082 7.22766 14.5225 7.22766H16.7725L16.7725 9.47766Z" fill="#0D1B2A" fill-rule="evenodd"></path></g></svg>
                        </div>
                    </div>
                </a>

                <a
                    href="{{ route('admin.users') }}"
                    wire:navigate
                    class="col-span-1 sm:col-span-2 md:col-span-6 lg:col-span-6 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dt class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#FF4D30]">{{ $users_count }}</dt>
                            <dd class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#FF4D30]">Users</dd>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >
                            <svg fill="#FF4D30" class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 35.695 35.695" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M11.558,10.767c0-3.473,2.815-6.29,6.289-6.29c3.476,0,6.289,2.817,6.289,6.29c0,3.475-2.813,6.29-6.289,6.29 C14.373,17.057,11.558,14.243,11.558,10.767z M35.667,22.607l-0.879-5.27c-0.158-0.954-0.961-1.754-1.896-1.984 c-0.836,0.74-1.932,1.191-3.136,1.191c-1.203,0-2.3-0.452-3.135-1.191c-0.938,0.229-1.739,1.03-1.897,1.984l-0.021,0.124 c-0.522-0.503-1.17-0.881-1.868-1.052c-1.33,1.176-3.072,1.896-4.987,1.896s-3.657-0.72-4.987-1.896 c-0.698,0.171-1.346,0.549-1.868,1.052l-0.021-0.124c-0.158-0.954-0.962-1.754-1.897-1.984c-0.835,0.74-1.932,1.191-3.135,1.191 c-1.204,0-2.3-0.452-3.136-1.191c-0.936,0.229-1.738,1.03-1.896,1.984l-0.879,5.27c-0.189,1.131,0.596,2.057,1.741,2.057h7.222 l-0.548,3.283c-0.3,1.799,0.948,3.271,2.771,3.271H24.48c1.823,0,3.071-1.475,2.771-3.271l-0.548-3.283h7.222 C35.071,24.662,35.855,23.738,35.667,22.607z M29.755,15.762c2.184,0,3.954-1.77,3.954-3.954c0-2.183-1.771-3.954-3.954-3.954 s-3.953,1.771-3.953,3.954C25.802,13.992,27.574,15.762,29.755,15.762z M5.938,15.762c2.183,0,3.953-1.77,3.953-3.954 c0-2.183-1.771-3.954-3.953-3.954c-2.184,0-3.954,1.771-3.954,3.954C1.984,13.992,3.755,15.762,5.938,15.762z"></path> </g> </g></svg>
                        </div>
                    </div>
                </a>

                <a
                    href="{{ route('admin.admins') }}"
                    wire:navigate
                    class="col-span-1 sm:col-span-2 md:col-span-6 lg:col-span-6 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dt class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#FF4D30]">{{ $admins_count }}</dt>
                            <dd class="xl:text-2xl lg:text-xl md:text-lg sm:text-base text-sm font-semibold text-[#FF4D30]">Admins</dd>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >
                            <svg fill="#FF4D30" class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 218.582 218.582" xml:space="preserve" stroke="#FF4D30"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M160.798,64.543c-1.211-1.869-2.679-3.143-4.046-4.005c-0.007-2.32-0.16-5.601-0.712-9.385 c0.373-4.515,1.676-29.376-13.535-40.585C133.123,3.654,122.676,0,112.294,0c-8.438,0-16.474,2.398-22.629,6.752 c-5.543,3.922-8.596,8.188-10.212,11.191c-4.78,0.169-14.683,2.118-19.063,14.745c-4.144,11.944-0.798,19.323,1.663,22.743 c-0.161,1.978-0.219,3.717-0.223,5.106c-1.367,0.862-2.835,2.136-4.046,4.005c-2.74,4.229-3.206,9.9-1.386,16.859 c3.403,13.012,11.344,15.876,15.581,16.451c2.61,5.218,8.346,15.882,14.086,21.24c2.293,2.14,5.274,3.946,8.86,5.37 c4.577,1.816,9.411,2.737,14.366,2.737s9.789-0.921,14.366-2.737c3.586-1.424,6.567-3.23,8.86-5.37 c5.74-5.358,11.476-16.022,14.086-21.24c4.236-0.575,12.177-3.44,15.581-16.452C164.004,74.443,163.538,68.771,160.798,64.543z M152.509,78.871c-2.074,7.932-5.781,9.116-7.807,9.116c-0.144,0-0.252-0.008-0.316-0.013c-2.314-0.585-4.454,0.631-5.466,2.808 c-1.98,4.256-8.218,16.326-13.226,21.001c-1.377,1.285-3.304,2.425-5.726,3.386c-6.796,2.697-14.559,2.697-21.354,0 c-2.422-0.961-4.349-2.101-5.726-3.386c-5.008-4.675-11.246-16.745-13.226-21.001c-0.842-1.81-2.461-2.953-4.314-2.953 c-0.376,0-0.762,0.047-1.153,0.146c-0.064,0.006-0.172,0.013-0.315,0.013c-2.025,0-5.732-1.185-7.807-9.115 c-1.021-3.903-1.012-7.016,0.024-8.764c0.603-1.016,1.459-1.358,1.739-1.446c2.683-0.291,4.299-2.64,4.075-5.347 c-0.005-0.066-0.18-2.39,0.042-5.927c3.441-1.479,8.939-4.396,13.574-9.402c2.359-2.549,4.085-5.672,5.314-8.537 c3.351,2.736,8.095,5.951,14.372,8.729c10.751,4.758,32.237,7.021,41.307,7.794c0.375,4.317,0.156,7.263,0.15,7.333 c-0.236,2.715,1.383,5.066,4.075,5.357c0.28,0.088,1.136,0.431,1.739,1.446C153.521,71.856,153.53,74.969,152.509,78.871z M184.573,145.65l-43.715-17.485c-1.258-0.502-2.665-0.473-3.903,0.08c-1.236,0.555-2.195,1.588-2.655,2.862l-10.989,30.382 l-2.176-6.256l3.462-8.463c0.63-1.542,0.452-3.297-0.477-4.681c-0.929-1.383-2.485-2.213-4.151-2.213H98.614 c-1.666,0-3.223,0.83-4.151,2.213c-0.929,1.384-1.107,3.139-0.477,4.681l3.462,8.463l-2.176,6.256l-10.989-30.382 c-0.46-1.274-1.419-2.308-2.655-2.862c-1.238-0.554-2.646-0.583-3.903-0.08L34.009,145.65 c-13.424,5.369-22.098,18.182-22.098,32.641v35.291c0,2.762,2.239,5,5,5h184.76c2.761,0,5-2.238,5-5v-35.291 C206.671,163.832,197.997,151.02,184.573,145.65z M183.054,192.718c0,2.762-2.239,5-5,5h-33.57c-2.761,0-5-2.238-5-5v-15.59 c0-2.762,2.239-5,5-5h33.57c2.761,0,5,2.238,5,5V192.718z"></path> </g></svg>
                        </div>
                    </div>
                </a>


                <div
                    class="col-span-1 sm:col-span-2 md:col-span-12 lg:col-span-6 flex flex-col rounded-lg border border-zinc-200 bg-white hover:bg-zinc-50/50"
                >
                    <div class="flex grow items-center justify-between p-5">
                        <dl class="flex items-center justify-center gap-3">
                            <dd class="xl:text-3xl lg:text-2xl sm:text-lg text-base font-bold text-[#0D1B2A]">Total Sales: </dd>
                            <dt class="xl:text-5xl lg:text-3xl md:text-xl text-lg font-bold text-[#0D1B2A]">${{ $total_sales }}</dt>
                        </dl>
                        <div
                            class="flex items-center text-sm font-medium"
                        >

                            <svg class="xl:w-15 xl:h-15 lg:w-12 lg:h-12 md:w-10 md:h-10 sm:w-8 sm:h-8 w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 244.948 244.948" xml:space="preserve" fill="#0D1B2A"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path style="fill:#0D1B2A;" d="M122.474,0C54.948,0,0.008,54.951,0.008,122.477s54.94,122.471,122.466,122.471 S244.94,189.997,244.94,122.471S190,0,122.474,0z M122.474,222.213c-55.005,0-99.752-44.742-99.752-99.742 c0-55.011,44.747-99.752,99.752-99.752s99.752,44.742,99.752,99.752C222.221,177.477,177.479,222.213,122.474,222.213z"></path> <g> <path style="fill:#0D1B2A;" d="M113.739,180.659c-6.092-0.228-11.438-0.881-16.023-1.958c-4.596-1.093-8.175-2.35-10.742-3.758 l6.255-18.324c1.92,1.175,4.618,2.295,8.088,3.361c3.47,1.061,7.615,1.822,12.423,2.252v-32.547 c-3.312-1.485-6.598-3.144-9.856-4.966c-3.258-1.817-6.168-3.998-8.735-6.57c-2.567-2.562-4.629-5.624-6.173-9.208 c-1.545-3.584-2.322-7.821-2.322-12.744c0-9.192,2.431-16.323,7.294-21.403c4.857-5.069,11.46-8.354,19.793-9.85V50.344h16.671 v13.951c4.699,0.31,8.817,0.946,12.341,1.909c3.525,0.946,6.783,2.067,9.774,3.329l-5.771,17.672 c-1.817-0.848-4.112-1.702-6.891-2.562c-2.779-0.848-5.929-1.485-9.459-1.92v30.122c3.312,1.501,6.652,3.182,10.019,5.047 c3.361,1.882,6.353,4.096,8.974,6.652c2.616,2.578,4.754,5.586,6.413,9.067c1.653,3.481,2.486,7.604,2.486,12.417 c0,9.839-2.486,17.497-7.457,23.002c-4.966,5.504-11.776,9.045-20.429,10.644v14.914h-16.671L113.739,180.659L113.739,180.659z M107.484,94.341c0,3.225,1.251,5.918,3.764,8.055c2.513,2.148,5.64,4.15,9.382,5.978v-26.14c-5.026,0.228-8.48,1.458-10.34,3.72 C108.42,88.205,107.484,91.006,107.484,94.341z M137.459,148.274c0-3.389-1.36-6.162-4.085-8.316 c-2.725-2.159-6.01-4.145-9.861-5.945v28.218c4.705-0.538,8.202-2.012,10.503-4.438 C136.311,155.361,137.459,152.19,137.459,148.274z"></path> </g> </g> </g> </g></svg>
                        </div>
                    </div>
                </div>


                <div
                    class="flex flex-col rounded-lg border border-zinc-200 bg-white sm:col-span-2 md:col-span-12 lg:col-span-12"
                >
                    <div
                        class="flex items-center justify-between border-b border-zinc-100 p-5 text-center flex-row sm:text-start"
                    >
                        <div>
                            <h2 class="mb-0.5 font-semibold text-[#0D1B2A]">Recent Orders</h2>
                        </div>

                        <div>
                            <a
                                href="{{ route('admin.orders') }}"
                                class="inline-flex items-center justify-center gap-1.5 rounded-lg hover:bg-[#F53003] bg-[#FF4D30] text-white px-3 py-2 text-sm leading-5 font-semibold"
                            >
                                <span>View All -></span>
                            </a>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="min-w-full overflow-x-auto rounded-sm">
                            <table class="min-w-full align-middle text-sm">
                                <thead>
                                <tr class="border-b-2 border-zinc-100">
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
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                                    >
                                        Total Price
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                                    >
                                        Order Details
                                    </th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($orders as $order)
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
                                                <p
                                                    @class([
                                                        'bg-red-600' => $order->payment_status === 'Pending',
                                                        'bg-green-600' => $order->payment_status === 'Paid',
                                                        'border-2 rounded text-white text-center rounded-lg px-2 py-1 cursor-pointer' => true
                                                    ])
                                                >
                                                    {{ $order->payment_status }}
                                                </p>
                                            </div>
                                        </td>

                                        <td
                                            class="px-6 py-4 text-sm font-semibold"
                                        >
                                            <div>
                                                <p
                                                    @class([
                                                        'bg-red-600' => $order->status === 'Pending',
                                                        'bg-amber-600' => $order->status === 'Delivering',
                                                        'bg-green-600' => $order->status === 'Delivered',
                                                        'border-2 rounded text-white text-center rounded-lg px-2 py-1 cursor-pointer' => true
                                                    ])
                                                >
                                                    {{ $order->status }}
                                                </p>
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

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</div>

