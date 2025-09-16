<x-app-layout>

    <div class="py-8 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
               <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
               
                @csrf
                <!-- image -->
        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"  autofocus  />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>
                 <!-- title -->
        <div class="mt-10">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus  />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
         <!-- category -->
        <div class="mt-10">
            <x-input-label for="category_id" :value="__('Category')" />
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 block mt-1 w-full rounded-md shadow-sm" name="category_id" >
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>
<!-- content -->
        <div class="mt-10">
            <x-input-label for="content" :value="__('Content')" />
            <x-textarea-input id="content" class="block mt-1 w-full"  name="content"   autofocus  >{{ old('content') }}</x-textarea-input>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-4">
            <x-primary-button class="ml-2">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
        
                </form> 
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-8">
                
    </div>
</x-app-layout>