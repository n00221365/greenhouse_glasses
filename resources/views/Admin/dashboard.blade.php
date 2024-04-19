
@extends('layouts.admin')
    @section('header')
    <div class="bg-green-500">
        <h2 class="font-semibold text-xl text-gray-800 bg-green-500 leading-tight">
            {{ __('Admin Dashboard') }}

        </h2>
    </div>
    @endsection
{{-- the admin homepage, what you see when you first log in --}}
    @section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                             <p>You are an admin</p>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection