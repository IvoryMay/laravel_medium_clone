<x-app-layout>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">

                    <x-category-tabs >
                        No catogoires
                    </x-category-tabs>
                    
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                <div class="p-4 text-gray-900">
@forelse ($posts as $p)
    <x-post-item :post="$p" />
@empty
    <div class="text-center text-gray-500 py-10 ">No posts</div>
@endforelse                   
 </div>
               
            </div>
             <div class="mt-10">{{$posts->links()}}</div>
        </div>
    </div>
</x-app-layout>