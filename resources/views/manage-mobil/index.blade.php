@extends('layouts.app')

@section('content')
    <!-- BEGIN: Breadcrumb -->
    <div class="mb-5">
        <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter">
                <a href="index.html">
                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
            </li>
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Manajemen Mobil
            </li>
        </ul>
    </div>
    <!-- END: BreadCrumb -->

    <div class="space-y-5">
        <div class="card">
            <header class="card-header noborder">
                <h4 class="card-title">Manajemen Mobil</h4>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class="col-span-8 hidden"></span>
                    <span class="col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="flex-1 h-full px-5">
                            <button
                                class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1"
                                data-bs-toggle="modal" data-bs-target="#newCarModal">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                                    <span>Add Car</span>
                                </span>
                            </button>
                        </div>
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                id="data-table">
                                <thead class="border-t border-slate-100 dark:border-slate-800">
                                    <tr>
                                        <th scope="col" class="table-th">Id</th>

                                        <th scope="col" class="table-th">Brand</th>

                                        <th scope="col" class="table-th">Model</th>

                                        <th scope="col" class="table-th">
                                            Plate Number
                                        </th>

                                        <th scope="col" class="table-th">
                                            Rental Rate per Day
                                        </th>

                                        <th scope="col" class="table-th">
                                            Available
                                        </th>

                                        <th scope="col" class="table-th">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @foreach ($cars as $car)
                                        <tr>
                                            <td class="table-td">{{ $car->id }}</td>
                                            <td class="table-td">{{ $car->brand }}</td>
                                            <td class="table-td">
                                                <span class="flex">
                                                    <span
                                                        class="text-sm text-slate-600 dark:text-slate-300 capitalize">{{ $car->model }}</span>
                                                </span>
                                            </td>
                                            <td class="table-td">
                                                {{ $car->plate_number }}
                                            </td>
                                            <td class="table-td">
                                                <div>
                                                    Rp {{ number_format($car->rental_rate_per_day, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="table-td">
                                                @if ($car->available == true)
                                                    <div
                                                        class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500 bg-success-500">
                                                        Available
                                                    </div>
                                                @else
                                                    <div
                                                        class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500 bg-danger-500">
                                                        Not Available
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="table-td">
                                                <div>
                                                    <div class="relative">
                                                        <div class="dropdown relative">
                                                            <button class="text-xl text-center block w-full" type="button"
                                                                id="tableDropdownMenuButton{{ $car->id }}"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <iconify-icon
                                                                    icon="heroicons-outline:dots-vertical"></iconify-icon>
                                                            </button>
                                                            <ul
                                                                class="dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700 shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                                                <li>
                                                                    <div class="flex flex-col">
                                                                        <button
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editCarModal{{ $car->id }}">
                                                                            Edit
                                                                        </button>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <form class="flex flex-col"
                                                                        action="{{ route('manage-mobil.delete', ['id' => $car->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- modal Create --}}
                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                            id="editCarModal{{ $car->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog relative w-auto pointer-events-none">
                                                <div
                                                    class="modal-content border-none shadow-lg relative flex flex-col lg:w-[576px] w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-slate-900 dark:bg-slate-700">
                                                            <h3
                                                                class="text-base font-medium text-white dark:text-white capitalize">
                                                                Edit Car
                                                            </h3>
                                                            <button type="button"
                                                                class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                                                data-bs-dismiss="modal">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff"
                                                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                                                                                                                                                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-6 space-y-4">
                                                            <form method="POST"
                                                                action="{{ route('manage-mobil.edit', ['id' => $car->id]) }}"
                                                                class="flex flex-col space-y-3">
                                                                @method('put')
                                                                @csrf
                                                                <div class="input-area">
                                                                    <label for="brand" class="form-label">Brand</label>
                                                                    <input id="brand" name="brand" type="text"
                                                                        class="form-control" placeholder="Brand"
                                                                        value="{{ $car->brand }}" />
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="model" class="form-label">Model</label>
                                                                    <input id="model" name="model" type="text"
                                                                        class="form-control" placeholder="Model"
                                                                        value="{{ $car->model }}" />
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="plate_number" class="form-label">Plate
                                                                        Number</label>
                                                                    <input id="plate_number" name="plate_number"
                                                                        type="text" class="form-control"
                                                                        placeholder="XX 1234 XXX"
                                                                        value="{{ $car->plate_number }}" />
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="rental_rate_per_day"
                                                                        class="form-label">Rental Rate per Day</label>
                                                                    <input id="rental_rate_per_day"
                                                                        name="rental_rate_per_day" type="text"
                                                                        class="form-control" placeholder="1234567"
                                                                        value="{{ $car->rental_rate_per_day }}" />
                                                                </div>
                                                                <div
                                                                    class="checkbox-area success-checkbox mr-2 sm:mr-4 mt-2">
                                                                    <label class="inline-flex items-center cursor-pointer">
                                                                        <input type="checkbox" class="hidden"
                                                                            name="available" value="1"
                                                                            {{ $car->available ? 'checked' : '' }}>
                                                                        <span
                                                                            class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                                            <img src="images/icon/ck-white.svg"
                                                                                alt=""
                                                                                class="h-[10px] w-[10px] block m-auto opacity-0">
                                                                        </span>
                                                                        <span
                                                                            class="text-success-500 dark:text-slate-400 text-sm leading-6 capitalize">Available</span>
                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="flex items-center justify-end rounded-b dark:border-slate-600">
                                                                    <button type="submit"
                                                                        class="btn inline-flex justify-center text-white bg-black-500">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal Create --}}
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="newCarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col lg:w-[576px] w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-slate-900 dark:bg-slate-700">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            Add New Car
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
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
                    <div class="p-6 space-y-4">
                        <form method="POST" action="{{ route('manage-mobil.create') }}"
                            class="flex flex-col space-y-3">
                            @csrf
                            <div class="input-area">
                                <label for="brand" class="form-label">Brand</label>
                                <input id="brand" name="brand" type="text" class="form-control"
                                    placeholder="Brand" />
                            </div>
                            <div class="input-area">
                                <label for="model" class="form-label">Model</label>
                                <input id="model" name="model" type="text" class="form-control"
                                    placeholder="Model" />
                            </div>
                            <div class="input-area">
                                <label for="plate_number" class="form-label">Plate Number</label>
                                <input id="plate_number" name="plate_number" type="text" class="form-control"
                                    placeholder="XX 1234 XXX" />
                            </div>
                            <div class="input-area">
                                <label for="rental_rate_per_day" class="form-label">Rental Rate per Day</label>
                                <input id="rental_rate_per_day" name="rental_rate_per_day" type="text"
                                    class="form-control" placeholder="1234567" />
                            </div>
                            <div class="flex items-center justify-end rounded-b dark:border-slate-600">
                                <button type="submit" class="btn inline-flex justify-center text-white bg-black-500">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
