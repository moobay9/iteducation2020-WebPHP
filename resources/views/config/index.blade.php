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
        
        
    </div>
    
    
</x-app-layout>
