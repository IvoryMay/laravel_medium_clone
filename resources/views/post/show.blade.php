<x-app-layout>

    <div class="py-8 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
              <h1 class="text-4xl font-bold mb-10">{{$post->title}}</h1>
                {{-- avatar section --}}
              <div class="flex gap-4 items-center mb-5">
                <div>
                   <x-user-avatar :user="$post->user" />
                </div>
                    <x-follow-ctr :user="$post->user" class="flex flex-col">
                        <div class="flex gap-2 items-center mb-2">
                        <a href="{{ route('profile.show', $post->user) }}" class="font-bold  text-md hover:underline">
                        {{$post->user->name}}</a>
                        <button
                         @click="follow"
                         x-text="following ? 'Unfollow' : 'Follow'" :class="following ? 'text-red-500' : 'text-emerald-500'" ></button>
                        </div>
                    <div class="flex  gap-3 text-gray-500 text-sm">
                        {{-- @dump($post->created_at) --}}
                    <p >{{$post->readTime()}} min read </p>
                    &middot;
                    <p>{{$post->created_at->format('M d, Y')}}</p>
                    </div>
                </x-follow-ctr>
              </div>


              {{-- clap section --}}
              <x-clap-button :post="$post"/>


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

              <x-clap-button :post="$post" />
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                
    </div>
</x-app-layout>