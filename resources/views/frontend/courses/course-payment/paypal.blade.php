<div class="w-full">
  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="p-6">
      <form action="{{ route('paypal',$course) }}" method="POST" class="">
        @csrf
        <x-input type="text" id="name" name="name" label="Full Name" value="{{ Auth::user()->name}} " disabled />

        <!-- Email -->
        <x-input type="hidden" id="price" name="price" label="Price " value="{{$course->price }}" />

        <div class="flex justify-between items-center">
          <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Pay ${{ $course->price }}</button>

        </div>
      </form>
    </div>
  </div>
</div>
