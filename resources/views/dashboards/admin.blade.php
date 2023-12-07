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
                            <span class="block font-normal">SEMANGAT!!!</span>
                            <span class="block">{{ Auth::user()->name }}</span>
                        </h4>
                        <p class="text-sm text-white font-normal">
                            Welcome to Dashcode
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
