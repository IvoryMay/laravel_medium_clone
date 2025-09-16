<x-app-layout>

    <div class="py-8 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
              <h1 class="text-4xl font-bold mb-10">{{$post->title}}</h1>
                {{-- avatar section --}}
              <div class="flex gap-4 items-center mb-5">
                <div>
                    @if($post->user->image)
                <img class="h-20 w-20  rounded-full" src={{$post->user->imageUrl()  }} alt="{{ $post->user->name }}" />
                @else
                <img class="h-20 w-20  rounded-full" src="https://cdn.vectorstock.com/i/500p/46/76/gray-male-head-placeholder-vector-23804676.jpg" alt="dummy image" />
                @endif
                </div>
                    <div class="flex flex-col">
                        <div class="flex gap-2 items-center mb-2">
                        <p class="font-bold  text-md">
                        {{$post->user->name}}</p>
                        <a href="#" class="text-green-600">Follow</a>
                        </div>
                    <div class="flex  gap-3 text-gray-500 text-sm">
                        {{-- @dump($post->created_at) --}}
                    <p >{{$post->readTime()}} min read </p>
                    &middot;
                    <p>{{$post->created_at->format('M d, Y')}}</p>
                    </div>
                </div>
              </div>


              {{-- clap section --}}
              <x-clap-button />


              {{-- image section --}}
              <div class="mb-10">
                <img class="w-4/5 h-full mb-5" src="{{$post->imageUrl() }}" alt="{{ $post->title }}" />
                <div>
                    {{ $post->content }}
                    
                </div>
              </div>

              {{-- category section --}}
              <div class="mb-10">
              <span class="bg-gray-300 text-gray-800  text-lg px-4 py-2 rounded-lg font-semibold ">
                    {{ $post->category->name }}
                </span>
              </div>

              <x-clap-button />
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                
    </div>
</x-app-layout>