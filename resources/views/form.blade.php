<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タイムライン') }}
        </h2>
    </x-slot>
    
    <div class="form">
        
        <div class="tweet">
            <div class="tweet_icon">
                <a href="/takanashi66"><img src="{{ asset('storage/'.$user->icon) }}" alt=""></a>
            </div>
            <div class="tweet_main">
                <form action="{{ route('replytweet') }}" method="POST">
                    @csrf
                    <textarea name="body" id="tweet" cols="30" rows="3">{{'@'.$reply->at_name}} </textarea>
                    @if ($errors->has('body'))
                        <p class="error_text"><span>{{$errors->first('body')}}</span></p>
                    @endif
                    
                    <input type="hidden" name="parent_id" value="{{$reply_tweet->id}}">
                    
                    {{-- <div class="retweet_item">
                        <div class="retweet_item_icon">
                            <img src="{{ asset('common/img/cacatua.jpg') }}" alt="">
                        </div>
                        <div class="retweet_item_body">
                            {{ $reply_tweet->body }}
                        </div>
                    </div> --}}
                    
                    <div class="tweet_footer">
                        {{-- <label class="upload">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="img_tweet"><g><path d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z"></path><circle cx="8.868" cy="8.309" r="1.542"></circle></g></svg>
                            <input type="file" name="img" id="img">
                        </label> --}}
                        <div class="btn_return">
                            <a href="/">戻る</a>
                        </div>
                        <input type="submit" value="ツイートする">
                    </div>

                </form>
            </div>
        </div>
        
    </div>
    
</x-app-layout>
