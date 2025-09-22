<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-10">
              <h1 class="text-3xl font-bold mb-10">{{$user->name}}</h1>
            <div class="flex ">
  
              {{-- post section --}}
                <div class="flex-1 mr-10">
                  <div class="p-4 text-gray-900">
                    @forelse ($posts as $p)
                    <x-post-item :post="$p" />
                    @empty
                    <div class="text-center text-gray-500 py-10 ">No posts</div>
                    @endforelse                   
 </div>
                </div>

                {{-- sidebar --}}
                <div class="w-[320px] px-8 border-l ">
                    <x-user-avatar :user="$user" size="w-24 h-24" />
                    
                    <div class="ml-2">
                    <p class="font-bold text-lg mb-2">{{$user->name}}</p>
                    <p class="text-sm text-gray-500 mb-2">26k followers</p>
                    <p class="mb-2">{{$user->bio}}</p>
                    <button class="bg-emerald-500 text-white px-4 py-2 rounded-lg">Follow</button>
                    </div>
                </div>
            </div>
            </div>

           
        </div>
    </div>
</x-app-layout>
