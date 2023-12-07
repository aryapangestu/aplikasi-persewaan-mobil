@extends('layouts.app')

@section('content')
    <div>
        <div class="flex justify-between flex-wrap items-center mb-6">
            <h4
                class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">
                Sewa Mobil</h4>
        </div>
        <div class="grid grid-cols-12 gap-5 mb-5">
            <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
                <div class="bg-no-repeat bg-cover bg-center p-5 rounded-[6px] relative"
                    style="background-image: url(assets/images/all-img/widget-bg-2.png)">
                    <div class="max-w-[180px]">
                        <h4 class="text-xl font-medium text-white mb-2">
                            <span class="block font-normal">Hallo,</span>
                            <span class="block">{{ Auth::user()->name }}</span>
                        </h4>
                        <p class="text-sm text-white font-normal">
                            Welcome to Dashcode
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
            <div class="xl:col-span-12 col-span-12">
                <div class="card">
                    <div class="card-header noborder">
                        <h4 class="card-title">Riwayat Sewa
                        </h4>
                    </div>
                    <div class="card-body p-6">

                        <!-- BEGIN: Order table -->


                        <div class="overflow-x-auto -mx-6">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                        <thead class=" bg-slate-200 dark:bg-slate-700">
                                            <tr>

                                                <th scope="col" class=" table-th ">
                                                    Mobil
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Tanggal Pengembalian
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Biaya Sewa
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                            @foreach ($rentals as $rental)
                                                <tr>
                                                    <td class="table-td">
                                                        <div class="flex items-center">
                                                            <div class="flex-1 text-start">
                                                                <h4
                                                                    class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                                    {{ $rental->car->model }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="table-td">{{ $rental->rentalReturn[0]->return_date }}</td>
                                                    <td class="table-td">{{ $rental->rentalReturn[0]->rental_fee }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END: Order Table -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
