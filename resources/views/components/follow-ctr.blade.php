
@props(['user'])
<div {{ $attributes }} x-data="{
                following:{{$user->isFollowedBy(auth()->user()) ? 'true' : 'false'}},
                followerCount:{{$user->followers()->count()}},
                follow(){
                   this.following = !this.following;
                   axios.post(`/follow/{{$user->id}}`)
                   .then(res => {
                       console.log(res.data);
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