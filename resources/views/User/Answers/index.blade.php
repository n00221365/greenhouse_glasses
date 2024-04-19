@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Take the Quiz!') }}
        </h2>
    @endsection
    
    @section('content')


<br>
        {{-- <a href="{{ route('admin.questions.create') }}" style="display: inline-block; padding: 5px 20px; background-color: #00e1ff; color: #fff; text-decoration: none; border-radius: 20px;">Create</a> --}}
        
        <br>        <br>

<!-- Displays and adds the data into the index page of the website-->

    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Question
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Answer #1
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Answer #2
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Answer #3
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Answer #4
                        </th>
                        <th scope="col" class="px-6 py-3">

                    </tr>
                </thead>





        <tbody>

          
            {{-- @forelse($answers as $col1answer) --}}
            @for($i = 0; $i<4; $i++)


            
            <tr class="bg-blue border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="column" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-blue">
                    {{ __('How far would you typically drive in a week?')}}
                </th>

                <td class="px-6 py-4">
                    {{ $col1answer[$i]}}
                </td>
                <td class="px-6 py-4">
                    {{ $col2answer[$i]}}
                </td>
                <td class="px-6 py-4">
                    {{ $col3answer[$i]}}
                </td>
                <td class="px-6 py-4">
                    {{ $col4answer[$i]}}
                </td>
                <h4>No Albums Found!</h4>
                @endfor







            </tr>


        
   
            
        </tbody>
    </table>
</div>

</tbody>
</table>

{{ $answers->links() }}

@endsection