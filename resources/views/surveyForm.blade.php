@extends('Layout.layout')
@section('title', 'Home')
@section('content')
<div class="p-12">
  <form method="POST" action="{{route('surveyform.submit',$survey->slug)}}">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Survey Name - {{ $survey->name }}</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what
          you share.</p>
        <div class="mt-10 grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-6 ">
          @foreach ($survey->questions as $item)

          <div class="sm:col-span-3 my-4">
            <label for="{{ $item->id }}" class="block text-sm font-medium leading-6 text-gray-900"> {{ $item->question
              }}</label>
            <div class="mt-1">

              @if ($item->type === 'date')
              <input type="date" name="answers[{{$item->id}}] " id="{{ $item->id }}" required
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @elseif ($item->type === 'number')
              <input type="number" name="answers[{{$item->id}}] " id="{{ $item->id }}" required
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @else
              <input type="text" name="answers[{{$item->id}}] " id="{{ $item->id }}" required
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

              @endif



            </div>
            @endforeach
          </div>



        </div>



        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
          <button type="submit"
            class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
  </form>
</div>
@endsection