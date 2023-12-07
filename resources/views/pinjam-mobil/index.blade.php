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
                Peminjaman Mobil</li>
        </ul>
    </div>
    <div class="xl:col-span-6 col-span-12">
        <div class="space-y-6">

            <!-- BEGIN: Products -->


            <div class="grid md:grid-cols-3 grid-cols-1 gap-5">

                @foreach ($cars as $car)
                    <div class="card rounded-md bg-white dark:bg-slate-800  shadow-base">
                        <div class="card-body flex flex-col p-6 active">
                            {{-- <div class="image-box order-0 -mx-6 -mt-6 mb-6"> <img src="/images/all-img/post-1.png"
                                    alt="" class="block w-full h-full object-cover"> </div> --}}
                            <div class="order-2 card-text h-full menu-open active">
                                <div class="flex justify-between mb-4">
                                    <div>
                                        <div class="text-xs	text-slate-900 dark:text-slate-300 uppercase font-normal">
                                            {{ $car->brand }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-slate-900 dark:text-slate-300 text-base	font-medium	mt-2 truncate">
                                        {{ $car->model }}
                                    </div>

                                    <div
                                        class="text-slate-500 dark:text-slate-500  text-[11px] uppercase font-normal mt-1.5">
                                        {{ $car->plate_number }}
                                    </div>
                                </div>
                                <div class="card-text mt-4 menu-open">
                                    <div
                                        class="text-slate-900 dark:text-slate-300 text-base	font-medium mt-2	 ltr:mr-2 rtl:mr-2">
                                        Rp {{ number_format($car->rental_rate_per_day, 0, ',', '.') }}/hari
                                    </div>
                                    {{-- <div class="mt-4 space-x-4 rtl:space-x-reverse"> <a href="/sewa/{{ $car->id }}"
                                            class="btn flex justify-center bg-slate-900 text-slate-50 dark:bg-slate-900 dark:text-slate-300 active">
                                            Sewa</a>
                                    </div> --}}
                                    <div class="mt-4 space-x-4 rtl:space-x-reverse">
                                        <button data-bs-toggle="modal" data-bs-target="#form_modal"
                                            data-car-id="{{ $car->id }}" data-car-model="{{ $car->model }}"
                                            data-rental-rate-per-day="{{ $car->rental_rate_per_day }}"
                                            class="btn inline-flex justify-center block-btn bg-slate-900 text-slate-50 dark:bg-slate-900 dark:text-slate-300 capitalize btn-modal-trigger">
                                            Sewa Mobil
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Product -->

            <!-- Form Modal Area Start -->
            <div id="form_modal" tabindex="-1" aria-labelledby="form_modal" aria-hidden="true"
                class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto">
                <div class="modal-dialog modal-md relative w-auto pointer-events-none">
                    <div
                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div class="relative w-full h-full max-w-xl md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                    <h3 id="model-sewa" class="text-xl font-medium text-white dark:text-white capitalize">
                                        Sewa Mobil
                                    </h3>
                                    <button type="button"
                                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex
                    items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                        data-bs-dismiss="modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                                                                                                                                                                11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div>
                                    <form>
                                        <div class="p-6 space-y-6">
                                            <div>
                                                <label for="disabled-range-picker" class="form-label">Masukkan
                                                    rentang tanggal sewa</label>
                                                <input class="form-control py-2 flatpickr flatpickr-input active"
                                                    id="disabled-range-picker" value="" type="text"
                                                    readonly="readonly">
                                            </div>
                                            <div>
                                                <div
                                                    class="text-slate-900 dark:text-slate-300 text-base font-medium mt-2 truncate">
                                                    Harga</div>
                                                <div id="harga-sewa"
                                                    class="text-slate-500 dark:text-slate-500 text-[11px] font-normal mt-2">
                                                    Rp 0</div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                            <button data-bs-dismiss="modal" type="button"
                                                class="btn inline-flex justify-center btn-outline-dark">Close</button>

                                            <button id="sewa-button" data-bs-dismiss="modal" type="button"
                                                class="btn inline-flex justify-center text-white bg-black-500">
                                                Sewa
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form Modal Area End -->
        </div>
    </div>
@endsection
