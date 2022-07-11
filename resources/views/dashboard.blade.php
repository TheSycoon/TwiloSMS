<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hello') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-3 p-5">


<form method="POST" action="{{ route('sendSMS')}}">
    @csrf
    @isset($sent)
    @if($sent!=="")
    <h4>Sent to :-{{$sent}}</h4>
    @endif
    @endisset
    @isset($notsent)
    @if($notsent!=="")
    <h4>Not Sent to :-{{$notsent}}</h4>
    @endif
    @endisset


                        {{-- <div class="mb-3 mt-3">
                            <label for="comment">Phone Numbers:</label>
                            <input type="text" name="mobile" class="form-control rounded-xl" placeholder="Enter Phone Numbers (e.g +911234567890,+91924522xxxx)">
                          </div> --}}
                          <div class="mb-3 mt-3">
                            <label for="comment">Phone Numbers:</label>
                            <input name="mobile"  type="text" class="form-control rounded-xl" placeholder="Enter Phone Numbers (e.g +911234567890,+91924522xxxx)">
                          </div>
                        <div class="mb-3 mt-3">
                        <label for="comment">Message:</label>
                        <textarea class="form-control rounded-xl" rows="5" id="comment" name="message" placeholder="Enter Custom Message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-submit">Submit</button>

                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
