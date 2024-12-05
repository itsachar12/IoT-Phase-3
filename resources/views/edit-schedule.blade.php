@extends('layout.dashboard')

@section('title', 'Aplikasi GX DOJO')

@section('content')

    <div class="mt-28 mb-10 ml-96 w-1/2 ">
        <a href="/appliances"
            class="text-blue-500 px-4 py-2 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition">
            Back
        </a>
    </div>

    @if (session('error'))
        <div class="error mb-10 ml-96 w-1/2  text-red-600 bg-red-300 p-3 rounded-lg">
            {{ session('error') }}</div>
    @endif
    @if (session('sukses'))
        <div class="error mb-10 ml-96 w-1/2  text-green-800 bg-green-300 p-3 rounded-lg ">
            {{ session('sukses') }} !!</div>
    @endif

    <div class="  ml-96 bg-slate-100 rounded-lg p-5 mb-10 w-1/2 ">

        <h1 class="text-center text-xl font-semibold mb-2">Update Schedule</h1>
        <hr>



        <form class="p-4 md:p-5" action="{{ route('schedule.update', $schedule->id_schedule) }}" method="post">
            @csrf
            @method('patch')
            <div class="grid gap-4 mb-4 grid-cols-2">


                {{-- ? apliance --}}
                <div class="col-span-2">
                    <label for="name_appliance" class="block mb-2 text-sm font-medium text-gray-900 ">Appliance</label>
                    <input name="name_appliance" id="name_appliance"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg  block w-full p-2.5 0 "
                        type="text" value="{{ $schedule->name_appliance }}" disabled>

                </div>

                {{-- ? Time start --}}
                <div class="col-span-2 sm:col-span-1">
                    <label for="time_start" class="block mb-2 text-sm font-medium text-gray-900 ">Time Start</label>
                    <input type="time" name="time_start" id="time_start"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 0 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required="" value="{{ $schedule->time_start }}">
                </div>

                {{-- ? Time End --}}
                <div class="col-span-2 sm:col-span-1">
                    <label for="time_end" class="block mb-2 text-sm font-medium text-gray-900 ">Time End</label>
                    <input type="time" name="time_end" id="time_end"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 0 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required value="{{ $schedule->time_end }}">
                </div>

                {{-- ?repeat --}}
                <div class="col-span-1">
                    <label for="repeat_schedule" class="block mb-2 text-sm font-medium text-gray-900 ">Repeat </label>
                    <select id="repeat_schedule" required name="repeat_schedule"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 0 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        {{-- perulangan daftar appliances --}}
                        <option {{ $schedule->repeat_schedule === 'Once' ? 'selected' : '' }} value="Once">Once</option>
                        <option {{ $schedule->repeat_schedule === 'Daily' ? 'selected' : '' }} value="Daily">Daily</option>
                    </select>
                </div>

                {{-- ?status --}}
                <div class="col-span-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <select id="status" required name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 0 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        {{-- perulangan daftar appliances --}}

                        <option {{ $schedule->status === 'Active' ? 'selected' : '' }} value="Active">Active</option>
                        <option {{ $schedule->status === 'Inactive' ? 'selected' : '' }} value="Inactive">Inactive</option>


                    </select>
                </div>

            </div>
            <button type="submit"
                class="text-white inline-flex items-center justify-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Update Schedule
            </button>
        </form>
    </div>

@endsection
