
@props(['user'])
<div {{ $attributes }} x-data="{
                following:{{$user->isFollowedBy(auth()->user()) ? 'true' : 'false'}},
                followerCount:{{$user->followers()->count()}},
                follow(){
                  
                   axios.post(`/follow/{{$user->id}}`)
                   .then(res => {
                        this.following = !this.following;
                       this.followerCount = res.data.followersCount;
                   })
                       .catch(err => {
                           console.log(err);
                       })
                }
                }"
                
                class="w-[320px] px-8 border-l ">
                {{ $slot }}

</div>  