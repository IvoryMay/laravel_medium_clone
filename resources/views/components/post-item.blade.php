<div>
    <div class="grid grid-cols-2 md:grid-cols-3 md bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 mb-5">
    
    <div class="px-5 py-4 col-span-2">
        <a href="{{ route('post.show',['username'=>$post->user->username, 
        'post'=>$post->slug] )}}">
            <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 ">{{$post->title}}</h5>
        </a>
        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{Str::words($post->content, 20)}}</div>
        <x-primary-button href="{{ route('post.show',['username'=>$post->user->username, 
        'post'=>$post->slug] )}}" >
            Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </x-primary-button>
    </div>
    

    <a href="{{ route('post.show',['username'=>$post->user->username, 
        'post'=>$post->slug] )}}" class="col-span-2 md:col-span-1">
        <img class="h-48 w-full object-cover rounded-right-lg" src={{Storage::url($post->image)  }} alt="" />
    </a>
</div>
</div>