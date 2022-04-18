<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            コンフィグ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{ route('config.public.update') }}">
                        @csrf
                        <label><input type="radio" name="is_public" value="1" {{ old('is_public', ($user) ? $user->is_public : '')===1 ? 'checked':'' }}>公開する</label>
                        <label><input type="radio" name="is_public" value="0" {{ old('is_public', ($user) ? $user->is_public : '')===0 ? 'checked':'' }}>公開しない</label>
                        <button type="submit">送信</button>
                    </form>
                    @if ($errors->has('is_public'))
                        <p class="error_text"><span>{{$errors->first('is_public')}}</span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
