 @props(['user', 'size' => 'w-14 h-14'])
 
 
 @if($user->image)
                <img class="{{ $size }}  rounded-full" src={{$user->imageUrl()  }} alt="{{ $user->name }}" />
                @else
                <img class="{{ $size }}  rounded-full" src="https://cdn.vectorstock.com/i/500p/46/76/gray-male-head-placeholder-vector-23804676.jpg" alt="dummy image" />
                @endif