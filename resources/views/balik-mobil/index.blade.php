@extends('layouts.app')

@section('content')
    <!-- BEGIN: Breadcrumb -->
    <div class="mb-5">
        <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                <a href="index.html">
                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
            </li>
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Pengembalian Mobil</li>
        </ul>
    </div>
    <div class="xl:col-span-6 col-span-12">
        <div class="space-y-6">

            <!-- BEGIN: Products -->


            <div class="grid md:grid-cols-3 grid-cols-1 gap-5">

                @foreach ($rentals as $rental)
                    <div class="card rounded-md bg-white dark:bg-slate-800  shadow-base">
                        <div class="card-body flex flex-col p-6 active">
                            {{-- <div class="image-box order-0 -mx-6 -mt-6 mb-6"> <img src="/images/all-img/post-1.png"
                                    alt="" class="block w-full h-full object-cover"> </div> --}}
                            <div class="order-2 card-text h-full menu-open active">
                                <div class="flex justify-between mb-4">
                                    <div>
                                        <div class="text-xs	text-slate-900 dark:text-slate-300 uppercase font-normal">
                                            {{ $rental->car->brand }}
                                        </div>
                                    </div>
                                    <a
                                        class="inline-flex leading-5 text-slate-500 dark:text-slate-400 text-sm font-normal active">
                                        <iconify-icon class="text-secondary-500 ltr:mr-2 rtl:ml-2 text-lg"
                                            icon="heroicons-outline:calendar"></iconify-icon> {{ $rental->start_date }} </a>
                                </div>
                                <div>
                                    <div class="text-slate-900 dark:text-slate-300 text-base	font-medium	mt-2 truncate">
                                        {{ $rental->car->model }}
                                    </div>

                                    <div
                                        class="text-slate-500 dark:text-slate-500  text-[11px] uppercase font-normal mt-1.5">
                                        {{ $rental->car->plate_number }}
                                    </div>
                                </div>
                                <div class="card-text mt-4 menu-open">
                                    <div
                                        class="text-slate-900 dark:text-slate-300 text-base	font-medium mt-2	 ltr:mr-2 rtl:mr-2">
                                        Rp {{ number_format($rental->car->rental_rate_per_day, 0, ',', '.') }}/hari
                                    </div>
                                    <div class="mt-4 space-x-4 rtl:space-x-reverse"> <a href="/balik/{{ $rental->id }}"
                                            class="btn flex justify-center bg-slate-900 text-slate-50 dark:bg-slate-900 dark:text-slate-300 active">
                                            Balikin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Product -->
        </div>
    </div>
@endsection
