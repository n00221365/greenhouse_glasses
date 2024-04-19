@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Take the Quiz!') }}
        </h2>
    @endsection
    
    @section('content')


<br>
        <a href="{{ route('admin.questions.create') }}" style="display: inline-block; padding: 5px 20px; background-color: #00e1ff; color: #fff; text-decoration: none; border-radius: 20px;">Create</a>
        
        <br>        <br>

<!-- Displays and adds the data into the index page of the website-->

    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Runtime
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount of Songs
                        </th>
                        <th scope="col" class="px-6 py-3">
                            album_image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Platforms
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Artist ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Read More!
                        </th>
                    </tr>
                </thead>





        <tbody>

            
            @forelse($albums as $album)


            
            <tr class="bg-blue border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-blue">
                    {{ $answer->answer}}
                </th>
                <td class="px-6 py-4">
                    {{ $answer->answer}}
                </td>
                <td class="px-6 py-4">
                    {{ $answer->answer}}
                </td>


            </tr>

        @empty 
        <h4>No Albums Found!</h4>
        
    @endforelse
            
        </tbody>
    </table>
</div>

</tbody>
</table>

{{ $questions->links() }}

@endsection