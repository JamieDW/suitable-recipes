
@extends('layouts.app')

@section('content')

   <div class="flex flex-col space-y-4">
   
        <h1 class="text-2xl text-white border-b border-white">Create dog</h1>       
  
        <div class="p-6 overflow-hidden bg-gray-800 shadow sm:rounded-lg">                    
            <form action="{{ route('dogs.store') }}" method="POST" class="grid grid-cols-2 gap-2 text-sm text-gray-400">
                @csrf
                <x-input title="Name" name="name" required :value="old('name')"/>
                <x-input title="Age" name="age" subtitle="(in months)" type="number" required  min="1" max="360" :value="old('age')"/>
                <x-select title="Breed" name="breed" required>
                    <option></option>
                    @foreach ($breeds as $breed)
                        <option @if(old('breed') == $breed) selected @endif>{{ $breed }}</option>
                    @endforeach
                </x-select>
                <x-input title="Allergies" name="allergies">
                    <x-slot name="inputs">
                        @foreach ($allergies as $allergy)
                        <label class="inline-flex items-center">
                            <input name="allergies[]" type="checkbox" value="{{ $allergy }}">
                            <span class="ml-2">{{ $allergy }}</span>
                        </label>
                        @endforeach
                    </x-slot>
                </x-input>
                <div class="mt-2 text-right col-span-full">
                    <button type="submit" class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white bg-yellow-500 border border-yellow-600 rounded-md">Save</button>
                </div>
            </form>
        </div>
   </div>

@endsection