@extends('layouts.app')

@section('content')

<div class="flex flex-col space-y-4">

    <div class="w-full text-right">
        <a href="{{ route('dogs.create') }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 border border-yellow-600 leading-5 rounded-md">
            Create
        </a>
    </div>    
    
    <div class="bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">                    
        <div class="text-gray-400 text-sm">
            <table class="table-auto w-full">
                <thead class="text-left font-bold h-10">
                <tr>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Allergies</th>
                    <th>Suitable recipes</th>
                </tr>
                </thead>
                <tbody>
                    @each('dogs.single', $dogs, 'dog', 'dogs.empty')
                </tbody>
            </table>        
            
            {{ $dogs->links() }}            
        </div>
    </div>
    
</div>
    
@endsection