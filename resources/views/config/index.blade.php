<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            コンフィグ
        </h2>
    </x-slot>

    <div class="page">
        
        <div class="pageitem">
            <h3>アカウントの公開・非公開</h3>
            <form method="post" action="{{ route('config.public.update') }}">
                @csrf
                <label><input type="radio" name="is_public" value="1" checked {{ old('is_public', ($user) ? $user->is_public : '')===1 ? 'checked':'' }}>公開</label>
                <label><input type="radio" name="is_public" value="0" {{ old('is_public', ($user) ? $user->is_public : '')===0 ? 'checked':'' }}>非公開</label>
                <button cla type="submit">保存</button>
            </form>
            @if ($errors->has('is_public'))
                <p class="error_text"><span>{{$errors->first('is_public')}}</span></p>
            @endif
        </div>
        
        <div class="pageitem">
            <h3>名前</h3>
            <form action="{{ route('config.name.update') }}" method="POST">
                @csrf
                <input type="text" name="name" id="name" value="{{$user->name}}">
                @if ($errors->has('name'))
                    <p class="error_text"><span>{{$errors->first('name')}}</span></p>
                @endif
                
                <button cla type="submit">保存</button>
            </form>
        </div>
        
        <div class="pageitem">
            <h3>ユーザー名</h3>
            <form action="{{ route('config.at_name.update') }}" method="POST">
                @csrf
                <div class="input_wrap"><input type="text" name="at_name" id="at_name" value="{{$user->at_name}}"></div>
                @if ($errors->has('at_name'))
                    <p class="error_text"><span>{{$errors->first('at_name')}}</span></p>
                @endif
                
                <button cla type="submit">保存</button>
            </form>
        </div>
        
        <div class="pageitem">
            <h3>プロフィール画像の登録</h3>
            <form action="{{ route('config.icon.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="user_profile_wrap">
                    {{-- 画像が登録されていれば表示 --}}
                    @if ($user->icon)
                    <div class="user_profile_img">
                        <img src="{{ asset('storage/'.$user->icon) }}" alt="">
                    </div>
                    @endif
                    {{-- /画像が登録されていれば表示 --}}
                    <div class="user_profile_upload">
                        <label for="icon">画像をアップロード</label>
                        <input type="file" name="icon" id="icon">
                    </div>
                </div>
                <br>
                @if ($errors->has('icon'))
                    <p class="error_text"><span>{{$errors->first('icon')}}</span></p>
                @endif
                
                <button cla type="submit">保存</button>
            </form>
        </div>
        
        
    </div>
    
    
</x-app-layout>
