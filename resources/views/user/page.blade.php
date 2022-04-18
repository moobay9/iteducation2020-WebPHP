<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('タイムライン') }}
        </h2>
    </x-slot>
    
    <div class="user">
        <div class="user_head">
            <img src="{{ asset('common/img/cacatua.jpg') }}" alt="">
        </div>
    </div>
    
    <div class="timeline">
        
        @for ($i = 1; $i < 10; $i++)
            
        {{-- tweet --}}
        <div class="timeline_item">
            <div class="timeline_item_icon">
                <img src="{{ asset('common/img/cacatua.jpg') }}" alt="">
            </div>
            <div class="timeline_item_main">
                <div class="timeline_item_main_head">
                    <h3>絶滅危惧種</h3>
                    <span>@takanashi66</span>
                    <time>13分</time>
                </div>
                <div class="timeline_item_main_body">
                    <p>あああああああああああああああああああ</p>
                </div>
                
                <div class="timeline_item_main_footer">
                    <ul>
                        <li class="reply">
                            <a href="#">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="reply_icon"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>    
                            </a>
                        </li>
                        <li class="retweet">
                            <a href="#">
                                <svg viewBox="0 0 24 24" aria-hidden="true" class="retweet_icon"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg> 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- /tweet --}}
        
        @endfor
        
    </div>
    
</x-app-layout>